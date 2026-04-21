@extends('master')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h4 class="mb-4">Xác nhận đơn hàng</h4>
            <div class="table-responsive">
                <table class="table">
                   @foreach($cartItems as $id => $item)
                    <tr>
                        <td><img src="{{ asset('images/'.$item['image']) }}" width="60"></td>
                        <td>
                            <h6>{{ $item['name'] }}</h6>
                            <small>{{ number_format($item['price']) }}đ</small>
                        </td>
                        <td>x{{ $item['quantity'] }}</td>
                        <td class="text-end">{{ number_format($item['price'] * $item['quantity']) }}đ</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5>Tạm tính</h5>
                    <div class="d-flex justify-content-between my-3">
                        <div class="d-flex justify-content-between my-3">
                            <span>Tổng tiền hàng:</span>
                            @php
                                $total = 0;
                                foreach($cartItems as $item) {
                                    $total += $item['price'] * $item['quantity'];
                                }
                            @endphp
                            <strong>{{ number_format($total) }}đ</strong>
                        </div>
                    </div>
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 py-2 fw-bold">XÁC NHẬN ĐẶT HÀNG</button>
                    </form>
                    <p class="small text-muted mt-3 text-center italic">* Thanh toán khi nhận hàng (COD)</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection