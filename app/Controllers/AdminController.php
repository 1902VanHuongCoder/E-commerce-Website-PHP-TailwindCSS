<?php

namespace App\Controllers;

use App\SessionGuard as Guard;
use App\Models\Products;
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
            'productinfo' => Products::all()
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
        $data = $this->filterContactData($_POST);
        $model_errors = Products::validate($data);
        if (empty($model_errors)) {
            $product = new Products();
            $product->fill($data);
            // $product->user()->associate(Guard::user());
            $product->save();
            redirect('/');
        }
        // Lưu các giá trị của form vào $_SESSION['form']
        $this->saveFormValues($_POST);
        // Lưu các thông báo lỗi vào $_SESSION['errors']
        redirect('/admin/addproduct', ['errors' => $model_errors]);
    }
    protected function filterContactData(array $data)
    {
        return [
            'name' => $data['name'] ?? '',
            'price' => $data['price'] ?? '',
            'size' => $data['size'] ?? 'M',
            'color' => $data["color"] ?? '',
            'quantity' => $data["quantity"] ?? ''
        ];
    }

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
