<?php

namespace App\Controllers\Auth;

use App\Models\Admin;
use App\Controllers\Controller;
use App\SessionGuard as Guard;

class AdminLoginController extends Controller
{
    public function create()
    {
        if (Guard::isAdminLoggedIn()) {
            redirect('/admin');
        }
        $data = [
            'messages' => session_get_once('messages'),
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors'),
            'checkLogin' => session_get_once("checkLogin")
        ];

        $this->sendPage('auth/adminlogin', $data);
    }

    public function store()
    {
        $admin_credentials = $this->filterUserCredentials($_POST);
        $errors = [];
        $admin = Admin::where('email', $admin_credentials['email'])->first();
        
        if (!$admin) {
            // Người dùng không tồn tại...
            $errors['email'] = 'Invalid email';
        } else if (Guard::adminlogin($admin, $admin_credentials)) {
            // Đăng nhập thành công...
            redirect('/admin');
        } else {
            // Sai mật khẩu...
            $errors['password'] = 'Invalid password.';
        }

        $checkLogin = "Index.php return";
        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        $this->saveFormValues($_POST, ['password']);
        redirect('/admin/login', ['errors' => $errors, 'checkLogin' => $checkLogin]);
    }

    public function destroy()
    {
        Guard::adminlogout();
        redirect('admin/login');
    }

    protected function filterUserCredentials(array $data)
    {
        return [
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? null
        ];
    }
}
