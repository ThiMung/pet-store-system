@extends('master')

@section('content')
<div class="container mt-4">
    <div class="row mb-5">
        <div class="col-md-8">
            <div id="petCarousel" class="carousel slide carousel-fade shadow rounded-4 overflow-hidden" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <img src="{{ asset('images/cho-trang.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('images/meo-anh-long-dai.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('images/meo-munchkin.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;">
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <img src="{{ asset('images/o-nem,-giuong-ngu.jpg') }}" class="d-block w-100" style="height: 400px; object-fit: cover;">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white border rounded-4 p-4 mb-3 d-flex align-items-center shadow-sm" style="height: 190px;">
                <i class="fa fa-credit-card fs-1 text-warning me-3"></i>
                <h5 class="fw-bold">Sự kiện trong tháng</h5>
            </div>
            <div class="bg-white border rounded-4 p-4 d-flex align-items-center shadow-sm" style="height: 190px;">
                <i class="fa fa-shield-halved fs-1 text-success me-3"></i>
                <h5 class="fw-bold">Chính sách bảo hành</h5>
            </div>
        </div>
    </div>

    <div class="category-block">
        <div class="category-sidebar">
            <h5 class="fw-bold">CHÓ CẢNH</h5>
            <div class="my-3">⭐⭐⭐⭐⭐</div>
            <img src="{{ asset('images/cho-poodle.jpg') }}" class="img-fluid rounded-3">
        </div>
        <div class="category-content">
            <ul class="nav-tabs-custom">
                <li class="active">Phổ biến nhất</li>
            </ul>
            <div class="row">
                @foreach($dogs as $p)
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="{{ route('chitiet', $p->id) }}">
                            <img src="{{ asset('images/'.$p->image) }}" class="img-fluid">
                        </a>
                        
                        <div class="product-name">{{ $p->name }}</div>
                        <div class="product-price">{{ number_format($p->price) }}đ</div>
                        
                        <a href="{{ route('chitiet', $p->id) }}" class="btn btn-buy">
                            <i class="fa fa-eye"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="category-block">
        <div class="category-sidebar">
            <h5 class="fw-bold">MÈO CẢNH</h5>
            <div class="my-3">⭐⭐⭐⭐⭐</div>
            <img src="{{ asset('images/meo-munchkin.jpg') }}" class="img-fluid rounded-3">
        </div>
        <div class="category-content">
            <ul class="nav-tabs-custom">
                <li class="active">Phổ biến nhất</li>
            </ul>
            <div class="row">
                @foreach($cats as $p)
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="{{ route('chitiet', $p->id) }}">
                            <img src="{{ asset('images/'.$p->image) }}" class="img-fluid">
                            </a>
                        
                        <div class="product-name">{{ $p->name }}</div>
                        <div class="product-price">{{ number_format($p->price) }}đ</div>
                        
                        <a href="{{ route('chitiet', $p->id) }}" class="btn btn-buy">
                            <i class="fa fa-eye"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="category-block">
        <div class="category-sidebar">
            <h5 class="fw-bold">PHỤ KIỆN</h5>
            <p>Cho thú cưng của bạn</p>
            <img src="{{ asset('images/o-nem,-giuong-ngu.jpg') }}" class="img-fluid rounded-3">
        </div>
        <div class="category-content">
            <ul class="nav-tabs-custom">
                <li class="active">Bán chạy nhất</li>
            </ul>
            <div class="row">
                @foreach($accessories->take(4) as $a)
                <div class="col-md-3">
                    <div class="product-card">
                        <a href="{{ route('chitiet', $a->id) }}">
                            <img src="{{ asset('images/'.$a->image) }}" class="img-fluid">
                        </a>
                        
                        <div class="product-name">{{ $a->name }}</div>
                        <div class="product-price">{{ number_format($a->price) }}đ</div>
                        
                        <a href="{{ route('chitiet', $a->id) }}" class="btn btn-buy">
                            <i class="fa fa-eye"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection