<?php

namespace App\Controllers\Auth;

use App\Models\Admin;
use App\Controllers\Controller;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create()
    {
        $data = [
            'old' => $this->getSavedFormValues(),
            'errors' => session_get_once('errors')
        ];

        $this->sendPage('auth/adminregister', $data);
    }

    public function store()
    {
        $this->saveFormValues($_POST, ['password', 'password_confirmation']);

        $data = $this->filterUserData($_POST);
        $model_errors = Admin::validate($data);
        if (empty($model_errors)) {
            $this->createUser($data);

            $messages = ['success' => 'User has been created successfully.'];
            redirect('/admin/login', ['messages' => $messages]);
        }
        redirect('/admin/register', ['errors' => $model_errors]);
    }

    protected function filterUserData(array $data)
    {
        return [
            'name' => $data['name'] ?? null,
            'email' => filter_var($data['email'], FILTER_VALIDATE_EMAIL),
            'password' => $data['password'] ?? null,
            'password_confirmation' => $data['password_confirmation'] ?? null,
        ];
    }

    protected function createUser($data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'created_at' =>  date('Y-m-d H:i:s')
        ]);
    }
}
