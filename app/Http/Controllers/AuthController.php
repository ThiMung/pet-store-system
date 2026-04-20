<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Hiển thị form Đăng Nhập
    public function showLogin()
    {
        return view('auth.login');
    }

    // 2. Hiển thị form Đăng Ký
    public function showRegister()
    {
        return view('auth.register');
    }

    // 3. Xử lý Đăng Ký (Task 5: Kiểm tra dữ liệu & Bảo mật)
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.unique'       => 'Email này đã được sử dụng!',
            'password.min'       => 'Mật khẩu phải từ 8 ký tự trở lên.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // Mặc định quyền người dùng
        ]);

        return redirect()->route('login')->with('success', 'Đăng ký thành công!');
    }

    // 4. Xử lý Đăng Nhập
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Phân quyền điều hướng
            return auth()->user()->role === 'admin'
                ? redirect('/admin/dashboard')
                : redirect('/');
        }

        return back()->withErrors(['email' => 'Thông tin đăng nhập không chính xác.']);
    }

    // 5. Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
