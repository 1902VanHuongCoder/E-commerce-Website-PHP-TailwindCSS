<?php $this->layout("layouts/admin", ["title" => "Orders"]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-xl">All Orders</h2>
    </div>
    <div id="all_products" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-5 gap-y-5 justify-items-center w-full overflow-x-scroll overflow-y-scroll">
        <?php foreach ($orders as $order) : ?>
            <div class="relative w-[250px] h-[413px] bg-white text-black border border-1">
                <div class="h-[150px] bg-contain bg-no-repeat bg-center" style="background-image: url('data:image/jpg;charset=utf8;base64,<?php echo base64_encode($order['image']); ?>')"></div>
                <div class="p-4">
                    <h3 class="mb-3"><?= $this->e($order->name) ?></h3>
                    <p><?= $this->e($order->username) ?></p>
                    <div class="flex justify-between items-center">
                        <span><small>Date:</small> <?= $this->e($order->order_date) ?></span>
                        <span><small>Price: $</small><?= $this->e($order->price) ?></span>
                    </div>
                    <div>
                        <p><small>Total: $</small><?= $this->e($order->total_amount) ?></p>
                    </div>
                    <div class="mb-3">
                        <p> <small>Method: </small>payment via card
                        </p>
                    </div>
                    <div class="flex justify-between items-center">
                        <form action="/admin/deleteorder/<?= $order->id ?>" method="post">
                            <button type="submit" class="px-4 py-2 bg-red-400 rounded-md">Delete</button>
                        </form>
                        <form action="/admin/updateorder/<?= $order->id ?>" method="post">
                            <button type="submit" class="px-4 py-2 bg-[#1e3a8a] text-white rounded-md">Update</button>
                        </form>
                    </div>
                </div>
                <?php
                if ($order->state == 1) {
                    echo '<div class="absolute -right-4 top-4">
                    <span class="w-fit h-fit bg-green-400 px-3 py-2">Đã giao</span>
                    <span class="absolute right-0 w-[27px] h-[39px] bg-green-600 z-[-1] skew-y-[333deg]"></span>
                </div>';
                } else {
                    echo ' <div class="absolute -right-4 top-4">
                    <span class="w-fit h-fit bg-yellow-400 px-3 py-2">Chưa giao </span>
                    <span class="absolute right-0 w-[27px] h-[39px] bg-yellow-600 z-[-1] skew-y-[333deg]"></span>
                </div>';
                }
                ?>

            </div>
        <?php endforeach ?>
    </div>
    <!-- <div class="row">
        <div class="col-12">
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
            </div> -->
    <!-- Table Ends Here -->
</div>
</div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>