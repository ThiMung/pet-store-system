# Pet Store System

## Mô tả dự án
Pet Store System là ứng dụng web giúp người dùng xem, tìm kiếm, mua thú cưng và quản lý thông tin người dùng, đơn hàng. Dự án sử dụng PHP framework **Laravel**.

## Mục tiêu
- Trải nghiệm mua sắm thú cưng dễ dàng.  
- Quản trị viên quản lý dữ liệu thú cưng, người dùng, đơn hàng.  
- Hỗ trợ AI tư vấn và nhận diện thú cưng.  
- Bảo mật thông tin người dùng.

## Tính năng chính

| STT | Tính năng | Mô tả |
|-----|-----------|-------|
| 1 | Trang chủ, header, footer | Xem thú cưng nổi bật, danh sách mới, chọn nhanh để mua. |
| 2 | Đăng ký, đăng nhập, phân quyền | Người dùng đăng ký mua thú cưng; hệ thống kiểm tra dữ liệu hợp lệ. |
| 3 | Tìm kiếm, bộ lọc | Tìm kiếm theo tên, lọc theo loại thú cưng (chó, mèo…). |
| 4 | Trang danh sách sản phẩm | Hiển thị toàn bộ thú cưng. |
| 5 | Chi tiết sản phẩm | Xem thông tin chi tiết trước khi mua. |
| 6 | Giỏ hàng | Thêm, xóa, cập nhật thú cưng, xem tổng tiền. |
| 7 | Đơn hàng | Đặt hàng, xem lại các đơn đã mua hoặc đang đặt. |
| 8 | Quản lý profile | Xem, chỉnh sửa thông tin cá nhân, đổi mật khẩu. |
| 9 | Admin dashboard | Quản trị viên tổng hợp dữ liệu thú cưng, người dùng, đơn hàng. |
| 10 | Manage | Quản lý thông tin thú cưng, người dùng, đơn hàng. |
| 11 | CRUD Pet | Thêm, sửa, xóa, cập nhật thú cưng. |
| 12 | Tích hợp AI tư vấn | Gợi ý thú cưng phù hợp với người dùng. |
| 13 | Tích hợp AI nhận diện | Nhận diện hình ảnh thú cưng, gợi ý loại và thông tin tương tự. |

## Công nghệ
- Backend: PHP 8, Laravel 10  
- Frontend: Blade, HTML, CSS, Bootstrap  
- Database: MySQL  
- Version Control: Git & GitHub  

## Cấu trúc
    ```bash
    pet-store-system/
    │
    ├─ app/          # Controllers, Models, Services
    ├─ database/     # Migration, Seeder, SQL mẫu
    ├─ public/       # CSS, JS, hình ảnh
    ├─ resources/    # Blade templates, assets
    ├─ routes/       # web.php, api.php
    └─ README.md
## Hướng dẫn cài đặt
1. Clone repo:
   ```bash
   git clone https://github.com/ThiMung/pet-store-system.git
2. Cài đặt composer:
    ```bash
    cd pet-store-system
    composer install
3. Copy file .env.example thành .env và cấu hình database:
    ```bash
    DB_DATABASE=pet_store
    DB_USERNAME=root
    DB_PASSWORD=
4. Chạy migration & seeder:
    ```bash
    php artisan migrate --seed
5. Chạy ứng dụng:
    ```bash
    php artisan serve
6. Truy cập: http://127.0.0.1:8000

## Nhóm phát triển
- Thành viên 1: Đinh Thị Mừng – Full-stack Developer
- Thành viên 2: Nguyễn Phúc Khuê – Full-stack Developer
- Thành viên 3: Hồ Thị Như – Full-stack Developer
