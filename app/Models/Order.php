<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $table = 'orders';
    protected $fillable = ['name','price','size', 'color','quantity', 'description','amount','order_date', 'total_amount'];
    // public function products()
    // {
    //     return $this->all();
    // }
    public static function validate(array $data) // Sửa hàm  ràng buộc này lại 
    { // Ở đây t chỉ làm cơ bản thôi 
        $errors = [];
        if ($data["total_amount"] > $data["quantity"]) {
            $errors["total_amount"] = "Currently there are only" . $data["quantity"] . "products left in stock. Please choose the appropriate quantity.";
        }
        return $errors;
    }
}
