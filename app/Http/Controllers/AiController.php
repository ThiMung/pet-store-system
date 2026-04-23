<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Product;

class AiController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.gemini.key') ?? env('GEMINI_API_KEY');
    }

    /**
     * TÍNH NĂNG 1: TƯ VẤN THEO SỞ THÍCH
     */
    public function recommend(Request $request)
    {
        $userInput = $request->input('user_conditions');

        if (empty($userInput)) {
            return back()->with('ai_error', 'Vui lòng nhập mô tả sở thích của bạn!');
        }

        // Prompt được cải tiến để ép AI trả về cấu trúc rõ ràng
        $prompt = "Bạn là chuyên gia tư vấn thú cưng chuyên nghiệp. 
        Dựa trên yêu cầu: '$userInput', hãy tư vấn giống chó hoặc mèo phù hợp nhất.
        Yêu cầu định dạng phản hồi bằng Markdown như sau:
        - **Tên giống thú cưng**: (Tên giống)
        - **Tại sao phù hợp**: (Giải thích ngắn gọn)
        - **Đặc điểm nổi bật**: (Gạch đầu dòng 2-3 ý)
        - **Lời khuyên**: (1 câu lưu ý quan trọng)";

        $payload = [
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ]
        ];

        $result = $this->callGemini($payload);

        if (isset($result['error'])) {
            return back()->with('ai_error', 'Lỗi từ AI: ' . $result['error'])->withInput();
        }

        return back()->with('ai_response', $result['text']);
    }

    /**
     * TÍNH NĂNG 2: NHẬN DIỆN QUA ẢNH
     */
    public function identify(Request $request)
    {
        if (!$request->hasFile('pet_image')) {
            return back()->with('ai_error', 'Vui lòng tải ảnh thú cưng lên!');
        }

        try {
            $image = $request->file('pet_image');
            $imageData = base64_encode(file_get_contents($image));

            $prompt = "Nhận diện giống thú cưng trong ảnh. 
            Trả về theo cấu trúc:
            Dòng 1: Chỉ ghi tên giống (ví dụ: Chó Poodle)
            Dòng 2: Mô tả ngắn gọn 2 câu về đặc điểm trong ảnh.";

            $payload = [
                'contents' => [
                    ['parts' => [
                        ['text' => $prompt],
                        ['inline_data' => [
                            'mime_type' => $image->getMimeType(),
                            'data' => $imageData
                        ]]
                    ]]
                ]
            ];

            $result = $this->callGemini($payload);

            if (isset($result['error'])) {
                return back()->with('ai_error', 'Lỗi: ' . $result['error']);
            }

            // Tách tên giống (dòng 1) và mô tả (phần còn lại)
            $lines = explode("\n", trim($result['text']));
            $breedName = str_replace(['*', '#'], '', $lines[0]); // Làm sạch tên giống
            $description = implode("<br>", array_slice($lines, 1));

            // Lấy sản phẩm liên quan (Sử dụng Eloquent để tránh lỗi array)
            $products = Product::where('name', 'like', "%$breedName%")->limit(3)->get();

            return back()->with([
                'identified_breed' => $breedName,
                'ai_response' => $description,
                'similar_products' => $products // Trả về dạng Collection Object
            ]);

        } catch (\Exception $e) {
            return back()->with('ai_error', 'Lỗi xử lý: ' . $e->getMessage());
        }
    }

    /**
     * HÀM GỌI API (Đã sửa Model 2.5 Flash)
     */
    private function callGemini($payload)
    {
        $apiKey = $this->apiKey;
        $modelName = 'gemini-2.5-flash'; 
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$modelName}:generateContent?key={$apiKey}";

        try {
            $response = Http::withoutVerifying()
                ->timeout(30)
                ->retry(2, 2000) // Tự động thử lại nếu gặp lỗi 503 (High Demand)
                ->post($url, $payload);

            if ($response->successful()) {
                $data = $response->json();
                return ['text' => $data['candidates'][0]['content']['parts'][0]['text'] ?? 'AI không phản hồi'];
            }

            $error = $response->json();
            return ['error' => $error['error']['message'] ?? 'Lỗi không xác định'];

        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}