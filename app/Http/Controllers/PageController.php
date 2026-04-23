<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        // Lấy Product kèm theo dữ liệu quan hệ từ bảng Pet
        $allPets = Product::with('pet')
            ->where('product_type', 'pet')
            ->get();

        // Lọc ra danh sách Chó (category_id = 1) và Mèo (category_id = 2)
        // Chúng ta lọc ngay tại Controller để View nhẹ hơn
        $dogs = $allPets->filter(function ($item) {
            return $item->pet && $item->pet->category_id == 1;
        })->take(4);

        $cats = $allPets->filter(function ($item) {
            return $item->pet && $item->pet->category_id == 2;
        })->take(4);

        $accessories = Product::where('product_type', 'accessory')->take(4)->get();

        return view('page.trangchu', compact('dogs', 'cats', 'accessories'));
    }

    public function detail($id)
    {
        // Lấy sản phẩm kèm theo thông tin chi tiết từ bảng pet hoặc accessory
        $product = Product::with(['pet', 'accessory'])->findOrFail($id);

        return view('page.chitietsp', compact('product'));
    }

    // 1. Hàm Tìm kiếm
    public function search(Request $request)
    {
        $keyword  = $request->keyword;
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(8);
        return view('page.loaisp', compact('products', 'keyword'));
    }

    // 2. Hàm Lọc danh mục (Chó/Mèo)
    public function category($id)
    {
        $products = Product::whereHas('pet', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->paginate(8);
        return view('page.loaisp', compact('products'));
    }

    // Lọc tất cả phụ kiện
    public function allAccessories()
    {
        $products = Product::where('product_type', 'accessory')->paginate(8);
        return view('page.loaisp', compact('products'));
    }

    // HÀM MỚI: Lấy tất cả sản phẩm (Chó + Mèo + Phụ kiện)
    public function allProducts()
    {
        $products = Product::paginate(8);
        return view('page.loaisp', compact('products'));
    }

    // PHẦN GIỎ HÀNG
    // Hiển thị trang giỏ hàng
    public function indexCart()
    {
        $cart = session()->get('cart', []);
        return view('page.giohang', compact('cart')); // Trỏ tới file giohang.blade.php
    }

    // Thêm vào giỏ hàng
    public function add(Request $request)
    {
        $id   = $request->input('id');
        $cart = session()->get('cart', []);

        // Nếu thú cưng đã có trong giỏ thì tăng số lượng
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Lần đầu thêm vào giỏ
            $cart[$id] = [
                "name"     => $request->input('name'),
                "quantity" => 1,
                "price"    => $request->input('price'),
                "image"    => $request->input('image'),
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Đã thêm thú cưng vào giỏ hàng!');
    }

    // Xóa khỏi giỏ hàng
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Đã xóa khỏi giỏ hàng!');
        }
    }
    // PHẦN THANH TOÁN
    // 1. Giao diện trang thanh toán
public function getCheckout() {
    $cartItems = session('cart'); // Lấy từ session

    if (!$cartItems || count($cartItems) == 0) {
        return redirect()->route('trangchu')->with('error', 'Giỏ hàng trống!');
    }

    return view('page.checkout', compact('cartItems'));
}

    // 2. Xử lý đặt hàng (Chuyển từ Cart -> Order)
public function postCheckout(Request $request) {
    $cart = session('cart');
    if (!$cart) return redirect()->route('trangchu');

    $totalPrice = 0;
    foreach($cart as $item) {
        $totalPrice += $item['price'] * $item['quantity'];
    }

    DB::beginTransaction();
    try {
        // 1. Lưu bảng orders (Thông tin chung)
        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = $totalPrice;
        $order->status = 'pending';
        $order->save();

        // 2. Lưu bảng order_details (Chi tiết từng món)
        foreach ($cart as $id => $details) {
            DB::table('order_details')->insert([
                'order_id'   => $order->id,
                'product_id' => $id,
                'quantity'   => $details['quantity'],
                'price'      => $details['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 3. XÓA GIỎ HÀNG TRONG SESSION
        session()->forget('cart');

        DB::commit();
        return redirect()->route('order.history')->with('success', 'Đặt hàng thành công!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Lỗi: ' . $e->getMessage());
    }
}

    // 3. Xem lịch sử đơn hàng
    public function getOrderHistory() {
        // Lấy đơn hàng cùng với danh sách sản phẩm thông qua quan hệ belongsToMany đã định nghĩa ở Model Order
        $orders = Order::with('products')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('page.order_history', compact('orders'));
    }
}
