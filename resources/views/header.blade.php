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

                <a class="nav-link {{ Route::is('about') ? 'active' : '' }}" href="{{ route('about') }}">GIỚI THIỆU</a>
                <a class="nav-link {{ Route::is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">LIÊN HỆ</a>
            </nav>
            @php
                $totalQuantity = 0;
                $totalPrice = 0;

                // Kiểm tra xem giỏ hàng có tồn tại trong session không
                if(session('cart')) {
                    foreach(session('cart') as $details) {
                        $totalQuantity += $details['quantity']; // Cộng dồn số lượng
                        $totalPrice += $details['price'] * $details['quantity']; // Tính tổng tiền
                    }
                }
            @endphp

            <a href="{{ route('cart.index') }}" style="text-decoration: none; color: inherit;">
                <div class="cart-box d-flex align-items-center" style="cursor: pointer;">
                    <i class="fa fa-shopping-cart fs-4 me-2"></i>
                    <div>
                        <div class="fw-bold">Giỏ hàng</div>
                        <small>{{ $totalQuantity }} sản phẩm - {{ number_format($totalPrice) }}đ</small>
                    </div>
                </div>
            </a>
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
                        {{-- <button type="button" class="btn-photo">
                            <i class="fa fa-camera"></i>
                        </button> --}}
                    </form>
                </div>
                <div class="col-md-5 d-flex justify-content-between">
                    <a href="{{ route('ai.consult') }}" class="btn-ai text-decoration-none">Tư Vấn AI</a>
                    @auth
                        <a href="{{ route('profile.index') }}" class="text-decoration-none" style="cursor: pointer;">
                            <span class="text-white fw-bold px-3 py-2 rounded-pill" style="transition: all 0.3s; background-color: #ff4d94; display: inline-block;">
                                Xin chào, {{ Auth::user()->name }}
                            </span>
                        </a>

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
                </div>
            </div>
        </div>
    </div>
</header>
