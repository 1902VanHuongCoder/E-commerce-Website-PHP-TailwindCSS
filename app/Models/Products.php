<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'size', 'color'];
    // public function products()
    // {
    //     return $this->all();
    // }
    public static function validate(array $data) // Sửa hàm  ràng buộc này lại 
    { // Ở đây t chỉ làm cơ bản thôi 
        $errors = [];
        if (!$data['name']) {
            $errors['name'] = 'Name is required.';
        }

        if (!$data['price']) {
            $errors['price'] = 'Price is required.';
        }

        
        if (!$data['size']) {
            $errors['size'] = 'Size is required.';
        }

        if (!$data['color']) {
            $errors['color'] = 'Color is required.';
        }
        if (!$data['quantity']) {
            $errors['quantity'] = 'Color is required.';
        }

        if (strlen($data['description']) > 200) {
            $errors['description'] = 'Notes must be at most 200 characters.';
        }
        return $errors;
    }
}
