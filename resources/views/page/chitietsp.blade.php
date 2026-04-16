@extends('master')

@section('content')
<div class="container py-5">
    <div class="row bg-white p-4 rounded shadow-sm">
        <div class="col-md-6 text-center">
            <img src="{{ asset('images/'.$product->image) }}" class="img-fluid rounded shadow" style="max-height: 400px;">
        </div>

        <div class="col-md-6">
            <h2 class="fw-bold text-pink">{{ $product->name }}</h2>
            <h3 class="text-danger fw-bold">{{ number_format($product->price) }}đ</h3>
            <hr>
            
            <p><strong>Loại:</strong> {{ $product->product_type == 'pet' ? 'Thú cưng' : 'Phụ kiện' }}</p>
            
            @if($product->pet)
                <p><strong>Giống:</strong> {{ $product->pet->breed }}</p>
                <p><strong>Giới tính:</strong> {{ $product->pet->gender == 'male' ? 'Đực' : 'Cái' }}</p>
            @endif

            @if($product->accessory)
                <p><strong>Thương hiệu:</strong> {{ $product->accessory->brand }}</p>
            @endif

            <p><strong>Mô tả:</strong> {{ $product->description ?? 'Đang cập nhật nội dung...' }}</p>

            <div class="mt-4">
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="image" value="{{ asset('images/'.$product->image) }}">
                    
                    <button type="submit" class="btn btn-danger btn-lg px-5">
                        <i class="fas fa-cart-plus me-2"></i> THÊM VÀO GIỎ HÀNG
                    </button>
                </form>
            </div>
            </div>
    </div>
</div>
@endsection