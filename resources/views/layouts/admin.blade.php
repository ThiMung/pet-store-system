<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PetShop Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Đảm bảo nội dung không bị Header che mất khi dùng sticky */
        .content-area { padding-top: 1.5rem; }
    </style>
</head>

<body class="bg-[#f1f5f9] flex">

<div class="w-[260px] h-screen sticky top-0 bg-gradient-to-b from-[#7f1d1d] via-[#b91c1c] to-[#dc2626] text-white p-6 flex flex-col shadow-xl">
    <div class="text-center mb-8">
        <img src="{{ asset('images/logo_for_admin.png') }}" class="w-300 h-300 mx-auto drop-shadow-lg">
        <div class="mt-2">
            <h4 class="mb-0 font-bold text-white text-xl">MNK Shop</h4>
            <small class="text-white/70">Thú Cưng Yêu Thương</small>
        </div>
    </div>

    <nav class="space-y-1">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 p-3 rounded-xl transition {{ request()->is('admin/dashboard') ? 'bg-white text-red-600 shadow' : 'hover:bg-white/10' }}">
           <span>📊</span> <span class="font-medium">Tổng quan</span>
        </a>

        <a href="{{ route('admin.products') }}"
           class="flex items-center gap-3 p-3 rounded-xl transition {{ request()->is('admin/products*') ? 'bg-white text-red-600 shadow' : 'hover:bg-white/10' }}">
           <span>📦</span> <span class="font-medium">Sản phẩm</span>
        </a>

        <a href="{{ route('admin.orders') }}"
           class="flex items-center gap-3 p-3 rounded-xl transition {{ request()->is('admin/orders*') ? 'bg-white text-red-600 shadow' : 'hover:bg-white/10' }}">
           <span>🛒</span> <span class="font-medium">Đơn hàng</span>
        </a>

        <a href="#" class="flex items-center gap-3 p-3 rounded-xl transition hover:bg-white/10">
           <span>👥</span> <span class="font-medium text-white/80">Người dùng</span>
        </a>

        <a href="#" class="flex items-center gap-3 p-3 rounded-xl transition hover:bg-white/10">

            <span>🤖</span> <span class="font-medium text-white/80">AI Analytics</span>

            </a>
</div>

<div class="flex-1 flex flex-col min-w-0">

    <header class="sticky top-0 z-50 flex justify-between items-center bg-white/80 backdrop-blur-md p-4 px-8 shadow-sm border-b">
        <div>
            <h1 class="text-xl font-bold text-gray-800">@yield('title')</h1>
            <p class="text-gray-400 text-xs">
                {{ \Carbon\Carbon::now()->locale('vi')->isoFormat('dddd, DD [tháng] MM, YYYY') }}
            </p>
        </div>

        <div class="flex items-center gap-4">
            <div class="flex items-center gap-3 bg-gray-50 p-1.5 pr-4 rounded-full border">
                <div class="w-8 h-8 rounded-full bg-pink-600 text-white flex items-center justify-center font-bold shadow-sm">
                    A
                </div>
                <span class="text-sm font-semibold text-gray-700">Admin</span>
            </div>
            <a href="#" class="text-red-500 font-bold text-sm hover:text-red-700 transition">Đăng xuất</a>
        </div>
    </header>

    <div class="p-8 content-area">
        @yield('content')
    </div>
</div>

</body>
</html>
