@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')

@section('content')

<!-- ACTION + TAB -->
<div class="mb-6">

    <!-- BUTTON -->
    <div class="mb-4">
        <button class="bg-gradient-to-r from-pink-500 to-orange-600 text-white px-5 py-2.5 rounded-xl shadow-lg hover:shadow-pink-200 transition-all font-bold text-sm">
            + Thêm sản phẩm
        </button>
    </div>

    <!-- TAB -->
    <div class="flex items-center gap-3">

        <a href="{{ route('admin.products', ['type'=>'all']) }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition
           {{ ($type=='all'||!$type)
                ? 'bg-gradient-to-r from-pink-500 to-orange-600 text-white shadow'
                : 'bg-pink shadow-sm hover:bg-gray-100' }}">
           📦 Tổng sản phẩm
        </a>

        <a href="{{ route('admin.products', ['type'=>'cho']) }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition
           {{ $type=='cho'
                ? 'bg-gradient-to-r from-pink-500 to-orange-600 text-white shadow'
                : 'bg-pink shadow-sm hover:bg-gray-100' }}">
           🐶 Chó
        </a>

        <a href="{{ route('admin.products', ['type'=>'meo']) }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition
           {{ $type=='meo'
                ? 'bg-gradient-to-r from-pink-500 to-orange-600 text-white shadow'
                : 'bg-pink shadow-sm hover:bg-gray-100' }}">
           🐱 Mèo
        </a>

        <a href="{{ route('admin.products', ['type'=>'accessory']) }}"
           class="px-5 py-2 rounded-full text-sm font-medium transition
           {{ $type=='accessory'
                ? 'bg-gradient-to-r from-pink-500 to-orange-600 text-white shadow'
                : 'bg-pink shadow-sm hover:bg-gray-100' }}">
           🧸 Phụ kiện
        </a>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white p-5 rounded-2xl shadow-sm">

<table class="w-full text-sm">
    <thead class="text-gray-400">
        <tr>
            <th>ID</th>
            <th>Hình</th>
            <th class="text-left">Tên</th>
            <th>Danh mục</th>
            <th>Giá</th>
            <th>Đã bán</th>
            <th>Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $p)
        <tr class="border-t text-center hover:bg-gray-50 transition">
            <td class="py-3">{{ $p->id }}</td>

            <td>
                <img src="{{ asset('images/'.$p->image) }}"
                     class="w-12 h-12 rounded-full object-cover mx-auto">
            </td>

            <td class="text-left font-medium">{{ $p->name }}</td>

            <td>
                @if($p->product_type == 'pet')
                    @if($p->category_id == 1)
                        <span class="bg-pink-100 text-pink-500 px-3 py-1 rounded-full text-xs">🐶 Chó</span>
                    @else
                        <span class="bg-blue-100 text-blue-500 px-3 py-1 rounded-full text-xs">🐱 Mèo</span>
                    @endif
                @else
                    <span class="bg-green-100 text-green-500 px-3 py-1 rounded-full text-xs">🧸 Phụ kiện</span>
                @endif
            </td>

            <td class="font-medium">{{ number_format($p->price) }}đ</td>
            <td>{{ $p->sold }}</td>

            <td class="flex justify-center gap-3">
                <a href="#" class="text-yellow-500 hover:scale-110 transition">✏️</a>
                <a href="#" class="text-red-500 hover:scale-110 transition">🗑️</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- PAGINATION -->
<div class="mt-4">
    {{ $products->links() }}
</div>

</div>

@endsection
