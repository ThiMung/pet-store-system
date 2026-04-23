<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // HÀM 1: Chỉ làm nhiệm vụ gọi form lên màn hình
    public function index() {
        $user = Auth::user();
        $orders = $user->orders()->with('products')->latest()->paginate(5);
        return view('profile', compact('user', 'orders'));
    }

    // HÀM 2: Xử lý dữ liệu cập nhật thông tin cá nhân
    public function updateInfo(Request $request) {
        $user = Auth::user();

        // Kiểm tra dữ liệu đầu vào (Validation)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        // Lưu vào cơ sở dữ liệu
        $user->update($request->only('name', 'email', 'phone', 'address'));

        return back()->with('success', 'Thông tin đã được cập nhật thành công!');
    }

    // HÀM 3: Xử lý dữ liệu đổi mật khẩu
    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Kiểm tra mật khẩu cũ
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng!']);
        }

        // Cập nhật mật khẩu mới
        $user->update(['password' => Hash::make($request->new_password)]);

        return back()->with('success', 'Mật khẩu đã được đổi thành công!');
    }
}
