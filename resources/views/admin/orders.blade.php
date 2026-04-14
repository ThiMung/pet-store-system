@extends('layouts.admin')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="mb-6 bg-white p-6 rounded-2xl shadow-sm">
    <h2 class="text-2xl font-bold mb-2">Đơn hàng gần đây</h2>
    <p class="text-gray-500 text-sm mb-4">Xem tất cả đơn hàng và quản lý trạng thái</p>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="py-4 px-4 font-semibold text-gray-600">Mã đơn</th>
                    <th class="py-4 px-4 font-semibold text-gray-600">Khách hàng</th>
                    <th class="py-4 px-4 font-semibold text-gray-600">Sản phẩm</th>
                    <th class="py-4 px-4 font-semibold text-gray-600">Tổng tiền</th>
                    <th class="py-4 px-4 font-semibold text-gray-600">Ngày đặt</th>
                    <th class="py-4 px-4 font-semibold text-gray-600">Trạng thái</th>
                    <th class="py-4 px-4 font-semibold text-gray-600">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="py-4 px-4 font-medium">#ORD-{{ str_pad($order->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td class="py-4 px-4">{{ $order->user->name ?? 'Khách lẻ' }}</td>
                    <td class="py-4 px-4 text-gray-500 text-sm">{{ $order_de->product_ids ?? 'N/A' }}</td>
                    <td class="py-4 px-4 font-bold text-red-600">{{ number_format($order->total_price) }}đ</td>
                    <td class="py-4 px-4 text-gray-500">{{ $order->created_at->format('d/m/Y') }}</td>
                    <td class="py-4 px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold {{ $order->status == 'completed' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                            {{ $order->status == 'completed' ? 'Hoàn thành' : 'Đang xử lý' }}
                        </span>
                    </td>
                    <td class="py-4 px-4">
                        <button class="text-blue-500 hover:scale-110 transition">🔄</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
