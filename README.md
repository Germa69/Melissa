# Cấu hình

? Lệnh clone project từ git về

git clone https://github.com/Germa69/Melissa.git

? Khi clone về sẽ không chứa phần vendor và .env

B1: composer install 

B2: Chuyển file .env.example thành .env

B3: Cấp lại key cho file .env
`php artisan key:generate` 

B4: Đổi tên mục DB_DATABASE trong file .env trùng với tên database

# Tạo cơ sở dữ liệu
B1: Truy cập vào trang `http://localhost/phpmyadmin/`

B2: Tạo 1 tên cơ sở dữ liệu 
`Lưu ý: Chọn mã đối chiếu "utf8_general_ci" để viết unicode`

? Không cần phải import dữ liệu vội mình sẽ dùng lệnh của laravel để push dữ liệu nên (OK)

# Hướng dẫn thiết lập domain ảo trong xampp
 
B1: Truy cập vào >> C:\Windows\System32\drivers\etc

B2: Truy cập vào >> D:\Xampp\apache\conf\extra

Lưu ý: B2 ổ C hay ổ D tùy thuộc vào chỗ ông lưu trữ xampp

# Sử dụng migration và seeder để đẩy dữ liệu lên CSDL
? Lưu ý: Phải nhập tên database trong file .env

Cách 1: php artisan migrate => Chỉ đẩy bảng lên CSDL
Cách 2: php artisan migrate --seed => Đẩy cả bảng lẫn dữ liệu fake được lên CSDL
Cách 3: php artisan migrate:refresh --seed => Load lại bảng lẫn dữ liệu fake được lên CSDL
Cách 4: php artisan db:seed => Nó sẽ fake tất cả các seeder tạo dữ liệu và đẩy lên CSDL
Cách 5: php artisan db:seed --class="Tên seeder" => Nó sẽ chỉ định 1 seeder tạo dữ liệu và đẩy lên CSDL

# Thêm 1 số thư viện

```
Docs [toastr]: https://github.com/brian2694/laravel-toastr
```

# Cấu trúc lại thư mục 

```
1. public
2. views
3. routes
```

# Phần bổ sung vào đồ án

## `Admin`

```
Cập nhật lại giao diện login
Validate dữ liệu đầu vào
Thêm check session khi login hệ thống
Thêm profile cho người dùng
Mật khẩu dùng phương thức Hash để mã hóa mật khẩu
```

## `Khách hàng`

```
Thêm chỉnh sửa profile, đổi mật khẩu,...
```

Note: 
    - Một số chức năng kia tôi sẽ cố gắng update nhé!!
    - Nếu không hiểu ở đâu ib fakebook hỏi tôi nhé!!
    - Muốn bổ sung gì nói với tôi để ông và tôi giải quyết nhé!!
