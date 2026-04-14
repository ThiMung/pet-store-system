@extends('master') 

@section('content')
<div class="container py-5">
    <h3 class="fw-bold mb-4 text-uppercase text-center">Danh mục sản phẩm</h3>

    <div class="d-flex justify-content-center gap-2 mb-5">
        <a href="{{ route('all_products') }}" 
           class="btn {{ Route::is('all_products') ? 'btn-pink' : 'btn-outline-secondary' }} rounded-pill px-4 shadow-sm">
           Tất cả
        </a>

        <a href="{{ route('category', 1) }}" 
           class="btn {{ (request()->route('id') == 1) ? 'btn-pink' : 'btn-outline-secondary' }} rounded-pill px-4 shadow-sm">
           Chó cảnh
        </a>

        <a href="{{ route('category', 2) }}" 
           class="btn {{ (request()->route('id') == 2) ? 'btn-pink' : 'btn-outline-secondary' }} rounded-pill px-4 shadow-sm">
           Mèo cảnh
        </a>

        <a href="{{ route('all_accessories') }}" 
           class="btn {{ Route::is('all_accessories') ? 'btn-pink' : 'btn-outline-secondary' }} rounded-pill px-4 shadow-sm">
           Phụ kiện
        </a>
    </div>

    <div class="row g-4">
        @if($products->count() > 0)
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="card border-0 shadow-sm h-100 product-item-custom">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('images/'.$product->image) }}" 
                             class="card-img-top p-2" 
                             alt="{{ $product->name }}" 
                             style="height: 220px; object-fit: cover; border-radius: 15px;">
                    </div>
                    
                    <div class="card-body text-center d-flex flex-column">
                        <h6 class="fw-bold text-dark text-truncate mb-2">{{ $product->name }}</h6>
                        
                        <div class="mt-auto">
                            <p class="text-pink fw-bold fs-5 mb-3">{{ number_format($product->price) }}đ</p>
                            
                            <a href="{{ route('chitiet', $product->id) }}" class="btn btn-warning w-100 text-white fw-bold rounded-pill py-2 shadow-sm buy-btn">
                                <i class="fa fa-shopping-cart me-1"></i> MUA NGAY
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12 text-center py-5">
                <p class="text-muted">Chưa có sản phẩm nào trong danh mục này.</p>
            </div>
        @endif
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $products->links() }}
    </div>
</div>

<style>
    /* Màu hồng chủ đạo của MNK Shop */
    .btn-pink, .text-pink {
        background-color: #ff85a2 !important;
        color: white !important;
    }
    .text-pink {
        background-color: transparent !important;
        color: #ff85a2 !important;
    }
    
    .btn-pink:hover {
        background-color: #ff6b8e !important;
    }

    /* Hiệu ứng Card giống trang chủ */
    .product-item-custom {
        border-radius: 20px !important; /* Bo góc mạnh như trang chủ */
        transition: all 0.3s ease;
    }

    .product-item-custom:hover {
        transform: translateY(-10px); /* Bay lên khi di chuột vào */
        box-shadow: 0 10px 20px rgba(255, 133, 162, 0.2) !important; /* Đổ bóng màu hồng nhạt */
    }

    .buy-btn {
        transition: 0.2s;
    }

    .buy-btn:hover {
        background-color: #e67e22 !important; /* Cam đậm hơn khi hover */
        transform: scale(1.05);
    }

    /* Fix lỗi phân trang Bootstrap nếu bị to */
    .pagination svg {
        width: 20px;
    }
</style>
@endsection