@extends('layouts.admin')

@section('title', 'Tổng quan hệ thống')

@section('content')
<div class="container-fluid px-4">
    <h2 class="mt-4 mb-4 fw-bold">Tổng quan hệ thống</h2>

  <div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card p-3 border-0 text-white shadow-sm d-flex flex-row align-items-center justify-content-between" style="background-color: #0d6efd; height: 100px;">
            <div>
                <h6 class="opacity-75 mb-0">Tổng thú cưng</h6>
                <h3 class="fw-bold mb-0">{{ $stats['totalPets'] }}</h3>
            </div>
            <i class="bi bi-paw-fill fs-1 opacity-50"></i>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-0 text-white shadow-sm d-flex flex-row align-items-center justify-content-between" style="background-color: #198754; height: 100px;">
            <div>
                <h6 class="opacity-75 mb-0">Tổng sản phẩm</h6>
                <h3 class="fw-bold mb-0">{{ $stats['totalProducts'] }}</h3>
            </div>
            <i class="bi bi-box-seam fs-1 opacity-50"></i>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-0 text-white shadow-sm d-flex flex-row align-items-center justify-content-between" style="background-color: #ffc107; height: 100px;">
            <div>
                <h6 class="opacity-75 mb-0 text-dark">Tổng đơn hàng</h6>
                <h3 class="fw-bold mb-0 text-dark">{{ $stats['totalOrders'] }}</h3>
            </div>
            <i class="bi bi-cart-fill fs-1 opacity-50 text-dark"></i>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card p-3 border-0 text-white shadow-sm d-flex flex-row align-items-center justify-content-between" style="background-color: #0dcaf0; height: 100px;">
            <div>
                <h6 class="opacity-75 mb-0">Tổng người dùng</h6>
                <h3 class="fw-bold mb-0">{{ $stats['totalUsers'] }}</h3>
            </div>
            <i class="bi bi-people-fill fs-1 opacity-50"></i>
        </div>
    </div>
</div>

   

    <div class="row g-3">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-4" style="min-height: 400px;">
                <h5 class="fw-bold mb-3">Biểu đồ doanh thu</h5>
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4" style="min-height: 400px;">
                <h5 class="fw-bold mb-3">Sản phẩm mới nhất</h5>
                <div class="list-group list-group-flush">
                    @foreach($products as $p)
                    <div class="d-flex align-items-center py-3 border-bottom">
                        <img src="{{ asset('images/'.$p->image) }}" class="rounded me-3" style="width: 50px; height: 50px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="fw-bold text-dark">{{ $p->name }}</div>
                            <small class="text-muted">{{ number_format($p->price) }}đ</small>
                        </div>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Cấu hình biểu đồ doanh thu đơn giản
    const ctx = document.getElementById('revenueChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
        // Lấy danh sách tháng
        labels: {!! json_encode($revenues->pluck('month')) !!},
        datasets: [{
            label: 'Doanh thu thực tế (VNĐ)',
            // Lấy danh sách số tiền tương ứng
            data: {!! json_encode($revenues->pluck('amount')) !!},
            borderColor: '#0d6efd',
            fill: true
        }]
    }
});
</script>
@endsection
