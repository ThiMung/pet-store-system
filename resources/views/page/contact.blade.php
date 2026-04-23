@extends('master')

@section('content')
<div class="pb-5" style="background: linear-gradient(90deg, #ff7eb3, #ff758c); min-height: 320px;">
    <div class="container pt-4 pb-2">
        <h2 class="fw-bold text-white text-center mb-1" style="font-size:2.2rem;">Liên Hệ Với Chúng Tôi</h2>
        <div class="text-center text-white mb-4" style="opacity:.9;">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn 24/7</div>
        <div class="row g-3 justify-content-center">
            <div class="col-6 col-md-3">
                <div class="bg-white rounded shadow-sm p-3 text-center h-100">
                    <i class="bi bi-geo-alt-fill fs-2 text-danger"></i>
                    <div class="fw-bold mt-2">Địa Chỉ</div>
                    <div class="small text-muted">123 Đường Nguyễn Văn Linh, Quận 7, TP. Hồ Chí Minh</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="bg-white rounded shadow-sm p-3 text-center h-100">
                    <i class="bi bi-telephone-fill fs-2 text-success"></i>
                    <div class="fw-bold mt-2">Điện Thoại</div>
                    <div class="small text-muted">0123 456 789</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="bg-white rounded shadow-sm p-3 text-center h-100">
                    <i class="bi bi-envelope-fill fs-2 text-primary"></i>
                    <div class="fw-bold mt-2">Email</div>
                    <div class="small text-muted">contact@petshop.vn</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="bg-white rounded shadow-sm p-3 text-center h-100">
                    <i class="bi bi-clock-fill fs-2 text-warning"></i>
                    <div class="fw-bold mt-2">Giờ Mở Cửa</div>
                    <div class="small text-muted">Thứ 2 - Chủ Nhật: 8:00 - 20:00</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top:-120px;">
    <div class="row g-4 justify-content-center">
        <div class="col-lg-5">
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
        <div class="col-lg-5">
            <div class="bg-white rounded shadow p-4 h-100 mb-4">
                <h5 class="fw-bold mb-3"><i class="bi bi-map-fill text-success"></i> Bản Đồ</h5>
                <iframe src="https://www.google.com/maps?q=123+Nguyen+Van+Linh,+Quan+7,+TP+HCM&output=embed" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="d-flex gap-2 justify-content-center">
                <a href="#" class="btn btn-outline-primary"><i class="bi bi-facebook"></i></a>
                <a href="#" class="btn btn-outline-danger"><i class="bi bi-instagram"></i></a>
                <a href="#" class="btn btn-outline-info"><i class="bi bi-messenger"></i></a>
                <a href="#" class="btn btn-outline-danger"><i class="bi bi-youtube"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
