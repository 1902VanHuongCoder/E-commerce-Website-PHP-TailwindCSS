<?php $this->layout("layouts/admin", ["title" => "Orders"]) ?>

<?php $this->start("page") ?>
<div class="container">
    <div class="ml-4 mb-4 text-center">
        <h2 class="text-[#333] font-bold text-xl">Admin Info</h2>
    </div>
    <div class="row">
        <div class="col-12">
            <!-- FLASH MESSAGES -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Size</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Color</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Amount</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Order date</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Total Pay</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">User</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        <?php foreach ($orders as $order) : ?>
                            <tr>
                                <th class="px-6 py-4 font-medium text-gray-900"><?= $this->e($order->id) ?></th>
                                <td class="px-6 py-4"><?= $this->e($order->name) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->price) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->size) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->color) ?></td>


                                <td class="px-6 py-4"><?= $this->e($order->order_date) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->total_amount) ?></td>
                                <td class="px-6 py-4"><?= $this->e($order->username) ?></td>
                                <td class="flex justify-end gap-4 px-6 py-4 font-medium">
                                    <a href="/admin/editproduct/<?= $order->id ?>" class="text-center bg-[#4169E1] px-4 py-2 text-[#fff]">Edit</a>
                                    <form class="form-inline ml-1" action="/admin/delete/<?= $order->id ?>" method="POST">
                                        <button type="submit" class="text-primary-700 bg-[#DC143C] px-4 py-2 text-[#fff]" name="delete-product">
                                            <i alt="Delete"></i> Delete
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