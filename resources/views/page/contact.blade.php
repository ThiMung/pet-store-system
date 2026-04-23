@extends('master')

@section('content')
<div class="contact-hero pb-5" style="background: linear-gradient(90deg, #ff7eb3, #ff758c); min-height: 260px;">
    <div class="container pt-4 pb-2">
        <h2 class="fw-bold text-white text-center mb-1" style="font-size:2.2rem;">Liên Hệ Với Chúng Tôi</h2>
        <div class="text-center text-white mb-4" style="opacity:.9; font-size:1.4rem;">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn 24/7</div>
    </div>
</div>
<div class="container contact-main" style="margin-top:-90px; margin-bottom:40px;">
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-lg-4 mb-4 mb-lg-0">
            <div class="bg-white rounded shadow-sm p-4 h-100 mb-3">
                <div class="row g-3">
                    <div class="col-6 col-md-12 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-geo-alt-fill fs-2 text-danger me-3"></i>
                            <div>
                                <div class="fw-bold">Địa Chỉ</div>
                                <div class="small text-muted">123 Đường Nguyễn Văn Linh, Quận 7, TP. Hồ Chí Minh</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-telephone-fill fs-2 text-success me-3"></i>
                            <div>
                                <div class="fw-bold">Điện Thoại</div>
                                <div class="small text-muted">0123 456 789</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope-fill fs-2 text-primary me-3"></i>
                            <div>
                                <div class="fw-bold">Email</div>
                                <div class="small text-muted">contact@petshop.vn</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-12">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-clock-fill fs-2 text-warning me-3"></i>
                            <div>
                                <div class="fw-bold">Giờ Mở Cửa</div>
                                <div class="small text-muted">Thứ 2 - Chủ Nhật: 8:00 - 20:00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-8">
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="bg-white rounded shadow p-4 h-100">
                        <h5 class="fw-bold mb-3"><i class="bi bi-chat-dots-fill text-primary"></i> Gửi Tin Nhắn</h5>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Họ và tên *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Số điện thoại *</label>
                                <input type="text" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Chủ đề *</label>
                                <select class="form-select" required>
                                    <option>Chọn chủ đề</option>
                                    <option>Hỗ trợ</option>
                                    <option>Góp ý</option>
                                    <option>Khác</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nội dung *</label>
                                <textarea class="form-control" rows="4" required></textarea>
                            </div>
                            <button class="btn btn-danger w-100" type="submit">Gửi Tin Nhắn</button>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="bg-white rounded shadow p-4 h-100">
                        <h5 class="fw-bold mb-3"><i class="bi bi-map-fill text-success"></i> Bản Đồ</h5>
                        <iframe src="https://www.google.com/maps?q=123+Nguyen+Van+Linh,+Quan+7,+TP+HCM&output=embed" width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .contact-hero {
        min-height: 220px;
    }
    .contact-main {
        margin-bottom: 40px;
    }
    @media (max-width: 991.98px) {
        .contact-main {
            margin-top: -40px;
        }
    }
    @media (max-width: 767.98px) {
        .contact-main {
            margin-top: 0;
        }
        .contact-hero {
            min-height: 120px;
        }
    }
</style>
@endsection
