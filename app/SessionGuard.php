<?php
namespace App;
use App\Models\User;
use App\Models\Admin;

class SessionGuard // Lớp dùng để quản lý phiên đăng nhập của User 
{
    protected static $user;
    protected static $admin;

    public static function login(User $user, array $credentials)
    {
        $verified = password_verify($credentials['password'], $user->password);
        if ($verified) {
            $_SESSION['user_id'] = $user->id;
        }
        return $verified;
    }

    public static function user() // trả về user đã đăng nhập  
    {
        if (!static::$user && static::isUserLoggedIn()) {
            static::$user = User::find($_SESSION['user_id']);
        }
        return static::$user;
    }



    public static function adminlogin(Admin $admin, array $credentials)
    {
        $verified = password_verify($credentials['password'], $admin->password);
        if ($verified) {
            $_SESSION['admin_id'] = $admin->id;
        }
        return $verified;
    }


    public static function admin()
    {
        if (!static::$admin && static::isAdminLoggedIn()) {
            static::$admin = Admin::find($_SESSION['admin_id']);
        }
        return static::$admin;
    }

    public static function logout()
    {
        static::$user = null;
        session_unset();
        session_destroy();
    }

    public static function Adminlogout()
    {
        static::$admin = null;
        session_unset();
        session_destroy();
    }


    public static function isUserLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }


    public static function isAdminLoggedIn()
    {
        return isset($_SESSION['admin_id']);
    }
}
