@extends('master')
@section('content')
<div class="container py-5">
    <h3 class="mb-4">Lịch sử mua hàng của bạn</h3>

    @if($orders->isEmpty())
        <div class="alert alert-light text-center border">
            Bạn chưa có đơn hàng nào. <a href="{{ route('trangchu') }}">Mua sắm ngay!</a>
        </div>
    @else
        @foreach($orders as $order)
        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <span><strong>Mã đơn: #MNK-{{ $order->id }}</strong> | Ngày đặt: {{ $order->created_at->format('d/m/Y H:i') }}</span>
                <span class="badge px-3 py-1 rounded-pill text-white"
                    style="background:{{ $order->status == 'pending' ? '#facc15' : '#22c55e' }};color:{{ $order->status == 'pending' ? '#b45309' : '#fff' }};font-weight:600;">
                    {{ $order->status_label }}
                </span>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>
                        <tr class="text-muted small">
                            <th>Sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-end">Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->products as $product)
                        <tr>
                            <td>
                                <img src="{{ asset('images/'.$product->image) }}" width="50" class="rounded me-2">
                                <b>{{ $product->name }}</b>
                            </td>
                            <td class="text-center">x{{ $product->pivot->quantity }}</td>
                            <td class="text-end">{{ number_format($product->pivot->price) }}đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted small">Phương thức: Thanh toán khi nhận hàng</span>
                    <h5 class="text-danger mb-0">Tổng tiền: {{ number_format($order->total_price) }}đ</h5>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection