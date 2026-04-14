<header class="sticky-top bg-white shadow-sm">
    <div class="container py-2">
        <div class="d-flex justify-content-between align-items-center">
            <div class="logo d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" width="100" alt="">
                <div class="ms-2">
                    <h4 class="mb-0 fw-bold text-pink">MNK Shop</h4>
                    <small class="text-muted">Thú Cưng Yêu Thương</small>
                </div>
            </div>
           <nav class="nav top-nav">
    <a class="nav-link {{ Route::is('trangchu') ? 'active' : '' }}" href="{{ route('trangchu') }}">
        TRANG CHỦ
    </a>

    <a class="nav-link {{ Route::is('all_products') || Route::is('category') || Route::is('all_accessories') ? 'active' : '' }}" 
       href="{{ route('all_products') }}">
        TẤT CẢ SẢN PHẨM
    </a>

    <a class="nav-link" href="#">GIỚI THIỆU</a>
    <a class="nav-link" href="#">LIÊN HỆ</a>
</nav>
            <div class="cart-box d-flex align-items-center">
                <i class="fa fa-shopping-cart fs-4 me-2"></i>
                <div>
                    <div class="fw-bold">Giỏ hàng</div>
                    <small>0 sản phẩm - 0đ</small>
                </div>
            </div>
        </div>
    </div>

    <div class="search-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <form method="GET" class="search-group">
                        <input type="text" name="keyword" placeholder="Tìm thú cưng, phụ kiện..." required>
                        <button type="submit" class="btn-search-main">
                            <i class="fa fa-search"></i>
                        </button>
                        <button type="button" class="btn-photo">
                            <i class="fa fa-camera"></i>
                        </button>
                    </form>
                </div>
                <div class="col-md-5 d-flex justify-content-between">
                    <button class="btn-ai"><i class="fa fa-sparkles"></i> Tư Vấn AI</button>
                   <a href="{{ route('login') }}" class="btn-login text-decoration-none">
    <i class="fa fa-sign-in-alt"></i> Đăng nhập
</a>

<a href="{{ route('register') }}" class="btn-register text-decoration-none">
    <i class="fa fa-user-plus"></i> Đăng ký
</a>
                </div>
            </div>
        </div>
    </div>
</header>
