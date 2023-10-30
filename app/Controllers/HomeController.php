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

        $this->sendPage("home/order", ["productinfo" => $product]);
    }

    public function ordered($productId)
    {
        $data = $_POST;
        $model_errors = Order::validate($data);
        $total_pay = number_format(floatval($data["total_amount"]) * floatval($data["price"]), 2);
        $data["total_amount"] = $total_pay;
        $data["order_date"] = date('Y-m-d H:i:s');
        $data["username"] = Guard::user()->name;
        if (empty($model_errors)) {
            $order = new Order();
            $order->fill($data);
            $order->user()->associate(Guard::user());
            $order->save();
            redirect('/orders/' . $productId, ["success" => "Ordering succeed!"]);
        }

        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/orders/' . $productId, ['errors' => $model_errors]);
        // redirect('/admin/addproduct', ['errors' => $data]);
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
