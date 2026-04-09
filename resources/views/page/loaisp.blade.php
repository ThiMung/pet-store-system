@extends('master')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold mb-4 text-pink">
        {{ isset($keyword) ? "Kết quả tìm kiếm cho: '$keyword'" : "Danh sách sản phẩm" }}
    </h3>

    <div class="row">
        @foreach($products as $p)
        <div class="col-md-3 mb-4">
            <div class="product-card">
                <a href="{{ route('chitiet', $p->id) }}">
                    <img src="{{ asset('images/'.$p->image) }}" class="img-fluid">
                </a>
                <div class="product-name">{{ $p->name }}</div>
                <div class="product-price">{{ number_format($p->price) }}đ</div>
                <a href="{{ route('chitiet', $p->id) }}" class="btn btn-buy">Mua ngay</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>
@endsection