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
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('auth/adminlogin', $data);
    }

    public function store()
    {
        $user_credentials = $this->filterUserCredentials($_POST);
        $errors = [];
        $user = Admin::where('email', $user_credentials['email'])->first();
        
        if (!$user) {
            // Người dùng không tồn tại...
            $errors['email'] = 'Invalid email';
        } else if (Guard::adminlogin($user, $user_credentials)) {
            // Đăng nhập thành công...
            redirect('/admin');

        } else {
            // Sai mật khẩu...
            $errors['password'] = 'Invalid password.';
        }

        // Đăng nhập không thành công: lưu giá trị trong form, trừ password
        $this->saveFormValues($_POST, ['password']);
        redirect('admin/login', ['errors' => $errors]);
    }

    public function destroy()
    {
        Guard::logout();
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
