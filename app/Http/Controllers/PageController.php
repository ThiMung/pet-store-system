<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $allPets = Product::with('pet')->where('product_type', 'pet')->get();

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
        $product = Product::with(['pet', 'accessory'])->findOrFail($id);
        return view('page.chitietsp', compact('product'));
    }

    public function search(Request $request)
    {
        $keyword  = $request->keyword;
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate(8);
        return view('page.loaisp', compact('products', 'keyword'));
    }

    // Lọc danh mục Chó/Mèo
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
}
