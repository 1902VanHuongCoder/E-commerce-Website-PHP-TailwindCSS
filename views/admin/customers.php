<?php $this->layout("layouts/admin", ["title" => "Admin Dashboard"]) ?>

<?php $this->start("page") ?>
<div class="container">
    <h1>
        Customers
        <?php echo date('Y-m-d H:i:s') ?>
    </h1>

    <div class="row">
        <div class="col-12">
            <!-- FLASH MESSAGES -->
            <div class="">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Phone</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Address</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Create at</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        <?php foreach ($customers as $customer) : ?>
                            <tr>
                                <th class="px-6 py-4 font-medium text-gray-900"><?= $this->e($customer->id) ?></th>
                                <td class="px-6 py-4"><?= $this->e($customer->name) ?></td>
                                <td class="px-6 py-4"><?= $this->e($customer->email) ?></td>
                                <td class="px-6 py-4"><?= $this->e($customer->phone) ?></td>
                                <td class="px-6 py-4"><?= $this->e($customer->address) ?></td>
                                <td class="px-6 py-4"><?= $this->e($customer->created_at) ?></td>
                                <td class="flex justify-end gap-4 px-6 py-4 font-medium">
                                    <form class="form-inline ml-1" action="/admin/delete/user/<?= $customer->id ?>" method="POST">
                                        <button type="submit" class="" name="delete-product">
                                            <i alt="Delete"></i> Delete User
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- Table Ends Here -->
        </div>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>