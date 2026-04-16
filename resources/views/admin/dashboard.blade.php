@extends('layouts.admin')

@section('title', 'Tổng quan cửa hàng')

@section('content')

<div class="grid grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
        <div>
            <p class="text-gray-400 text-sm font-medium">Tổng thú cưng</p>
            <h2 class="text-3xl font-bold mt-1">{{ $totalPets }}</h2>
            <p class="text-green-500 text-xs mt-1 font-semibold">↑ tăng trưởng</p>
        </div>
        <div class="w-12 h-12 bg-pink-100 text-pink-500 flex items-center justify-center rounded-2xl text-xl">🐶</div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
        <div>
            <p class="text-gray-400 text-sm font-medium">Tổng sản phẩm</p>
            <h2 class="text-3xl font-bold mt-1">{{ $totalProducts }}</h2>
            <p class="text-green-500 text-xs mt-1 font-semibold">↑ mới nhất</p>
        </div>
        <div class="w-12 h-12 bg-green-100 text-green-500 flex items-center justify-center rounded-2xl text-xl">🛍️</div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
        <div>
            <p class="text-gray-400 text-sm font-medium">Đơn hàng</p>
            <h2 class="text-3xl font-bold mt-1">{{ $totalOrders }}</h2>
            <p class="text-green-500 text-xs mt-1 font-semibold">↑ hàng tháng</p>
        </div>
        <div class="w-12 h-12 bg-blue-100 text-blue-500 flex items-center justify-center rounded-2xl text-xl">🛒</div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex justify-between items-center hover:shadow-md transition">
        <div>
            <p class="text-gray-400 text-sm font-medium">Người dùng</p>
            <h2 class="text-3xl font-bold mt-1">{{ $totalUsers }}</h2>
            <p class="text-green-500 text-xs mt-1 font-semibold">↑ tài khoản mới</p>
        </div>
        <div class="w-12 h-12 bg-yellow-100 text-yellow-500 flex items-center justify-center rounded-2xl text-xl">👥</div>
    </div>
</div>

{{-- <!-- TABLE -->
<div class="bg-white p-5 rounded-2xl shadow-sm">
    <h3 class="mb-4 font-semibold">🏆 Sản phẩm bán chạy nhất</h3>

    <table class="w-full text-sm">
        <thead class="text-gray-400">
            <tr>
                <th class="text-left py-2">#</th>
                <th>Tên</th>
                <th>Danh mục</th>
                <th>Giá</th>
                <th>Đã bán</th>
                <th>Đánh giá</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $i => $p)
            <tr class="border-t">
                <td class="py-3">{{ $i+1 }}</td>
                <td>{{ $p->name }}</td>
                <td>
                    <span class="bg-green-100 text-green-600 px-2 py-1 rounded-full text-xs">
                        {{ $p->category }}
                    </span>
                </td>
                <td>{{ number_format($p->price) }}đ</td>
                <td>{{ $p->sold }}</td>
                <td>⭐ {{ $p->rating ?? 4.5 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

<!-- SCRIPT -->
<script>
const revenues = @json($revenues);
const pets = @json($pets);

// LINE
new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: revenues.map(r => r.month),
        datasets: [{
            data: revenues.map(r => r.amount),
            borderColor: '#ec4899',
            backgroundColor: 'rgba(236,72,153,0.2)',
            fill: true,
            tension: 0.4
        }]
    }
});

// PIE
new Chart(document.getElementById('pieChart'), {
    type: 'doughnut',
    data: {
        labels: pets.map(p => p.type),
        datasets: [{
            data: pets.map(p => p.count),
            backgroundColor: ['#ec4899','#8b5cf6','#10b981']
        }]
    }
});
</script>

@endsection
