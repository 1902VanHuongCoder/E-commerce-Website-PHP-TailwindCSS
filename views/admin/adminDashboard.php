<?php $this->layout("layouts/admin", ["title" => "Admin Dashboard"]) ?>

<?php $this->start("page") ?>
<div class="w-[95%] mx-auto h-[100%]">
    <div class="text-center py-4">
        <h2 class="text-[#333] font-bold text-xl">All Products</h2>
    </div>

    <div id="all_products" class="w-full overflow-x-scroll overflow-y-scroll">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Size</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Color</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Category</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Quantity</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">State</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Image</th>
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
                        <td class="px-6 py-4"><?= $this->e($product->type)  ?></td>


                        <td class="px-6 py-4"><?= $this->e($product->quantity) ?></td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-3 w-3">
                                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                                </svg>
                                Paid
                            </span>
                        </td>
                        <td class="flex justify-center gap-4 px-6 py-4 font-medium flex-col">
                            <a href="/admin/editproduct/<?= $product->id ?>" class="text-center bg-[#4169E1] px-2 py-2 text-[#fff]">Edit</a>
                            <form class="form-inline" action="/admin/delete/<?= $product->id ?>" method="POST">
                                <button type="submit" class="text-primary-700 bg-[#DC143C] px-4 py-2 text-[#fff]" name="delete-product">
                                    <i alt="Delete"></i> Delete
                                </button>
                            </form>
                        </td>
                        <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" class="w-[300px]" /> </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->stop() ?>