<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use App\SessionGuard as Guard;
use Illuminate\Support\Facades\Process;

// use App\Models\Contact;

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
            redirect('/orders/' . $productId, ["orderState" => "success"]);
        }

        // Save the values that the user has entered and selected in the order form.
        $this->saveFormValues($_POST);

        // Save errors into $_SESSTION["errors"]
        redirect('/orders/' . $productId, ['errors' => $model_errors]);
    }


    public function detail($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }

        $this->sendPage("home/detail", ["product" => $product]);
    }
    // public function create()
    // {
    //     $this->sendPage('contacts/create', [
    //         'errors' => session_get_once('errors'),
    //         'old' => $this->getSavedFormValues()
    //     ]);
    // }
    // public function store()
    // {
    //     $data = $this->filterContactData($_POST);
    //     $model_errors = Contact::validate($data);
    //     if (empty($model_errors)) {
    //         $contact = new Contact();
    //         $contact->fill($data);
    //         $contact->user()->associate(Guard::user());
    //         $contact->save();
    //         redirect('/');
    //     }
    //     // Lưu các giá trị của form vào $_SESSION['form']
    //     $this->saveFormValues($_POST);
    //     // Lưu các thông báo lỗi vào $_SESSION['errors']
    //     redirect('/contacts/create', ['errors' => $model_errors]);
    // }
    // protected function filterContactData(array $data)
    // {
    //     return [
    //         'name' => $data['name'] ?? '',
    //         'phone' => preg_replace('/\D+/', '', $data['phone']),
    //         'notes' => $data['notes'] ?? ''
    //     ];
    // }

    // public function edit($contactId)
    // {
    //     $contact = Guard::user()->contacts->find($contactId);
    //     if (!$contact) {
    //         $this->sendNotFound();
    //     }
    //     $form_values = $this->getSavedFormValues();
    //     $data = [
    //         'errors' => session_get_once('errors'),
    //         'contact' => (!empty($form_values)) ?
    //             array_merge($form_values, ['id' => $contact->id]) :
    //             $contact->toArray()

    //     ];
    //     $this->sendPage('contacts/edit', $data);
    // }
    // public function update($contactId)
    // {
    //     $contact = Guard::user()->contacts->find($contactId);
    //     if (!$contact) {
    //         $this->sendNotFound();
    //     }
    //     $data = $this->filterContactData($_POST);
    //     $model_errors = Contact::validate($data);
    //     if (empty($model_errors)) {

    //         $contact->fill($data);
    //         $contact->save();
    //         redirect('/');
    //     }
    //     $this->saveFormValues($_POST);
    //     redirect('/contacts/edit/' . $contactId, [
    //         'errors' => $model_errors
    //     ]);
    // }

    // public function destroy($contactId)
    // {
    //     $contact = Guard::user()->contacts->find($contactId);
    //     if (!$contact) {
    //         $this->sendNotFound();
    //     }
    //     $contact->delete();
    //     redirect('/');
    // }
}
