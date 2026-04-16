@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')

@section('content')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="mb-4">
    <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus-lg me-1"></i> Thêm sản phẩm mới
    </button>
</div>

<ul class="nav nav-pills mb-4 bg-white p-2 rounded-3 shadow-sm">
    <li class="nav-item">
        <a class="nav-link {{ ($type=='all'||!$type) ? 'active' : '' }}" href="{{ route('admin.products', ['type'=>'all']) }}">
            <i class="bi bi-grid-fill me-2"></i> Tất cả
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $type=='cho' ? 'active' : '' }}" href="{{ route('admin.products', ['type'=>'cho']) }}">
            <i class="bi bi-paw-fill me-2"></i> Chó cảnh
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $type=='meo' ? 'active' : '' }}" href="{{ route('admin.products', ['type'=>'meo']) }}">
            <i class="bi bi-moon-stars-fill me-2"></i> Mèo cảnh
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ $type=='accessory' ? 'active' : '' }}" href="{{ route('admin.products', ['type'=>'accessory']) }}">
            <i class="bi bi-bag-heart-fill me-2"></i> Phụ kiện
        </a>
    </li>
</ul>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Danh mục</th>
                        <th>Giá bán</th>
                        <th class="text-center">Đã bán</th>
                        <th class="text-center pe-4">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $p)
                    <tr>
                        <td class="ps-4 text-muted">#{{ $p->id }}</td>
                        <td>
                            <img src="{{ asset('images/'.$p->image) }}" class="rounded-3 shadow-sm" style="width:48px;height:48px;object-fit:cover;">
                        </td>
                        <td><span class="fw-bold text-dark">{{ $p->name }}</span></td>
                        <td>
                            @if($p->product_type == 'pet')
                                @if($p->category_id == 1)
                                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">
                                        <i class="bi bi-paw-fill me-1"></i> Chó
                                    </span>
                                @else
                                    <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                                        <i class="bi bi-moon-stars-fill me-1"></i> Mèo
                                    </span>
                                @endif
                            @else
                                <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">
                                    <i class="bi bi-bag-heart-fill me-1"></i> Phụ kiện
                                </span>
                            @endif
                        </td>
                        <td><span class="fw-bold text-dark">{{ number_format($p->price) }}đ</span></td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark border">{{ $p->sold }}</span>
                        </td>
                        <td class="text-center pe-4">
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-outline-warning btn-sm border-0" title="Sửa" 
                                        data-bs-toggle="modal" data-bs-target="#editModal{{$p->id}}">
                                    <i class="bi bi-pencil-square fs-5"></i>
                                </button>
                                <a href="{{ route('admin.products.destroy', $p->id) }}" 
                                   class="btn btn-outline-danger btn-sm border-0" 
                                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')">
                                    <i class="bi bi-trash3-fill fs-5"></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="editModal{{$p->id}}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <form action="{{ route('admin.products.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-warning text-dark">
                                        <h5 class="modal-title"><i class="bi bi-pencil-square me-2"></i>Chỉnh sửa sản phẩm #{{$p->id}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body p-4 text-start">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Tên sản phẩm</label>
                                                <input type="text" name="name" class="form-control" value="{{ $p->name }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Giá bán (VNĐ)</label>
                                                <input type="number" name="price" class="form-control" value="{{ $p->price }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label fw-bold">Phân loại chính</label>
                                                <select name="product_type" class="form-select edit-type-select" data-id="{{$p->id}}">
                                                    <option value="pet" {{ $p->product_type == 'pet' ? 'selected' : '' }}>Thú cưng</option>
                                                    <option value="accessory" {{ $p->product_type == 'accessory' ? 'selected' : '' }}>Phụ kiện</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 {{ $p->product_type == 'accessory' ? 'd-none' : '' }}" id="edit_category_group{{$p->id}}">
                                                <label class="form-label fw-bold">Chi tiết loài</label>
                                                <select name="category_id" class="form-select">
                                                    <option value="1" {{ $p->category_id == 1 ? 'selected' : '' }}>Chó cảnh</option>
                                                    <option value="2" {{ $p->category_id == 2 ? 'selected' : '' }}>Mèo cảnh</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label fw-bold">Ảnh hiện tại</label>
                                                <div class="mb-2">
                                                    <img src="{{ asset('images/'.$p->image) }}" class="rounded border" style="width: 80px; height: 80px; object-fit: cover;">
                                                </div>
                                                <label class="form-label fw-bold">Thay đổi hình ảnh (Để trống nếu giữ nguyên)</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-warning px-4">Cập nhật thay đổi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-4">
            {{ $products->links() }}
        </div>
    </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="bi bi-plus-circle me-2"></i>Thêm sản phẩm mới</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 text-start">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold"><i class="bi bi-info-circle me-1"></i> Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" placeholder="Ví dụ: Poodle nâu đỏ" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold"><i class="bi bi-currency-dollar me-1"></i> Giá bán</label>
                            <input type="number" name="price" class="form-control" placeholder="Nhập giá tiền" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold"><i class="bi bi-grid-3x3-gap me-1"></i> Phân loại chính</label>
                            <select name="product_type" id="product_type_select" class="form-select">
                                <option value="pet">Thú cưng (Chó/Mèo)</option>
                                <option value="accessory">Phụ kiện</option>
                            </select>
                        </div>
                        <div class="col-md-6" id="category_group">
                            <label class="form-label fw-bold"><i class="bi bi-tags me-1"></i> Chi tiết loài</label>
                            <select name="category_id" class="form-select">
                                <option value="1">Chó cảnh</option>
                                <option value="2">Mèo cảnh</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold"><i class="bi bi-image me-1"></i> Hình ảnh sản phẩm</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy bỏ</button>
                    <button type="submit" class="btn btn-primary px-4">Lưu sản phẩm</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // JS cho Modal Thêm
    document.getElementById('product_type_select').addEventListener('change', function() {
        const categoryGroup = document.getElementById('category_group');
        if (this.value === 'accessory') {
            categoryGroup.classList.add('d-none');
        } else {
            categoryGroup.classList.remove('d-none');
        }
    });

    // JS cho tất cả Modal Sửa (Dùng class để bắt sự kiện cho nhiều modal)
    document.querySelectorAll('.edit-type-select').forEach(select => {
        select.addEventListener('change', function() {
            const id = this.getAttribute('data-id');
            const group = document.getElementById('edit_category_group' + id);
            if (this.value === 'accessory') {
                group.classList.add('d-none');
            } else {
                group.classList.remove('d-none');
            }
        });
    });
</script>

@endsection