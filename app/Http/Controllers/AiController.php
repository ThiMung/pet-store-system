<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class AiController extends Controller
{
    // Hàm này để gọi API chung cho cả 2 tính năng
private function callGemini($payload)
{
    // Dán thẳng API Key của bạn vào đây để test
    $apiKey = 'AQ.Ab8RN6Jb2V2RxiR423YNQ0-_WjI6e8R4KxXkNHnxsfFnCeU_hg'; 
    
    // Sử dụng URL tối giản nhất
    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

    return \Illuminate\Support\Facades\Http::withoutVerifying()
        ->withHeaders(['Content-Type' => 'application/json'])
        ->post($url, $payload);
}

    // Hàm xử lý tư vấn AI
public function getRecommendation(Request $request)
{
    $userInput = $request->input('user_conditions');

    // 1. LẤY DỮ LIỆU TỪ DATABASE (Chỉ lấy thú cưng đang available)
    // Dùng Join để gộp bảng products và pets lại với nhau cho chắc ăn
    $availablePets = \App\Models\Product::where('products.product_type', 'pet')
        ->where('products.status', 'available')
        ->join('pets', 'products.id', '=', 'pets.product_id')
        ->select('products.name', 'products.description', 'pets.breed', 'pets.age')
        ->get();

    // 2. NẾU KHO HẾT HÀNG
    if ($availablePets->isEmpty()) {
        return back()->with([
            'ai_response' => 'Hiện tại shop đang tạm hết các bé thú cưng. Bạn quay lại sau nhé!',
            'old_input' => $userInput
        ]);
    }

    // 3. ĐÓNG GÓI THÔNG TIN SẢN PHẨM THÀNH VĂN BẢN CHO AI ĐỌC
    $petContext = "";
    foreach ($availablePets as $index => $pet) {
        $stt = $index + 1;
        // Ví dụ: 1. Chó Ailen Setter (Giống: Ailen Setter, Tuổi: 4 tháng) - Đặc điểm: Giống chó săn thanh lịch
        $petContext .= "{$stt}. {$pet->name} (Giống: {$pet->breed}, Tuổi: {$pet->age}) - Đặc điểm: {$pet->description}.\n";
    }

    // 4. TẠO PROMPT "THẦN CHÚ" KHÓA AI LẠI
    $prompt = "Bạn là nhân viên tư vấn bán hàng của MNK Shop. Khách hàng đang có mong muốn: '$userInput'.
    
    DƯỚI ĐÂY LÀ DANH SÁCH CÁC BÉ THÚ CƯNG ĐANG CÓ SẴN TẠI SHOP:
    $petContext
    
    YÊU CẦU BẮT BUỘC (Nếu vi phạm sẽ bị phạt):
    - CHỈ ĐƯỢC PHÉP tư vấn và gợi ý những bé thú cưng nằm trong danh sách đang có sẵn ở trên.
    - KHÔNG ĐƯỢC tự bịa ra giống loài khác hoặc sản phẩm không có trong danh sách.
    - Hãy chọn ra 1 hoặc 2 bé phù hợp nhất từ danh sách trên để giới thiệu cho khách, giải thích lý do vì sao tính cách/đặc điểm của bé đó hợp với điều kiện của khách.
    - Định dạng câu trả lời bằng HTML (dùng <b> cho tên thú cưng, <br> để xuống dòng, dùng thẻ <ul> <li> cho rõ ràng).";

    // 5. GỌI API GEMINI (Bạn giữ nguyên cấu hình hàm callGemini đang chạy được nhé)
    // Trong hàm getRecommendation
$response = $this->callGemini([
    'contents' => [
        [
            'parts' => [
                ['text' => $prompt] // $prompt này đã chứa danh sách thú cưng từ DB ở bước trước
            ]
        ]
    ]
]);

    // 6. XỬ LÝ LỖI HOẶC HIỂN THỊ
    if ($response->failed()) {
        return back()->with('ai_response', 'Lỗi kết nối AI: ' . $response->body());
    }

    $data = $response->json();
    $aiText = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Xin lỗi, AI chưa phân tích được bé nào phù hợp, bạn thử nhập thêm chi tiết nhé!';

    return back()->with([
        'ai_response' => $aiText,
        'old_input' => $userInput
    ]);
}

// Hàm nhận diện hình ảnh
public function index()
    {
        return view('search_by_image');
    }

    public function searchByImage(Request $request)
    {
        // 1. VALIDATE HÌNH ẢNH
        $request->validate([
            'pet_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        if (!$request->hasFile('pet_image')) {
            return back()->with('error', 'Vui lòng tải lên một hình ảnh.');
        }

        $image = $request->file('pet_image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        // Lưu tạm ảnh để lấy path (có thể xóa sau khi dùng)
        $path = $image->storeAs('temp_ai_images', $imageName, 'public'); 

        // 2. LẤY DỮ LIỆU THÚ CƯNG TỪ DATABASE (Tương tự phần tư vấn)
        $availablePets = Product::where('products.product_type', 'pet')
            ->where('products.status', 'available')
            ->join('pets', 'products.id', '=', 'pets.product_id')
            ->select('products.id', 'products.name', 'products.description', 'pets.breed', 'pets.age')
            ->get();

        // NẾU KHO HẾT HÀNG
        if ($availablePets->isEmpty()) {
            return back()->with('error', 'Hiện tại shop đang tạm hết các bé thú cưng.');
        }

        // ĐÓNG GÓI THÔNG TIN SẢN PHẨM THÀNH VĂN BẢN
        $petContext = "";
        foreach ($availablePets as $index => $pet) {
            $stt = $index + 1;
            $petContext .= "ID: {$pet->id}. {$pet->name} (Giống: {$pet->breed}, Tuổi: {$pet->age}) - Đặc điểm: {$pet->description}.\n";
        }

        // 3. TẠO PROMPT NHẬN DIỆN VÀ GỢI Ý
        $prompt = "Bạn là chuyên gia nhận diện và tư vấn thú cưng của MNK Shop.
    
        Nhiệm vụ của bạn:
        1. Phân tích hình ảnh được cung cấp. Xác định xem đây là loài vật gì (chó, mèo, hay loài khác), giống loài cụ thể, màu lông, và các đặc điểm ngoại hình nổi bật.
        2. Dựa trên phân tích hình ảnh và DANH SÁCH CÁC BÉ THÚ CƯNG ĐANG CÓ SẴN TẠI SHOP dưới đây, hãy tìm ra những bé có đặc điểm ngoại hình **TƯƠNG TỰ NHẤT** với bé trong ảnh.
        
        DANH SÁCH CÁC BÉ TẠI SHOP:
        $petContext
        
        YÊU CẦU TRẢ VỀ KẾT QUẢ (Định dạng JSON):
        Hãy trả về kết quả dưới dạng một mảng JSON thuần túy (không có dấu ```json ở đầu và cuối), chứa các trường sau:
        - 'analysis': Một chuỗi văn bản HTML (dùng <b>, <br>) mô tả phân tích của bạn về bé thú cưng trong ảnh.
        - 'similar_pet_ids': Một mảng chứa ID của 3 bé thú cưng phù hợp nhất từ danh sách trên (ví dụ: [1, 3, 5]). Nếu không tìm thấy bé nào tương tự, hãy để mảng rỗng.
        
        Lưu ý bắt buộc: CHỈ ĐƯỢC CHỌN ID TỪ DANH SÁCH CÓ SẴN.";

        // 4. CHUẨN BỊ PAYLOAD VÀ GỌI API (Sử dụng cấu hình đã chạy được từ phần trước)
        // Chuyển đổi ảnh sang base64 để gửi qua API
        $imageData = base64_encode(Storage::disk('public')->get($path));
        $imageMimeType = $image->getMimeType();

        $apiKey = env('GEMINI_API_KEY'); // Hãy chắc chắn key này đã đúng trong .env
        $url = "[https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=](https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=)" . $apiKey;

        try {
            $response = Http::withoutVerifying()
                ->timeout(60)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post($url, [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt],
                                [
                                    'inline_data' => [
                                        'mime_type' => $imageMimeType,
                                        'data' => $imageData
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]);

            // Xóa ảnh tạm sau khi dùng xong
            Storage::disk('public')->delete($path);

            if ($response->failed()) {
                // Xử lý lỗi (tương tự phần trước)
                return back()->with('error', 'Lỗi kết nối AI: ' . $response->body());
            }

            // 5. XỬ LÝ KẾT QUẢ TỪ AI
            $data = $response->json();
            $aiResponseText = $data['candidates'][0]['content']['parts'][0]['text'] ?? '';

            // AI trả về JSON, chúng ta cần parse nó
            $result = json_decode($aiResponseText, true);

            if (json_last_error() !== JSON_ERROR_NONE || !isset($result['analysis']) || !isset($result['similar_pet_ids'])) {
                // Trường hợp AI không trả về đúng định dạng JSON yêu cầu
                // dd($aiResponseText); // Uncomment để debug xem AI trả về gì
                return back()->with('error', 'AI không phân tích được hình ảnh. Bạn thử ảnh khác nhé!');
            }

            // 6. LẤY SẢN PHẨM TƯƠNG TỰ TỪ DB DỰA TRÊN ID
            $similarPetIds = $result['similar_pet_ids'];
            $similarPets = [];
            if (!empty($similarPetIds)) {
                $similarPets = Product::whereIn('products.id', $similarPetIds)
                    ->where('products.product_type', 'pet')
                    ->where('products.status', 'available')
                    ->join('pets', 'products.id', '=', 'pets.product_id')
                    ->select('products.id', 'products.name', 'products.image', 'pets.breed', 'pets.age')
                    ->get();
            }

            return back()->with([
                'ai_analysis' => $result['analysis'],
                'similar_pets' => $similarPets,
            ]);

        } catch (\Exception $e) {
            // Xóa ảnh tạm nếu có lỗi xảy ra
            Storage::disk('public')->delete($path);
            return back()->with('error', 'Lỗi kết nối: ' . $e->getMessage());
        }
    }
}
