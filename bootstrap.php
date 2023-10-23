<?php

define('ROOTDIR', __DIR__ . DIRECTORY_SEPARATOR);

require_once ROOTDIR . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOTDIR);
$dotenv->load(); // Tải các biến môi trường từ .env file 

use Illuminate\Database\Capsule\Manager;

$manager = new Manager(); // Đối tượng dùng để quản lý cơ sở dữ liệu 

$manager->addConnection([ // Thêm những thông tin cấu hình để kết nối đến database ở đây.
	'driver'    => 'mysql',
	'host'      => $_ENV['DB_HOST'],
	'database'  => $_ENV['DB_NAME'],
	'username'  => $_ENV['DB_USER'],
	'password'  => $_ENV['DB_PASS'],
]);

$manager->setAsGlobal(); // Đặt đối tượng quản lý cơ sở dữ liệu làm toàn cục 
$manager->bootEloquent(); // Khởi động Eloquent