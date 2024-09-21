[![Latest Stable Version](https://img.shields.io/packagist/v/nguyenanhung/share-links-generator.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/share-links-generator)
[![Total Downloads](https://img.shields.io/packagist/dt/nguyenanhung/share-links-generator.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/share-links-generator)
[![License](https://img.shields.io/packagist/l/nguyenanhung/share-links-generator.svg?style=flat-square)](https://packagist.org/packages/nguyenanhung/share-links-generator)
[![PHP Version Require](https://img.shields.io/packagist/dependency-v/nguyenanhung/share-links-generator/php)](https://packagist.org/packages/nguyenanhung/share-links-generator)

# Share Links Generator Tools #

Con code này dùng để genarator link dùng share trên các mạng xã hội, được xây dựng dựa trên framework CodeIgniter, phiên bản đang sử dụng 3.1.9

## Screenshot Demo

### Màn hình Login

![](https://i.ibb.co/Rh1mTry/Screen-Shot-2021-09-16-at-03-25-12.jpg)

### Màn hình tạo link và quản lý link

![](https://i.ibb.co/QnR0K1L/Screen-Shot-2021-09-16-at-03-25-22.jpg)

![](https://i.ibb.co/xHCMZvk/Screen-Shot-2021-09-16-at-03-25-42.jpg)

## Hướng dẫn cài đặt

### Cài đặt qua composer

```
composer create-project nguyenanhung/share-links-generator
```

### Cài đặt source code

Sau khi create project về, open project và khai báo qua các bước sau

1. Khai báo trong biến base_url, file ***application/config.php*** thành địa chỉ tên miền của bạn

```php
$config['base_url'] = 'http://link.hungng.io/';
```

2. Khai thông số Database trong file ***application/database.php***

```php
$db['default'] = array(
    'dsn'          => 'mysql:host=mariadb;port=3306;dbname=share_links',
    'hostname'     => 'mariadb',
    'port'         => 3306,
    'username'     => 'root',
    'password'     => 'hungna',
    'database'     => 'share_links',
    'dbdriver'     => 'pdo',
    'dbprefix'     => '',
    'pconnect'     => false,
    'db_debug'     => (ENVIRONMENT !== 'production'),
    'cache_on'     => false,
    'cachedir'     => '',
    'char_set'     => 'utf8',
    'dbcollat'     => 'utf8_general_ci',
    'swap_pre'     => '',
    'encrypt'      => false,
    'compress'     => false,
    'stricton'     => false,
    'failover'     => array(),
    'save_queries' => false
);
```

3. Import Data trong thư mục databases/ lên server với đúng db name đã khai báo ở bước 2
4. Quản lý link tại đường dẫn: your-domain.com/login.html, ví dụ: http://link.hungng.io/login.html

### Thông tin quản lý

**Username**: `hungna`

**Password**: `IYmAEWKcU2YnI0mGJPQw5N0X1VxIk4hZ`

được khai báo trong file **application/controllers/Login.php** -> dòng 39 + 40

```php
$config['users'] = array(
            1 => array(
                'username' => 'hungna',
                'password' => 'IYmAEWKcU2YnI0mGJPQw5N0X1VxIk4hZ'
            )
        );
```

Do source được thiết kế đơn giản nên không tập trung vào bảo mật do không có gì quá phức tạp cả, khai báo user trực tiếp trong hệ thống cho nhanh

### Khởi chạy Docker

Source code tích hợp sẵn Docker với PHP 7.4. Có thể chạy nhanh theo hướng dẫn sau đây

- Cài đặt Docker theo hướng dẫn tại đây: https://www.docker.com/get-started
- Di chuyển vào thư mục lưu trữ source code

```shell
cd /path/to/project
```

- Build Docker

```shell
docker-compose build
```

- Run Docker

```shell
docker-compose up -d
```

- Truy cập vào đường dẫn: http://link.hungng.io

## Thông tin liên hệ

Bộ source code được thiết kế bởi các thành viên sau đây

| Name        | Email                | Skype            | Facebook      |
| ----------- | -------------------- | ---------------- | ------------- |
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Hanoi with Love <3
