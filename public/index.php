<?php
ini_set('display_errors', '1'); // Bật hiển thị lỗi và báo cáo tất cả các lỗi
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once __DIR__ . '/../bootstrap.php'; // Yêu cầu bootstrap script để khởi tạo dự án.

define('APPNAME', 'Jeikei Store');
session_start();

$router = new \Bramus\Router\Router();
// Xử lý các yêu cầu đến từ người dùng và định tuyến chúng đến các phương thức xử lý tương ứng

// Auth routes
$router->post('/logout', '\App\Controllers\Auth\LoginController@destroy');
$router->get('/register', '\App\Controllers\Auth\RegisterController@create');
$router->post('/register', '\\App\Controllers\Auth\RegisterController@store');
$router->get('/login', '\App\Controllers\Auth\LoginController@create');
$router->post('/login', '\App\Controllers\Auth\LoginController@store');
$router->get('/orders/(\d+)', '\App\Controllers\HomeController@order');
$router->post('/orders/(\d+)', '\App\Controllers\HomeController@ordered');
$router->get('/detail/(\d+)', '\App\Controllers\HomeController@detail');
$router->get('/orderhistory', '\App\Controllers\HomeController@orderhistory');
$router->post('/search', '\App\Controllers\HomeController@search');
$router->get('/profile', '\App\Controllers\HomeController@showprofile');
$router->get('/editprofile', '\App\Controllers\HomeController@editprofile');
$router->post('/editprofile', '\App\Controllers\HomeController@saveprofile');

// Admin routes
$router->post('/admin/logout', '\App\Controllers\Auth\AdminLoginController@destroy');
$router->get('/admin/login', '\App\Controllers\Auth\AdminLoginController@create');
$router->post('/admin/login', '\App\Controllers\Auth\AdminLoginController@store');
$router->get('/admin/register', '\App\Controllers\Auth\AdminRegisterController@create');
$router->post('/admin/register', '\App\Controllers\Auth\AdminRegisterController@store');
$router->get('/admin/addproduct', '\App\Controllers\AdminController@create');
$router->post('/admin/addproduct', '\App\Controllers\AdminController@store');
$router->get('/admin/editproduct/(\d+)', '\App\Controllers\AdminController@edit');
$router->post('/admin/(\d+)', '\App\Controllers\AdminController@update');
$router->post('/admin/delete/(\d+)', '\App\Controllers\AdminController@destroy');
$router->get('/admin/customers', '\App\Controllers\AdminController@show');
$router->post('/admin/delete/user/(\d+)', '\App\Controllers\AdminController@deleteuser');
$router->get('/admin/orders', '\App\Controllers\AdminController@showorders');
$router->post('/admin/deleteorder/(\d+)', '\App\Controllers\AdminController@deleteorder');
$router->post('/admin/updateorder/(\d+)', '\App\Controllers\AdminController@updateorder');

// Default routes
$router->get('/', '\App\Controllers\HomeController@index');
$router->get('/home', '\App\Controllers\HomeController@index');
$router->get('/admin', '\App\Controllers\AdminController@index');
$router->set404('\App\Controllers\Controller@sendNotFound');
$router->run(); // Chạy router để xử lý những yêu cầu của người dùng.
