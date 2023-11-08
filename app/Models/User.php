<?php

namespace App\Models;

use App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name', 'email', 'password', 'phone', 'address','image', 'created_at'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    public static function validate(array $data)
    {
        $errors = [];

        if (!$data['email']) {
            $errors['email'] = 'Invalid email.';
        } elseif (static::where('email', $data['email'])->count() > 0) {
            $errors['email'] = 'Email already in use.';
        }

        if (strlen($data['password']) < 6) {
            $errors['password'] = 'Password must be at least 6 characters.';
        } elseif ($data['password'] != $data['password_confirmation']) {
            $errors['password'] = 'Password confirmation does not match.';
        }

        if (!$data['phone']) {
            $errors["phone"] = "Invalid phone.";
        }

        if (!$data["address"]) {
            $errors["address"] = "Invalid address.";
        }
        return $errors;
    }
}
