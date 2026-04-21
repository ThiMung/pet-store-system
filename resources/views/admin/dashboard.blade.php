@extends('layouts.admin')

@section('title', 'Tổng quan cửa hàng')

@section('content')

<div class="row row-cols-1 row-cols-md-4 g-4 mb-4">
    <div class="col">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-secondary small fw-medium">Tổng thú cưng</div>
                    <div class="fs-2 fw-bold mt-1">{{ $totalPets }}</div>
                    <div class="text-success small fw-semibold mt-1"><i class="bi bi-arrow-up"></i> tăng trưởng</div>
                </div>
                <div class="d-flex align-items-center justify-content-center rounded-3 bg-danger-subtle text-danger fs-3" style="width:48px;height:48px;">
                    <i class="bi bi-emoji-smile"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-secondary small fw-medium">Tổng sản phẩm</div>
                    <div class="fs-2 fw-bold mt-1">{{ $totalProducts }}</div>
                    <div class="text-success small fw-semibold mt-1"><i class="bi bi-arrow-up"></i> mới nhất</div>
                </div>
                <div class="d-flex align-items-center justify-content-center rounded-3 bg-success-subtle text-success fs-3" style="width:48px;height:48px;">
                    <i class="bi bi-bag"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-secondary small fw-medium">Tổng đơn hàng</div>
                    <div class="fs-2 fw-bold mt-1">{{ $totalOrders }}</div>
                    <div class="text-success small fw-semibold mt-1"><i class="bi bi-arrow-up"></i> hàng tháng</div>
                </div>
                <div class="d-flex align-items-center justify-content-center rounded-3 bg-primary-subtle text-primary fs-3" style="width:48px;height:48px;">
                    <i class="bi bi-cart"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-secondary small fw-medium">Tổng người dùng</div>
                    <div class="fs-2 fw-bold mt-1">{{ $totalUsers }}</div>
                    <div class="text-success small fw-semibold mt-1"><i class="bi bi-arrow-up"></i> tài khoản mới</div>
                </div>
                <div class="d-flex align-items-center justify-content-center rounded-3 bg-warning-subtle text-warning fs-3" style="width:48px;height:48px;">
                    <i class="bi bi-people"></i>
                </div>
            </div>
        </div>
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

<!-- TABLE: Sản phẩm bán chạy nhất (Bootstrap) -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <h5 class="card-title mb-3"><i class="bi bi-trophy"></i> Sản phẩm bán chạy nhất</h5>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-start">#</th>
                        <th>Tên</th>
                        <th>Danh mục</th>
                        <th>Giá</th>
                        <th>Đã bán</th>
                        <th>Đánh giá</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $i => $p)
                    <tr>
                        <td class="text-start">{{ $i+1 }}</td>
                        <td>{{ $p->name }}</td>
                        <td>
                            <span class="badge bg-success-subtle text-success">{{ $p->category }}</span>
                        </td>
                        <td>{{ number_format($p->price) }}đ</td>
                        <td>{{ $p->sold }}</td>
                        <td><i class="bi bi-star-fill text-warning"></i> {{ $p->rating ?? 4.5 }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
