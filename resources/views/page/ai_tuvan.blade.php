@extends('master')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header bg-danger text-white p-3">
                    <h5 class="mb-0"><i class="fas fa-robot"></i> Trợ Lý Tư Vấn Thú Cưng (AI)</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('ai.getRecommendation') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="fw-bold mb-2">Hãy chia sẻ về điều kiện sống và sở thích của bạn:</label>
                            <textarea name="user_conditions" class="form-control" rows="5" 
                                placeholder="Ví dụ: Tôi ở chung cư, đi làm cả ngày, muốn tìm một người bạn nhỏ ít kêu và dễ chăm sóc..." required>{{ session('old_input') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-danger w-100 fw-bold">NHẬN LỜI KHUYÊN TỪ AI</button>
                    </form>

                    @if(session('ai_response'))
                        <hr class="my-4">
                        <div class="bg-light p-3 rounded border-start border-danger border-4">
                            <h6 class="text-danger fw-bold"><i class="fas fa-comment-dots"></i> Gợi ý dành cho bạn:</h6>
                            <div class="mt-2 ai-content">
                                {!! session('ai_response') !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection