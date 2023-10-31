<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class Products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image', 'size', 'color', 'type', 'quantity', 'created_at', 'updated_at'];
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id');
    }
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

        if (strlen($data['description']) > 2000) {
            $errors['description'] = 'Notes must be at most 2000 characters.';
        }

        if($data['image'] == ''){
            $errors["image"] = "Please select an image file to upload.";
        }
        return $errors;
    }
}
