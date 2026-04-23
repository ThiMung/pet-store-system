@extends('master')

@section('content')
<div class="container-fluid py-5 profile-container">
    <div class="container profile-wrapper">

        <div class="mb-3">
            <h2 class="fw-bold mb-1">Hồ sơ cá nhân</h2>
            <p class="text-muted small">Quản lý thông tin và cài đặt tài khoản của bạn</p>
        </div>

        <div class="card border-0 shadow-sm rounded-5 overflow-hidden mb-4 bg-white">
            <div class="profile-header">
                <div class="d-flex justify-content-end p-3">
                    <button class="btn btn-light btn-sm rounded-pill px-3 fw-bold shadow-sm text-pink" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                        <i class="bi bi-pencil me-1"></i> Chỉnh sửa
                    </button>
                </div>
            </div>

            <div class="px-4 pb-4 position-relative">
                <div class="position-absolute profile-avatar">
                    <div class="rounded-circle border border-4 border-white shadow-sm bg-white d-flex align-items-center justify-content-center fw-bold" style="width: 100%; height: 100%; font-size: 3rem; color: #333;">
                        {{ substr($user->name ?? 'N', 0, 1) }}
                        <button class="btn btn-danger position-absolute bottom-0 end-0 rounded-circle p-0 d-flex align-items-center justify-content-center profile-avatar-icon">
                            <i class="bi bi-camera-fill fs-6"></i>
                        </button>
                    </div>
                </div>

                <div style="margin-top: 80px;">
                    <h3 class="fw-bold mb-1">{{ $user->name ?? '' }}</h3>
                    <p class="text-muted small mb-4">Thành viên từ {{ $user->created_at->format('d/m/Y') }}</p>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-4 profile-info-card">
                                <div class="rounded-3 d-flex align-items-center justify-content-center text-white me-3 profile-info-icon email">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block profile-label">Email</small>
                                    <span class="small fw-bold">{{ $user->email ?? '' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-4 profile-info-card">
                                <div class="rounded-3 d-flex align-items-center justify-content-center text-white me-3 profile-info-icon phone">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block profile-label">Điện thoại</small>
                                    <span class="small fw-bold">{{ $user->phone ?? 'Chưa cập nhật' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-4 profile-info-card">
                                <div class="rounded-3 d-flex align-items-center justify-content-center text-white me-3 profile-info-icon address">
                                    <i class="bi bi-geo-alt"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block profile-label">Địa chỉ</small>
                                    <span class="small fw-bold">{{ $user->address ?? 'Chưa cập nhật' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-4 profile-info-card">
                                <div class="rounded-3 d-flex align-items-center justify-content-center text-white me-3 profile-info-icon joined">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block profile-label">Thời gian tham gia</small>
                                    <span class="small fw-bold">{{ $user->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-5 bg-white p-4">
            <div class="d-flex align-items-center mb-4">
                <div class="rounded-3 d-flex align-items-center justify-content-center text-white me-3 shadow-sm order-history-icon">
                    <i class="bi bi-bag-heart fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-0">Lịch sử đơn hàng</h5>
                    <p class="text-muted small mb-0">Quản lý và theo dõi các đơn hàng của bạn</p>
                </div>
            </div>

            <div class="list-group list-group-flush">
                @if($orders->count() > 0)
                    @foreach($orders as $order)
                <div class="d-flex align-items-center justify-content-between p-3 mb-3 rounded-4 shadow-sm border border-light order-item">
                    <div class="d-flex align-items-center">
                        <div class="rounded-3 d-flex align-items-center justify-content-center text-white me-3 order-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-2">
                                <span class="fw-bold small">#DH{{ $order->id }}</span>
                                <span class="badge bg-success rounded-pill order-status-badge">{{ $order->status }}</span>
                            </div>
                            <p class="text-muted small mb-1">{{ $order->products->pluck('name')->implode(', ') }}</p>
                            <small class="text-secondary order-date-label"><i class="bi bi-calendar3 me-1"></i> {{ $order->created_at->format('d/m/Y') }}</small>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="fw-bold text-danger">{{ number_format($order->total_price, 0, '.', ',') }}đ</div>
                        <a href="{{ route('order.history', $order->id) }}" class="text-decoration-none small order-detail-link">Xem chi tiết →</a>
                    </div>
                </div>
                    @endforeach
                @else
                <div class="text-center p-4">
                    <i class="bi bi-inbox" style="font-size: 2rem; color: #ccc;"></i>
                    <p class="text-muted mt-2">Bạn chưa có đơn hàng nào</p>
                </div>
                @endif
            </div>

            @if($orders->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal chỉnh sửa thông tin cá nhân -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 profile-page-modal-content">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="editProfileModalLabel">Chỉnh sửa thông tin cá nhân</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Họ và tên</label>
                        <input type="text" class="form-control rounded-3 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control rounded-3 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label fw-bold">Điện thoại</label>
                        <input type="text" class="form-control rounded-3 @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" placeholder="Nhập số điện thoại">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label fw-bold">Địa chỉ</label>
                        <textarea class="form-control rounded-3 @error('address') is-invalid @enderror" id="address" name="address" rows="3" placeholder="Nhập địa chỉ của bạn">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 p-3 rounded-3 profile-join-info">
                        <small class="text-muted d-block mb-2"><i class="bi bi-info-circle me-1"></i>Thời gian tham gia:</small>
                        <span class="fw-bold">{{ $user->created_at->format('d/m/Y H:i') }}</span>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary fw-bold flex-grow-1 rounded-3 profile-submit-btn">
                            <i class="bi bi-check2 me-1"></i>Lưu thay đổi
                        </button>
                        <button type="button" class="btn btn-secondary fw-bold flex-grow-1 rounded-3" data-bs-dismiss="modal">
                            <i class="bi bi-x me-1"></i>Hủy
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
