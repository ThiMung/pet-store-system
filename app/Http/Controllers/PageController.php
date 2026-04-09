<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class PageController extends Controller
{
    public function index() {
        // Lấy Product kèm theo dữ liệu quan hệ từ bảng Pet
        $allPets = Product::with('pet')
            ->where('product_type', 'pet')
            ->get();

        // Lọc ra danh sách Chó (category_id = 1) và Mèo (category_id = 2)
        // Chúng ta lọc ngay tại Controller để View nhẹ hơn
        $dogs = $allPets->filter(function($item) {
            return $item->pet && $item->pet->category_id == 1;
        })->take(4);

        $cats = $allPets->filter(function($item) {
            return $item->pet && $item->pet->category_id == 2;
        })->take(4);

        $accessories = Product::where('product_type', 'accessory')->take(4)->get();

        return view('page.trangchu', compact('dogs', 'cats', 'accessories'));
    }

    public function detail($id) {
        // Lấy sản phẩm kèm theo thông tin chi tiết từ bảng pet hoặc accessory
        $product = Product::with(['pet', 'accessory'])->findOrFail($id);
        
        return view('page.chitietsp', compact('product'));
    }

        // 1. Hàm Tìm kiếm
    public function search(Request $request) {
        $keyword = $request->keyword;
        $products = Product::where('name', 'like', '%'.$keyword.'%')->paginate(8);
        return view('page.loaisp', compact('products', 'keyword'));
    }

    // 2. Hàm Lọc danh mục (Chó/Mèo)
    public function category($id) {
        $products = Product::whereHas('pet', function($query) use ($id) {
            $query->where('category_id', $id);
        })->paginate(8);
        return view('page.loaisp', compact('products'));
    }

    // 3. Hàm Tất cả phụ kiện
    public function allAccessories() {
        $products = Product::where('product_type', 'accessory')->paginate(8);
        return view('page.loaisp', compact('products'));
    }
}
