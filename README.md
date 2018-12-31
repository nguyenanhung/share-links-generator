# Share Links Generator Tools #

Con code này dùng để genarator link dùng share trên các mạng xã hội

### Hướng dẫn cài đặt

#### Cài đặt qua composer

```
composer create-project nguyenanhung/share-links-generator
```

#### Cài đặt source code

Sau khi create project về, open project và khai báo qua các bước sau

1. Khai báo trong biến base_url, file ***application/config.php***

example

```php
$config['base_url'] = 'http://fakelink.i9.io/';
```

2. Khai thông số Database trong file ***application/database.php***

```php
$db['default'] = array(
    'dsn' => '',
    'hostname' => 'localhost',
    'port' => 3306,
    'username' => 'root',
    'password' => '',
    'database' => 'share_links',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => FALSE
);
```

3. Import Data trong thư mục databases/ lên server với đúng db name đã khai báo ở bước 2
4. Quản lý link tại đường dẫn: your-domain.com/login.html, ví dụ: http://fakelink.i9.io/login.html

#### Thông tin quản lý 

**Username**: hungna

**Password**: IYmAEWKcU2YnI0mGJPQw5N0X1VxIk4hZ

được khai báo trong file **application/controllers/Login.php** -> dòng 28 + 29

```php
$config['users'] = array(
            1 => array(
                'username' => 'hungna',
                'password' => 'IYmAEWKcU2YnI0mGJPQw5N0X1VxIk4hZ'
            )
        );
```

Do source được thiết kế đơn giản nên không tập trung vào bảo mật do không có gì quá phức tạp cả, khai báo user trực tiếp trong hệ thống cho nhanh

### Thông tin liên hệ

Bộ source code được thiết kế bởi các thành viên sau đây


| Name        | Email                | Skype            | Facebook      |
| ----------- | -------------------- | ---------------- | ------------- |
| Hung Nguyen | dev@nguyenanhung.com | nguyenanhung5891 | @nguyenanhung |

From Hanoi with Love <3
