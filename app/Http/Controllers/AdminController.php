<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Pet;

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

        // 3. Sắp xếp: Đổi 'desc' thành 'asc' để ID 1 lên đầu
        $products = $query->orderBy('products.id', 'asc')
                        ->paginate(5)
                        ->appends(request()->query());

        return view('admin.products', compact('products', 'type'));
    }

    public function manageOrders()
    {
        // Lấy danh sách đơn hàng, có thể dùng paginate để phân trang như trong ảnh bạn thiết kế
        // $orders = \App\Models\Order::with('user')->orderBy('created_at', 'desc')->paginate(10);
        $orders = Order::with('products')->get();

        return view('admin.orders', compact('orders'));
    }
}
