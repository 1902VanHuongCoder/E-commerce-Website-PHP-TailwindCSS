<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\SessionGuard as Guard;
use Illuminate\Support\Facades\Process;

class HomeController extends Controller
{
    public function __construct()
    {
        if (!Guard::isUserLoggedIn()) {
            redirect('/login');
        }

        parent::__construct();
    }

    public function index()
    {
        $this->sendPage('home/index', [
            'userinfo' => Guard::user(),
            'productinfo' => Products::all(),
        ]);
    }

    public function order($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }

        $this->sendPage("home/order", ["product" => $product]);
    }

    public function ordered($productId)
    {
        // Get the product corresponding to the product ID
        $product = Products::find($productId);

        // 
        $user = Guard::user();
        // Receive the product color and size the customer has selected
        $string1 = 'color_';
        $string2 = 'size_';
        $color = "";
        $filteredColorKeys = array_filter(array_keys($_POST), function ($key) use ($string1) {
            return strpos($key, $string1) !== false;
        });
        for ($i = 0; $i < count($filteredColorKeys); $i++) {
            if ($i < 1) {
                $color = $_POST[$filteredColorKeys[$i]];
            } else {
                $color = ',' . $_POST[$filteredColorKeys[$i]];
            }
        }
        $size = "";
        $filteredSizeKeys = array_filter(array_keys($_POST), function ($key) use ($string1) {
            return strpos($key, $string1) !== false;
        });
        for ($i = 0; $i < count($filteredSizeKeys); $i++) {
            if ($i < 1) {
                $size = $_POST[$filteredSizeKeys[$i]];
            } else {
                $size = ',' . $_POST[$filteredSizeKeys[$i]];
            }
        }

        // Validate data
        $data["product_id"] = $productId;
        $data["user_id"] = $user->id;
        $data["username"] = $user->name;
        $data["product_id"] = $product->id;
        $data["name"] = $product->name;
        $data["price"] = $product->price;
        $data["color"] = $color;
        $data["size"] = $size;
        $data["amount"] = $_POST["total_amount"];
        $data["payment"] = $_POST["payment"];
        $data["address"] = $_POST["address"];
        $data["phone"] = $_POST["phone"];
        $data["image"] = $product->image;
        //Calculate the total amount that the customer must pay
        $total_pay = number_format(floatval($data["amount"]) * floatval($product->price), 2);
        $data["total_amount"] = $total_pay;

        //Take the current time as the customer's purchase time
        $data["order_date"] = date('Y-m-d H:i:s');

        $model_errors = Order::validate($data);
        if (empty($model_errors)) {
            $order = new Order();
            $order->fill($data);
            // Link the order to the currently logged in user
            $order->user()->associate(Guard::user());
            $order->save();
            $this->sendPage('home/order', ["success" => "Đặt hàng thành công", "product" => $product]);
        }

        // Save the values that the user has entered and selected in the order form.
        $this->saveFormValues($_POST);

        // Save errors into $_SESSTION["errors"]
        $this->sendPage('home/order', ['errors' => "Đặt hàng thất bại", "product" => $product]);
    }


    public function detail($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }

        $this->sendPage("home/detail", ["product" => $product]);
    }


    public function orderhistory()
    {
        $customer = User::find(Guard::user()->id);
        $orders = $customer->orders;
        $this->sendPage("home/orderhistory", ["orders" => $orders]);
    }

    public function search()
    {
        $products = Products::all();

        $resultArray = [];
        foreach ($products as $product) {
            if (strpos($product->name, $_POST["search"]) !== false) {
                $resultArray[$product->id] = $product;
                continue;
            } else if (strpos($product->type, $_POST["search"]) !== false) {
                $resultArray[$product->id] = $product;
            }
        }
        if (empty($resultArray)) {
            $this->sendPage("home/index", ["errors" => "There is no result match keyword'" . $_POST["search"] . "'"]);
        } else {
            $this->sendPage("home/searchresult", ["resultArray" => $resultArray]);
        }
    }

    public function showprofile()
    {
        $user = Guard::user();
        $customer = User::find(Guard::user()->id);
        $orders = $customer->orders;

        $countOrders = count($orders);
        $this->sendPage("home/profile", ["user_data" => $user, "amountoforder" => $countOrders]);
    }

    public function editprofile()
    {
        $user = Guard::user();
        $this->sendPage("home/editprofile", ["user_data" => $user]);
    }

    public function saveprofile()
    {

        $data = $_POST;
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $target_dir = "assets/";
        $target_file = $target_dir . basename($image);
        if (!file_exists($target_file)) {
            move_uploaded_file($tmp_image, $target_file);
        }
        $data["image"] = $target_file;
        $user = User::find(Guard::user()->id);
        $user->name = $data["name"];
        $user->email = $data["email"];
        $user->phone = $data["phone"];
        $user->address = $data["address"];
        $user->image = $target_file;
        $user->save();

        $user_data = Guard::user();
        redirect("/profile", ["success" => "User information has been updated", "user_data" => $user_data]);
    }
}
