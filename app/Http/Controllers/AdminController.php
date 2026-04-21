<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

 public function dashboard()
{
    // Lấy doanh thu các đơn hàng đã hoàn thành
   $revenues = Order::where('status', 'completed')
        ->select(
            DB::raw('SUM(total_price) as amount'), 
            DB::raw("DATE_FORMAT(created_at, '%m/%Y') as month")
        )
        ->groupBy('month')
        ->orderBy('month', 'ASC')
        ->get();

    // Gom nhóm dữ liệu thống kê
    $stats = [
        'totalPets' => Pet::count(),
        'totalProducts' => Product::count(),
        'totalOrders' => Order::count(),
        'totalUsers' => User::count(),
    ];

    $products = Product::orderBy('id', 'desc')->take(5)->get();

    return view('admin.dashboard', compact('revenues', 'stats', 'products'));
}

    public function products(Request $request)
    {
        $type = $request->type;

        // 1. Khởi tạo query và quan trọng nhất: SELECT rõ các cột cần lấy
        // Chúng ta lấy tất cả từ products và lấy thêm category_id từ bảng pets
        $query = Product::query()
            ->leftJoin('pets', 'products.id', '=', 'pets.product_id')
            ->select('products.*', 'pets.category_id');

        // 2. Lọc theo Tab
        if ($type && $type != 'all') {
            if ($type == 'cho') {
                $query->where('pets.category_id', 1);
            } elseif ($type == 'meo') {
                $query->where('pets.category_id', 2);
            } elseif ($type == 'accessory') {
                $query->where('products.product_type', 'accessory');
            }
        }

        // 3. Sắp xếp và phân trang
        $products = $query->orderBy('products.id', 'asc')
                        ->paginate(5)
                        ->appends(request()->query());

        return view('admin.products', compact('products', 'type'));
    }

    public function manageOrders()
    {
        // Lấy danh sách đơn hàng, có thể dùng paginate để phân trang như trong ảnh bạn thiết kế
        $orders = Order::with(['user', 'products'])
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        return view('admin.orders', compact('orders'));
    }

    // 1. Chỉ lấy danh sách những người là 'user'
    public function users() {
        $users = User::where('role', 'user') // Chỉ lấy khách hàng
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        return view('admin.users', compact('users'));
    }

    // 2. Thêm mới luôn mặc định là 'user'
    public function storeUser(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ], [
            'email.unique' => 'Email này đã được sử dụng!',
            'password.min' => 'Mật khẩu phải từ 8 ký tự trở lên.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Luôn gán role user để an toàn
        ]);

        return redirect()->back()->with('success', 'Đã thêm thành viên mới!');
    }

    // 3. Bảo vệ: Chỉ cho phép xóa nếu người đó là 'user'
    public function destroyUser($id) {
        $user = User::where('id', $id)->where('role', 'user')->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Không có quyền xóa tài khoản quản trị!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Đã xóa người dùng thành công!');
    }
    // Thêm sản phẩm mới
public function storeProduct(Request $request) {
    $request->validate(['name' => 'required', 'price' => 'required|numeric', 'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);

    // 1. Xử lý upload ảnh
    $imageName = time().'.'.$request->image->extension();  
    $request->image->move(public_path('images'), $imageName);

    // 2. Lưu bảng Products
    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'image' => $imageName,
        'product_type' => $request->product_type,
        'description' => $request->description,
        'stock' => $request->stock ?? 0,
    ]);

    // 3. Lưu bảng chi tiết tùy loại
    if($request->product_type == 'pet') {
        Pet::create([
            'product_id' => $product->id,
            'category_id' => $request->category_id,
            'breed' => $request->breed,
        ]);
    } else {
        Accessory::create([
            'product_id' => $product->id,
            'accessory_type' => $request->accessory_type,
        ]);
    }

    return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
}

// Xóa sản phẩm
public function destroyProduct($id) {
    $product = Product::findOrFail($id);
    // Xóa file ảnh trong thư mục public/images
    if(file_exists(public_path('images/'.$product->image))){
        unlink(public_path('images/'.$product->image));
    }
    $product->delete(); // Sẽ tự xóa pet/accessory nhờ liên kết
    return redirect()->back()->with('success', 'Đã xóa sản phẩm!');
}

// Cập nhật sản phẩm
public function updateProduct(Request $request, $id) {
    $product = Product::findOrFail($id);

    // 1. Cập nhật bảng Products
    $product->name = $request->name;
    $product->price = $request->price;
    $product->product_type = $request->product_type;

    // Nếu có upload ảnh mới thì mới thay, không thì giữ ảnh cũ
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu tồn tại
        if(file_exists(public_path('images/'.$product->image))){
            unlink(public_path('images/'.$product->image));
        }
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $product->image = $imageName;
    }
    $product->save();

    // 2. Cập nhật bảng chi tiết (Pet hoặc Accessory)
    if($request->product_type == 'pet') {
        $pet = Pet::updateOrCreate(
            ['product_id' => $product->id],
            ['category_id' => $request->category_id]
        );
    }

    return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công!');
}
}
