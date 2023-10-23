<?php

// This file allows us to emulate Apache's "mod_rewrite" functionality from the built-in PHP web server.
// Provides a convenient way to test the application without having installed a "real" web server software.
// Usage:
// php -S localhost:8080 -t public/ server.php

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

if ($uri !== '/' && file_exists(__DIR__ . '/public' . $uri)) {
    return false;
}

require_once __DIR__ . '/public/index.php';

/* Đoạn code trên là một tệp tin PHP được sử dụng để mô phỏng chức năng "mod_rewrite" của Apache trên máy chủ web PHP tích hợp sẵn. Nó cung cấp một cách tiện lợi để kiểm tra ứng dụng mà không cần cài đặt phần mềm máy chủ web "thực sự". 

Cách sử dụng: 

- Chạy lệnh "php -S localhost:8080 -t public/ server.php" trên terminal để khởi động máy chủ web PHP tích hợp sẵn trên cổng 8080 và chỉ định thư mục "public" làm thư mục gốc. 
- Khi một yêu cầu HTTP được gửi đến máy chủ web, đoạn mã sẽ lấy URI từ yêu cầu và giải mã nó. 
- Nếu URI không phải là "/" và tệp tin tương ứng với URI tồn tại trong thư mục "public", máy chủ web sẽ trả về false và không xử lý yêu cầu. 
- Nếu URI là "/" hoặc tệp tin tương ứng không tồn tại trong thư mục "public", đoạn mã sẽ yêu cầu tệp tin "index.php" trong thư mục "public" để xử lý yêu cầu.
*/