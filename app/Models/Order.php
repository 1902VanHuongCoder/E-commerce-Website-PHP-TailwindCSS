<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;

class Order extends Model
{

    protected $table = 'orders';
    protected $fillable = [
        'user_id', 'product_id', 'name', 'price', 'size', 'color',
        'amount', 'order_date', 'total_amount', 'username', 'address', 'phone', 'payment', 'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public static function validate(array $data)
    {
        // Get the product corresponding to the ID to get the quantity of that product in stock.
        $product = Products::find($data["product_id"]);

        $errors = [];

        if (!$data["color"]) {
            $errors["color"] = "You must choose at least 1 color.";
        }

        if (!$data["size"]) {
            $errors["size"] = "You must choose at least 1 size.";
        }

        if (!$data["address"] && $data["address"] < 20) {
            $errors["address"] = "Invalid address";
        }

        // Regex to check phone number 
        $pattern = "/^0\d{2}-\d{4}-\d{4}$/";
        if (!$data["phone"]) {
            $errors["phone"] = "Error! Empty phone number.";
        } else if (!preg_match($pattern, $data["phone"])) {
            $errors["phone"] = "Invalid phone number";
        }

        //If the number of products the customer chooses is greater than the number of products in stock, the user is asked to re-select the appropriate quantity.
        if ($data["total_amount"] > $product->quantity) {
            $errors["total_amount"] = "Currently there are only" . $product->quantity . "products left in stock. Please choose the appropriate quantity.";
        }
        return $errors;
    }
}
