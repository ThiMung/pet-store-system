@extends('master') @section('content')
<div class="container cart-container" style="padding: 50px 10%;">
    <h2>GIỎ HÀNG CỦA BẠN</h2>
    
    @if(session('success'))
        <div class="alert alert-success" style="color: green; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; text-align: left; border-collapse: collapse;">
        <thead>
            <tr style="border-bottom: 2px solid #ddd;">
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;"><img src="{{ $details['image'] }}" width="80" alt="{{ $details['name'] }}"></td>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ number_format($details['price']) }}đ</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" style="background: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px;">Giỏ hàng của bạn đang trống!</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div style="text-align: right; margin-top: 20px;">
        <h3>Tổng tiền: <strong style="color: red;">{{ number_format($total) }}đ</strong></h3>
        @if(session('cart') && count(session('cart')) > 0)
            <button style="background: green; color: white; padding: 10px 20px; border: none; cursor: pointer; font-size: 16px;">THANH TOÁN</button>
        @endif
    </div>
</div>
@endsection