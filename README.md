# Travel Booking System

Travel Booking System là một ứng dụng web được xây dựng bằng framework Laravel để quản lý và đặt tour du lịch. Ứng dụng cung cấp giao diện quản trị để quản lý danh mục, tour, lịch trình, thư viện ảnh và đặt chỗ, cùng với giao diện người dùng để xem và đặt tour.

## Cấu trúc dự án

Dự án được tổ chức trong thư mục `app/Http/Controllers` với các controller chính:

- **Base Controllers**:
  - `Controller.php`: Controller cơ sở kế thừa từ Laravel, sử dụng các trait `AuthorizesRequests` và `ValidatesRequests`.

- **Admin Controllers**:
  - `BookingController.php`: Quản lý đặt tour (xem danh sách, chi tiết, thêm mới).
  - `CategoriesController.php`: Quản lý danh mục tour (tạo, chỉnh sửa, xóa).
  - `GalleryController.php`: Quản lý thư viện ảnh của tour (thêm, xóa).
  - `ScheduleController.php`: Quản lý lịch trình và chính sách tour (thêm, chỉnh sửa).
  - `ToursController.php`: Quản lý tour (tạo, chỉnh sửa, xóa).

- **Frontend Controllers**:
  - `HomeController.php`: Hiển thị dashboard sau khi đăng nhập (yêu cầu xác thực).
  - `IndexController.php`: Điều khiển giao diện người dùng (trang chủ, danh sách tour theo danh mục, chi tiết tour).

## Yêu cầu hệ thống

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL hoặc cơ sở dữ liệu tương thích
- Web server (Apache/Nginx)

## Hướng dẫn cài đặt

1. **Clone repository**:
   ```bash
   git clone <repository-url>
   cd travel-booking-system
