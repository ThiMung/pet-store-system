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
        $revenues = Order::where('status', 'completed')
            ->select(DB::raw('SUM(total_price) as amount'), DB::raw("DATE_FORMAT(created_at, '%m/%Y') as month"))
            ->groupBy('month')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('admin.dashboard', [
            'revenues' => $revenues,
            'pets' => Pet::all(),
            'products' => Product::orderBy('id','desc')->take(5)->get(),
            'totalPets' => Pet::count(),
            'totalProducts' => Product::count(),
            'totalOrders' => Order::count(),
            'totalUsers' => User::count(),
        ]);
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
                    ->paginate(1);
        return view('admin.orders', compact('orders'));
    }

    // 1. Chỉ lấy danh sách những người là 'user'
    public function users() {
        $users = User::where('role', 'user') // Chỉ lấy khách hàng
                    ->orderBy('id', 'desc')
                    ->paginate(1);
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
}
