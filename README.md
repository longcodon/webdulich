# Travel Booking System

Travel Booking System là một ứng dụng web được phát triển dựa trên framework Laravel, nhằm hỗ trợ quản lý và đặt tour du lịch. Ứng dụng cung cấp giao diện quản trị viên để quản lý danh mục, tour, lịch trình, thư viện ảnh và booking, cùng với giao diện người dùng để khách hàng xem thông tin và đặt tour trực tuyến.

## Cấu trúc dự án

Dự án được tổ chức trong thư mục `app/Http/Controllers` với các controller chính:

- **Base Controllers**:
  - `Controller.php`: Controller cơ sở, kế thừa từ Laravel, tích hợp các trait `AuthorizesRequests` và `ValidatesRequests` để xử lý phân quyền và xác thực dữ liệu.

- **Admin Controllers**:
  - `BookingController.php`: Quản lý đặt tour (xem danh sách, chi tiết, thêm booking).
  - `CategoriesController.php`: Quản lý danh mục tour (thêm, chỉnh sửa, xóa danh mục với hỗ trợ danh mục cha/con).
  - `GalleryController.php`: Quản lý thư viện ảnh cho tour (thêm nhiều ảnh, xóa ảnh).
  - `ScheduleController.php`: Quản lý lịch trình và chính sách tour (thêm, cập nhật lịch trình).
  - `ToursController.php`: Quản lý thông tin tour (thêm, chỉnh sửa, xóa tour).

- **Frontend Controllers**:
  - `HomeController.php`: Hiển thị dashboard quản trị sau khi đăng nhập (yêu cầu xác thực qua middleware `auth`).
  - `IndexController.php`: Điều khiển giao diện người dùng (trang chủ, danh sách tour theo danh mục, chi tiết tour).

## Yêu cầu hệ thống

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL hoặc cơ sở dữ liệu tương thích (SQLite, PostgreSQL, v.v.)
- Web server (Apache hoặc Nginx)

## Chức năng chính

### Quản trị (Admin)
- **Quản lý danh mục**:
  - Tạo mới, chỉnh sửa, xóa danh mục tour.
  - Hỗ trợ danh mục phân cấp (danh mục cha và danh mục con).
  - Tự động tạo slug từ tiêu đề.
- **Quản lý tour**:
  - Thêm tour với đầy đủ thông tin (tiêu đề, mô tả, giá, ngày đi/về, phương tiện, số lượng, v.v.).
  - Chỉnh sửa và xóa tour.
  - Tạo mã tour ngẫu nhiên và slug tự động.
- **Quản lý thư viện ảnh**:
  - Thêm nhiều ảnh cho một tour cùng lúc.
  - Xóa ảnh khỏi thư viện.
- **Quản lý lịch trình**:
  - Thêm hoặc cập nhật lịch trình, chính sách, dịch vụ bao gồm/không bao gồm cho tour.
- **Quản lý đặt tour**:
  - Xem danh sách booking.
  - Xem chi tiết booking với thông tin tour liên quan.
  - Kiểm tra trùng lặp booking dựa trên email, số điện thoại và mã tour.

### Người dùng (Frontend)
- **Trang chủ**:
  - Hiển thị danh mục chính và danh sách tour mới nhất.
- **Danh sách tour**:
  - Lọc tour theo danh mục qua slug.
- **Chi tiết tour**:
  - Xem thông tin chi tiết tour, lịch trình, thư viện ảnh và các tour liên quan.
- **Đặt tour**:
  - Gửi yêu cầu đặt tour với thông tin cá nhân (họ tên, email, số điện thoại) và số lượng khách.

## Các thư viện sử dụng

- **Toastr**:
  - Hiển thị thông báo giao diện người dùng (thành công, lỗi) với giao diện đẹp mắt.
  - Ví dụ: `toastr()->success('Data has been saved successfully!', 'Congrats');`
- **Illuminate\Support\Str**:
  - Tạo slug tự động từ tiêu đề (ví dụ: `Str::slug($data['title'])`).
- **Laravel Validation**:
  - Xác thực dữ liệu đầu vào với thông báo lỗi tùy chỉnh bằng tiếng Việt.
- **Laravel Eloquent**:
  - Quản lý quan hệ giữa các model (`Tour`, `Category`, `Gallery`, `Schedule`, `Booking`).
- **Laravel Filesystem**:
  - Xử lý upload và lưu trữ hình ảnh vào thư mục `uploads/`.

## Ghi chú

- **Quyền thư mục**:
  - Đảm bảo thư mục `uploads/` (và các thư mục con: `uploads/tours/`, `uploads/galleries/`, `uploads/categories/`) có quyền ghi: `chmod -R 775 uploads/`.
- **Chưa hoàn thiện**:
  - Một số chức năng như `edit` trong `BookingController` hoặc `destroy` trong `ScheduleController` chưa được triển khai đầy đủ.
  - Chức năng tìm kiếm tour hoặc phân trang danh sách tour chưa có.
- **Hiệu suất**:
  - Khi số lượng tour lớn, cần tối ưu truy vấn bằng cách sử dụng `pagination` thay vì `get()` trong các phương thức `index`.
- **Bảo mật**:
  - Nên thêm middleware CSRF và kiểm tra quyền truy cập cho các route quản trị.
  - Cân nhắc mã hóa thông tin nhạy cảm như email hoặc số điện thoại trong cơ sở dữ liệu.

## Đóng góp

Chúng tôi hoan nghênh mọi đóng góp để cải thiện dự án. Để tham gia:

1. **Fork repository**:
   - Nhấn nút "Fork" trên GitHub để tạo bản sao của repository.
2. **Tạo branch mới**:
   ```bash
   git checkout -b feature/your-feature
