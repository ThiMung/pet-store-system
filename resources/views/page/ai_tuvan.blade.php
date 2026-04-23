@extends('master')
@section('content')
<div class="container py-5">
    @if(session('ai_error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('ai_error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 h-100 ai-card">
                <div class="card-header bg-gradient-primary text-white py-4">
                    <h5 class="card-title mb-0"><i class="fas fa-heart"></i> Tư vấn theo sở thích</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ai.recommend') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Mô tả sở thích của bạn</label>
                            <textarea class="form-control" name="user_conditions" rows="5" placeholder="Ví dụ: Tôi thích một chú chó nhỏ, ít rụng lông để nuôi trong chung cư..." required>{{ old('user_conditions') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Nhận tư vấn AI</button>
                    </form>

                    @if(session('ai_response') && !session('identified_breed'))
                        <div class="mt-4 p-3 bg-light border-start border-success border-4 rounded">
                            <h6 class="fw-bold text-success">Gợi ý từ chuyên gia AI:</h6>
                            <div class="ai-content-formatted">
                                {!! Str::markdown(session('ai_response')) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-lg border-0 h-100 ai-card">
                <div class="card-header bg-gradient-info text-white py-4">
                    <h5 class="card-title mb-0"><i class="fas fa-camera"></i> Nhận diện thú cưng</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ai.identify') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tải ảnh thú cưng</label>
                            <input type="file" class="form-control" id="pet_image" name="pet_image" accept="image/*" required>
                            <div id="imagePreview" class="mt-3 d-none">
                                <img src="" id="previewImg" class="img-fluid rounded shadow-sm" style="max-height: 150px;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info w-100 fw-bold text-white">Bắt đầu nhận diện</button>
                    </form>

                    @if(session('identified_breed'))
                        <div class="mt-4 alert alert-info">
                            <h6 class="fw-bold"><i class="fas fa-paw"></i> Kết quả: {{ session('identified_breed') }}</h6>
                            <hr>
                            <p class="mb-0 small">{!! session('ai_response') !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(session('similar_products'))
        <div class="row mt-5">
            <h4 class="fw-bold mb-4 text-primary text-center">Sản phẩm liên quan đến "{{ session('identified_breed') }}"</h4>
            @forelse(session('similar_products') as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 product-card">
                        {{-- Sử dụng data_get để an toàn cho cả Object và Array --}}
                        @php 
                            $image = data_get($product, 'image');
                            $name = data_get($product, 'name');
                            $price = data_get($product, 'price', 0);
                            $id = data_get($product, 'id');
                        @endphp

                        <img src="{{ asset('uploads/product/' . $image) }}" 
                             class="card-img-top" 
                             alt="{{ $name }}" 
                             style="height: 200px; object-fit: cover;"
                             onerror="this.src='{{ asset('images/cho-trang.jpg') }}'">
                        
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $name }}</h5>
                            <p class="text-danger fw-bold fs-5">{{ number_format($price, 0, ',', '.') }}₫</p>
                            <a href="{{ route('chitiet', $id) }}" class="btn btn-outline-primary btn-sm w-100">Chi tiết sản phẩm</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center w-100">
                    <p class="text-muted">Rất tiếc, shop hiện chưa có sản phẩm cho giống này.</p>
                </div>
            @endforelse
        </div>
    @endif
</div>

<style>
    .bg-gradient-primary { background: linear-gradient(135deg, #4e73df 0%, #224abe 100%) !important; }
    .bg-gradient-info { background: linear-gradient(135deg, #36b9cc 0%, #258391 100%) !important; }
    .ai-card:hover { transform: translateY(-3px); transition: 0.3s; }
    /* Format Markdown của AI */
    .ai-content-formatted ul { padding-left: 20px; margin-bottom: 0; }
    .ai-content-formatted p { margin-bottom: 8px; }
    .product-card:hover { border: 1px solid #4e73df; }
</style>

<script>
    document.getElementById('pet_image').addEventListener('change', function(e) {
        const reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById('previewImg').src = event.target.result;
            document.getElementById('imagePreview').classList.remove('d-none');
        }
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
@endsection