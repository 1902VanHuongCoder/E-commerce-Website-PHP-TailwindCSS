<?php

namespace App;

use App\Models\User;

class SessionGuard // Lớp dùng để quản lý phiên đăng nhập của User 
{
    protected static $user;

    public static function login(User $user, array $credentials)
    {
        $verified = password_verify($credentials['password'], $user->password);
        if ($verified) {
            $_SESSION['user_id'] = $user->id;
        }
        return $verified;
    }

    public static function user()
    {
        if (!static::$user && static::isUserLoggedIn()) {
            static::$user = User::find($_SESSION['user_id']);
        }
        return static::$user;
    }

    // Đoạn code này là một phương thức tĩnh (static method) trong PHP, được định nghĩa trong một lớp (class). 
    // Nó có tên là "user" và được sử dụng để trả về đối tượng người dùng (user object) nếu người dùng đã đăng nhập. 
    // Cụ thể, phương thức này kiểm tra xem biến $user đã được khởi tạo hay chưa. Nếu chưa, nó kiểm tra xem người dùng đã đăng nhập hay chưa
    // bằng cách gọi phương thức tĩnh "isUserLoggedIn()" (không được định nghĩa trong đoạn mã này).
    // Nếu người dùng đã đăng nhập, phương thức sẽ tìm kiếm đối tượng người dùng (user object) với ID tương ứng trong cơ sở dữ liệu và 
    // gán nó cho biến $user. Cuối cùng, phương thức trả về biến $user. 
    // Tóm lại, đoạn mã này được sử dụng để lấy thông tin người dùng từ cơ sở dữ liệu nếu người dùng đã đăng nhập.

    public static function logout()
    {
        static::$user = null;
        session_unset();
        session_destroy();
    }

    public static function isUserLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
}