<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
}
