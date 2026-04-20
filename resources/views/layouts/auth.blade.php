<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body { background-color: #fce4ec; height: 100vh; display: flex; align-items: center; font-family: 'Segoe UI', sans-serif; }
        
        /* Card bo tròn theo mẫu nhóm */
        .auth-card { border-radius: 2rem; border: none;  box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        
        /* Header màu Gradient hồng/cam */
        .auth-header { 
            background: linear-gradient(135deg, #ff5e91 0%, #ff7676 100%); 
            padding: 2.5rem 1rem; 
            color: white; 
            text-align: center;
            border-radius: 2rem 2rem 0 0;
            position: relative; /* Quan trọng để logo bám vào đây */
        }
        
        /* Class xử lý bo tròn và định vị cho Logo (Sử dụng CSS thay vì Bootstrap để bo tròn chuẩn) */
        .logo-container {
    width: 80px; 
    height: 80px; 
    background: white; 
    border-radius: 50%; /* Bo tròn tuyệt đối */
    padding: 10px; 
    position: absolute; 
    top: -40px; /* Đẩy logo lên trên (nửa chiều cao) */
    left: 50%; /* Đưa ra giữa */
    transform: translateX(-50%); /* Căn giữa chính xác */
    box-shadow: 0 5px 15px rgba(0,0,0,0.1); /* Đổ bóng nhẹ cho nổi */
    display: flex; 
    align-items: center; 
    justify-content: center;
    
    /* === BẠN THÊM DÒNG NÀY VÀO ĐỂ SỬA LỖI BỊ KHUYẾT === */
    z-index: 99; /* Đảm bảo logo luôn nằm trên cùng, không bị che */
    /* ================================================= */
}
        
        .logo-img { max-width: 100%; max-height: 100%; border-radius: 50%; }

        /* Nút bấm bo tròn màu cam hồng */
        .btn-custom { background: #ff7676; color: white; border-radius: 1rem; font-weight: bold; border: none; padding: 12px; transition: 0.3s; }
        .btn-custom:hover { background: #ff5e91; color: white; transform: translateY(-2px); }
        
        /* Input bo tròn theo mẫu */
        .form-control { border-radius: 1rem; background: #f8f9fa; border: 1px solid #eee; padding: 12px 15px; }
        .form-control:focus { background: #f1f3f5; box-shadow: none; border-color: #ff7676; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card auth-card">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>