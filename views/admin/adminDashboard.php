<?php $this->layout("layouts/admin", ["title" => "Admin Dashboard"]) ?>

<?php $this->start("page") ?>
<div class="container">
    <h1>
        Admin Info
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
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Size</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Color</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Quantity</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">State</th>
                            <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        <?php foreach ($productinfo as $product) : ?>
                            <tr>
                                <th class="px-6 py-4 font-medium text-gray-900"><?= $this->e($product->id) ?></th>
                                <td class="px-6 py-4"><?= $this->e($product->name) ?></td>
                                <td class="px-6 py-4"><?= $this->e($product->price) ?></td>
                                <td class="px-6 py-4"><?= $this->e($product->size) ?></td>
                                <td class="px-6 py-4"><?= $this->e($product->color) ?></td>
                                <td class="px-6 py-4"><?= $this->e($product->quantity) ?></td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3">
                                            <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                        </svg>
                                        Paid
                                    </span>
                                </td>
                                <td class="flex justify-end gap-4 px-6 py-4 font-medium"><a href="">Delete</a><a href="" class="text-primary-700">Edit</a></td>
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