@extends('layouts.auth')

@section('content')
<div class="auth-header position-relative">
    <button type="button" class="btn-close btn-close-white position-absolute end-0 top-0 m-3" aria-label="Close"></button>
    <div class="logo-container">
        <img src="{{ asset('images/logo.png') }}" alt="Pet Logo" class="logo-img">
    </div>
    <h4 class="fw-bold m-0 mt-4">Chi Tiết Sản Phẩm</h4>
    <small class="opacity-75">Thông tin chi tiết về sản phẩm/dịch vụ</small>
</div>
<div class="card-body p-4 pt-5">
    <div class="mb-4">
        <img src="{{ asset('images/cho-poodle.jpg') }}" alt="Sản phẩm" class="img-fluid rounded mb-3" style="max-height: 250px;">
        <h5 class="fw-bold">Chó Poodle</h5>
        <p class="text-secondary">Chó Poodle là giống chó thông minh, thân thiện và rất được yêu thích tại Việt Nam. Chúng có bộ lông xoăn đặc trưng, dễ thương và phù hợp với nhiều gia đình.</p>
        <ul class="list-group mb-3">
            <li class="list-group-item">Tuổi: 2 tháng</li>
            <li class="list-group-item">Giới tính: Đực</li>
            <li class="list-group-item">Giá: 5.000.000 VNĐ</li>
        </ul>
        <a href="{{ url('/') }}" class="btn btn-custom">Quay lại trang chủ</a>
    </div>
</div>
@endsection
