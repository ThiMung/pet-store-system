@extends('layouts.auth')

@section('content')
<div class="auth-header position-relative">
    <button type="button" class="btn-close btn-close-white position-absolute end-0 top-0 m-3" aria-label="Close"></button>
    
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="Pet Logo" class="logo-img">
    </div>

    <h4 class="fw-bold m-0 mt-4">Đăng Nhập</h4>
    <small class="opacity-75">Chào mừng bạn trở lại!</small>
</div>

<div class="card-body p-4 pt-5"> @if(session('success'))
        <div class="alert alert-success rounded-pill px-3 py-2 small" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="small fw-bold text-secondary">Email</label>
            <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
        </div>
        <div class="mb-4">
            <label class="small fw-bold text-secondary">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>
        <button type="submit" class="btn btn-custom w-100 py-2 shadow-sm">Đăng Nhập</button>
    </form>
    
    <div class="text-center mt-4">
        <p class="small text-muted m-0">Chưa có tài khoản? <a href="{{ route('register') }}" class="text-decoration-none fw-bold" style="color: #4e5d78;">Đăng ký ngay</a></p>
    </div>
</div>
@endsection