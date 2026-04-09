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
                <a class="nav-link active" href="{{ route('trangchu') }}">TRANG CHỦ</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown">
                        THÚ CƯNG
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('category', 1) }}">Chó Cảnh</a></li>
                        <li><a class="dropdown-item" href="{{ route('category', 2) }}">Mèo Cảnh</a></li>
                    </ul>
                </li>

                <a class="nav-link" href="{{ route('all_accessories') }}">PHỤ KIỆN</a>
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
                    <form action="{{ route('search') }}" method="GET" class="search-group">
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
                    @auth
                        <span class="text-white fw-bold">Xin chào, {{ Auth::user()->name }}</span>
                        
                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn-logout">
                                <i class="fa fa-sign-out-alt"></i> Đăng xuất
                            </button>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="btn-login">
                            <i class="fa fa-sign-in-alt"></i> Đăng nhập
                        </a>
                        <a href="{{ route('register') }}" class="btn-register">
                            <i class="fa fa-user-plus"></i> Đăng ký
                        </a>
                    @endguest
                    {{-- <a href="{{ route('login') }}" class="btn-login"><i class="fa fa-sign-in-alt"></i> Đăng nhập</a>
                    <a href="{{ route('register') }}" class="btn-register"><i class="fa fa-user-plus"></i> Đăng ký</a> --}}
                </div>
            </div>
        </div>
    </div>
</header>
