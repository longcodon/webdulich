Travel Booking System
Travel Booking System là một ứng dụng web được xây dựng bằng framework Laravel để quản lý và đặt tour du lịch. Ứng dụng cung cấp giao diện quản trị để quản lý danh mục, tour, lịch trình, thư viện ảnh và đặt chỗ, cùng với giao diện người dùng để xem và đặt tour.

Cấu trúc dự án
Dự án được tổ chức trong thư mục app/Http/Controllers với các controller chính:

Base Controllers:
Controller.php: Controller cơ sở kế thừa từ Laravel, sử dụng các trait AuthorizesRequests và ValidatesRequests.
Admin Controllers:
BookingController.php: Quản lý đặt tour (xem danh sách, chi tiết, thêm mới).
CategoriesController.php: Quản lý danh mục tour (tạo, chỉnh sửa, xóa).
GalleryController.php: Quản lý thư viện ảnh của tour (thêm, xóa).
ScheduleController.php: Quản lý lịch trình và chính sách tour (thêm, chỉnh sửa).
ToursController.php: Quản lý tour (tạo, chỉnh sửa, xóa).
Frontend Controllers:
HomeController.php: Hiển thị dashboard sau khi đăng nhập (yêu cầu xác thực).
IndexController.php: Điều khiển giao diện người dùng (trang chủ, danh sách tour theo danh mục, chi tiết tour).
Yêu cầu hệ thống
PHP >= 8.0
Composer
Laravel >= 9.x
MySQL hoặc cơ sở dữ liệu tương thích
Web server (Apache/Nginx)
Hướng dẫn cài đặt
Clone repository:
bash
Wrap
Copy
git clone <repository-url>
cd travel-booking-system
Cài đặt dependencies:
bash
Wrap
Copy
composer install
Sao chép file môi trường:
bash
Wrap
Copy
cp .env.example .env
Cấu hình file .env:
Cập nhật thông tin cơ sở dữ liệu:
text
Wrap
Copy
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travel_booking
DB_USERNAME=root
DB_PASSWORD=
Tạo key ứng dụng:
bash
Wrap
Copy
php artisan key:generate
Chạy migration:
bash
Wrap
Copy
php artisan migrate
Khởi động server:
bash
Wrap
Copy
php artisan serve
Truy cập ứng dụng tại: http://localhost:8000.
Chức năng chính
Quản trị (Admin)
Quản lý danh mục: Tạo, chỉnh sửa, xóa danh mục tour với danh mục cha/con.
Quản lý tour: Thêm, sửa, xóa tour với thông tin chi tiết (giá, ngày đi, phương tiện, v.v.).
Quản lý thư viện ảnh: Thêm/xóa ảnh cho từng tour.
Quản lý lịch trình: Thêm/cập nhật lịch trình và chính sách cho tour.
Quản lý đặt tour: Xem danh sách và chi tiết các booking của khách hàng.
Người dùng (Frontend)
Trang chủ: Hiển thị danh mục chính và danh sách tour nổi bật.
Xem tour theo danh mục: Lọc tour theo danh mục cụ thể.
Chi tiết tour: Xem thông tin tour, lịch trình, ảnh và các tour liên quan.
Đặt tour: Gửi yêu cầu đặt tour (tên, email, số điện thoại, số lượng người).
Các thư viện sử dụng
Toastr: Hiển thị thông báo thành công/lỗi.
Illuminate\Support\Str: Tạo slug tự động từ tiêu đề.
Ghi chú
Đảm bảo thư mục uploads/ có quyền ghi để lưu trữ hình ảnh (chmod -R 775 uploads/).
Một số chức năng (như edit trong BookingController) chưa được triển khai hoàn chỉnh.
Đóng góp
Nếu bạn muốn đóng góp vào dự án:

Fork repository.
Tạo branch mới (git checkout -b feature/your-feature).
Commit thay đổi (git commit -m "Add your feature").
Push lên branch (git push origin feature/your-feature).
Tạo Pull Request.
Liên hệ
Nếu có thắc mắc, vui lòng liên hệ qua email: [your-email@example.com].

Bạn có thể sao chép nội dung trên vào file README.md trong thư mục gốc của dự án. Nếu bạn muốn thêm thông tin cụ thể hơn (như tên dự án, email liên hệ, hoặc các tính năng tùy chỉnh), hãy cho tôi biết để tôi điều chỉnh!
