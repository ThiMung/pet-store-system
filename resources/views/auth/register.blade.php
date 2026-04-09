@extends('layouts.auth')

@section('content')
<div class="auth-header position-relative">
    <button type="button" class="btn-close btn-close-white position-absolute end-0 top-0 m-3" aria-label="Close"></button>
    
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="Pet Logo" class="logo-img">
    </div>

    <h4 class="fw-bold m-0 mt-4">Đăng Ký</h4>
    <small class="opacity-75">Tạo tài khoản thành viên mới</small>
</div>

<div class="card-body p-4 pt-5">
    <form action="{{ route('register') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="small fw-bold text-secondary">Họ và tên</label>
            <div class="input-group mt-1">
                <span class="input-group-text bg-light border-0" style="border-radius: 1rem 0 0 1rem;"><i class="bi bi-person text-muted"></i></span>
                <input type="text" name="name" class="form-control" style="border-radius: 0 1rem 1rem 0 !important;" placeholder="Nguyễn Văn A" value="{{ old('name') }}" required>
            </div>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="small fw-bold text-secondary">Email</label>
            <div class="input-group mt-1">
                <span class="input-group-text bg-light border-0" style="border-radius: 1rem 0 0 1rem;"><i class="bi bi-envelope text-muted"></i></span>
                <input type="email" name="email" class="form-control" style="border-radius: 0 1rem 1rem 0 !important;" placeholder="pet@example.com" value="{{ old('email') }}" required>
            </div>
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="small fw-bold text-secondary">Mật khẩu</label>
            <div class="input-group mt-1">
                <span class="input-group-text bg-light border-0" style="border-radius: 1rem 0 0 1rem;"><i class="bi bi-lock text-muted"></i></span>
                <input type="password" name="password" class="form-control" style="border-radius: 0 1rem 1rem 0 !important;" placeholder="••••••••" required>
            </div>
            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label class="small fw-bold text-secondary">Xác nhận mật khẩu</label>
            <div class="input-group mt-1">
                <span class="input-group-text bg-light border-0" style="border-radius: 1rem 0 0 1rem;"><i class="bi bi-shield-check text-muted"></i></span>
                <input type="password" name="password_confirmation" class="form-control" style="border-radius: 0 1rem 1rem 0 !important;" placeholder="••••••••" required>
            </div>
        </div>

        <button type="submit" class="btn btn-custom w-100 py-2 shadow-sm">Đăng Ký</button>
    </form>
    
    <div class="text-center mt-4">
        <p class="small text-muted m-0">Đã có tài khoản? <a href="{{ route('login') }}" class="text-decoration-none fw-bold" style="color: #4e5d78;">Đăng nhập</a></p>
    </div>
</div>
@endsection