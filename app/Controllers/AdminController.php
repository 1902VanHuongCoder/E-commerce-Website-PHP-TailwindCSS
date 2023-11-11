<?php

namespace App\Controllers;

use App\Models\Order;
use App\SessionGuard as Guard;
use App\Models\Products;
use App\Models\User;

// use Illuminate\Support\Facades\Process;
// use League\Plates\Template\Func;
// use App\Models\Contact;

class AdminController extends Controller
{
    public function __construct()
    {
        if (!Guard::isAdminLoggedIn()) {
            redirect('admin/login');
        }

        parent::__construct();
    }

    public function index()
    {
        $this->sendPage('admin/adminDashboard', [
            'productinfo' => Products::all(),
        ]);
    }

    public function create()
    {
        $this->sendPage('admin/createproduct', [
            'errors' => session_get_once('errors'),
            'old' => $this->getSavedFormValues(),
            "test" => "Create product page is opened..."
        ]);
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $file = $_FILES['image'];
            if ($file['error'] === 0 && getimagesize($file['tmp_name'])) {
                $_POST["image"] = file_get_contents($file['tmp_name']);
                $data = $this->filterProductData($_POST);
            } else {
                $_POST['image'] = '';
                $data = $this->filterProductData($_POST);
            }
        }

        $data = $this->filterProductData($_POST);
        $model_errors = Products::validate($data);
        $data['created_at'] = date('Y-m-d H:i:s');
        $data["type"] = $_POST["type"];

        if (empty($model_errors)) {
            $product = new Products();
            $product->fill($data);
            $product->belongsTo(Order::class);
            $product->save();
            redirect('/admin');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/admin/addproduct', ['errors' => $model_errors]);
    }
    protected function filterProductData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            'price' => $data['price'] ?? '',
            'image' => $data["image"] ?? '',
            'size' => $data['size'] ?? 'M',
            'color' => $data["color"] ?? '',
            'quantity' => $data["quantity"] ?? '',
            'description' => $data["description"] ?? ''
        ];
    }

    public function edit($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }
        $form_values = $this->getSavedFormValues();
        $data = [
            'errors' => session_get_once('errors'),
            'product' => (!empty($form_values)) ?
                array_merge($form_values, ['id' => $product->id]) :
                $product->toArray()
        ];
        $this->sendPage('/admin/editproduct', $data);
    }
    public function update($productId)
    {
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $file = $_FILES['image'];
            if ($file['error'] === 0 && getimagesize($file['tmp_name'])) {
                $_POST['image'] = file_get_contents($file['tmp_name']);
                $data = $this->filterProductData($_POST);
            } else {
                $_POST['image'] = $product['image'];
                $data = $this->filterProductData($_POST);
            }
        }
        $model_errors = Products::validate($data);
        $data["type"] = $_POST["type"];
        if (empty($model_errors)) {

            $product->fill($data);
            $product->save();
            redirect('/admin');
        }
        $this->saveFormValues($_POST);
        redirect('/admin/editproduct/' . $productId, [
            'errors' => $model_errors,
        ]);
    }

    public function destroy($productId)
    {
        $order = Order::find(31);
        $product = Products::find($productId);
        if (!$product) {
            $this->sendNotFound();
        }
        echo var_dump($order);
        $order->delete();
        $product->delete();
        redirect('/admin');
    }

    public function show()
    {
        $customers = User::all();
        $this->sendPage('/admin/customers', ['customers' => $customers]);
    }

    public function deleteuser($userId)
    {
        $user = User::find($userId);
        if (!$user) {
            $this->sendNotFound();
        }
        $user->delete();
        redirect("/admin/customers");
    }

    public function showorders()
    {
        $orders = Order::all();
        $this->sendPage("/admin/orders", ["orders" => $orders]);
        // echo "Hello world!";
    }
}
