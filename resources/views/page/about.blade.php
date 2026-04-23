@extends('master')

@section('content')
<div class="about-hero pb-5" style="background: linear-gradient(90deg, #ff7eb3, #ff758c); min-height: 240px;">
    <div class="container pt-4 pb-2">
        <h2 class="fw-bold text-white text-center mb-1" style="font-size:2.2rem;">Về Pet Shop</h2>
        <div class="text-center text-white mb-4" style="opacity:.9; font-size:1.4rem;">Mang đến niềm vui và hạnh phúc cho gia đình bạn với những bạn nhỏ đáng yêu</div>
    </div>
</div>
<div class="container about-main" style="margin-top:-90px; margin-bottom:40px;">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="row g-5 align-items-center flex-column-reverse flex-md-row mb-4">
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <h4 class="fw-bold mb-3">Câu Chuyện Của Chúng Tôi</h4>
                    <p class="text-black" style="font-size:1.14rem">Pet Shop được thành lập từ năm 2012 với sứ mệnh đem lại vui vẻ hạnh phúc cho thú cưng, đồng thời là cầu nối yêu thương của các gia đình yêu thú cưng phát triển mạnh mẽ trong những năm qua và trở thành hệ thống thú cưng lớn tại Việt Nam.<br><br>Với hơn 10 năm kinh nghiệm, chúng tôi tự hào đã giúp hơn 5.000 gia đình tìm được người bạn đồng hành hoàn hảo.</p>
                </div>
                <div class="col-12 col-md-6 text-center">
                    <img src="https://images.pexels.com/photos/45201/kitty-cat-kitten-pet-45201.jpeg" alt="Pet Story" class="img-fluid rounded shadow" style="max-width:350px;">
                </div>
            </div>
            <div class="row text-center g-3 mb-4">
                <div class="col-6 col-md-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="fw-bold" style="font-size:1.5rem;color:#ff5e62">10+</div>
                        <div class="small text-muted">Năm Kinh Nghiệm</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="fw-bold" style="font-size:1.5rem;color:#ff5e62">5,000+</div>
                        <div class="small text-muted">Khách Hàng Hài Lòng</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="fw-bold" style="font-size:1.5rem;color:#ff5e62">50+</div>
                        <div class="small text-muted">Giống Thú Cưng</div>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="fw-bold" style="font-size:1.5rem;color:#ff5e62">24/7</div>
                        <div class="small text-muted">Hỗ Trợ Khách Hàng</div>
                    </div>
                </div>
            </div>
            <h5 class="fw-bold mt-5 mb-3 text-center">Tại Sao Chọn Chúng Tôi?</h5>
            <div class="row g-3 mb-4 justify-content-center">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="d-flex align-items-center mb-2"><i class="bi bi-heart-fill text-danger fs-4 me-2"></i> <span class="fw-bold">Yêu Thương Thú Cưng</span></div>
                        <div class="small text-muted">Chúng tôi luôn coi thú cưng như thành viên trong gia đình, chăm sóc ân cần và tận tâm nhất.</div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="d-flex align-items-center mb-2"><i class="bi bi-award-fill text-primary fs-4 me-2"></i> <span class="fw-bold">Chất Lượng Cao</span></div>
                        <div class="small text-muted">Tất cả thú cưng đều xuất xứ rõ ràng, được kiểm tra sức khỏe và tiêm phòng đầy đủ.</div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="d-flex align-items-center mb-2"><i class="bi bi-tools text-info fs-4 me-2"></i> <span class="fw-bold">Bảo Hành & Hỗ Trợ</span></div>
                        <div class="small text-muted">Chế độ bảo hành sức khỏe 30 ngày và tư vấn chăm sóc miễn phí suốt đời.</div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="bg-white rounded shadow-sm p-3 h-100">
                        <div class="d-flex align-items-center mb-2"><i class="bi bi-people-fill text-success fs-4 me-2"></i> <span class="fw-bold">Đội Ngũ Chuyên Nghiệp</span></div>
                        <div class="small text-muted">Nhân viên đào tạo bài bản, tận tâm và am hiểu về từng giống thú cưng.</div>
                    </div>
                </div>
            </div>
            <div class="bg-danger bg-gradient rounded shadow p-4 text-white mt-4">
                <h6 class="fw-bold mb-2">Thông Tin Liên Hệ</h6>
                <div class="row">
                    <div class="col-12 col-md-6 mb-2">
                        <div><i class="bi bi-geo-alt-fill me-2"></i> Địa Chỉ: 123 Đường Nguyễn Văn Linh, Quận 7, TP. HCM</div>
                        <div><i class="bi bi-envelope-fill me-2"></i> Email: contact@petshop.vn</div>
                    </div>
                    <div class="col-12 col-md-6 mb-2">
                        <div><i class="bi bi-telephone-fill me-2"></i> Điện Thoại: 0123 456 789</div>
                        <div><i class="bi bi-clock-fill me-2"></i> Giờ Mở Cửa: Thứ 2 - Chủ Nhật: 8:00 - 20:00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .about-hero {
        min-height: 220px;
    }
    .about-main {
        margin-bottom: 40px;
    }
    @media (max-width: 991.98px) {
        .about-main {
            margin-top: -40px;
        }
    }
    @media (max-width: 767.98px) {
        .about-main {
            margin-top: 0;
        }
        .about-hero {
            min-height: 120px;
        }
    }
</style>
@endsection
