<?php $this->layout("layouts/admin", ["title" => "Add Product"]) ?>

<?php $this->start("page") ?>
<div class="container max-w-[1200px] mx-auto">
    <a href="/admin" class="ml-4 text-[20px] font-bold transition-all duration-100 hover:text-[#4169E1]"> Admin Dashboard </a>
    <h1 class="text-[23px] font-bold text-center my-4">Add product</h1>
    <form action="/admin/addproduct" method="POST" enctype="multipart/form-data">
        <div class="flex flex-col w-full md:w-[70%] mx-auto gap-4 border-2 rounded-xl shadow-md p-5 m-2">
            <div class="">
                <div>
                    <label for="name" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Name</label>
                    <input name="name" required autofocus type="text" id="name" class="<?= isset($errors['name']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Product name..." />
                    <?php if (isset($errors['name'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <div class="">
                <div>
                    <label for="price" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Price</label>
                    <input min="1" name="price" required autofocus type="number" id="price" class="<?= isset($errors['price']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="10$" />
                    <?php if (isset($errors['price'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['price']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="">
                <div>
                    <label for="size" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Size</label>
                    <input name="size" required autofocus type="text" id="size" class="<?= isset($errors['size']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="SM,..." />
                    <?php if (isset($errors['size'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['size']) ?></strong>
                        </span>
                    <?php endif ?>
                    <i>(Enter product colors, separated by 1 comma)</i>
                </div>
            </div>

            <div class="">
                <div>
                    <label for="color" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Color</label>
                    <input name="color" required autofocus type="text" id="color" class="<?= isset($errors['color']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="red, yellow,.." />
                    <?php if (isset($errors['color'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['color']) ?></strong>
                        </span>
                    <?php endif ?>
                    <i>(Enter product dimensions, separated by 1 comma)</i>
                </div>
            </div>
            <div class="flex flex-col justify-center w-full">
                <h2 class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Choose type of product</h2>
                <select name="type" class="outline-0 p-2 block w-[80%] rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 cursor-pointer">
                    <option checked value="shirts">Shirts</option>
                    <option value="pants">Pants</option>
                    <option value="backpacks">Backpack</option>
                    <option value="hats">Hats</option>
                    <option value="shoes">Shoes</option>
                    <option value="skirts">Skirt</option>
                </select>
            </div>
            <div class="">
                <div>
                    <label for="quantity" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Quantity</label>
                    <input min="1" name="quantity" required autofocus type="number" id="color" class="<?= isset($errors['quantity']) ? 'border-red-500' : '' ?> outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="20" />
                    <?php if (isset($errors['quantity'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['quantity']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="">
                <div>
                    <label for="5" class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Description</label>
                    <textarea id="description" name="description" class="outline-0 p-2 block w-full rounded-md border shadow-md focus:border-blue-300 focus:ring focus:ring-blue-300 focus:ring-opacity-50  disabled:cursor-not-allowed disabled:bg-gray-50" rows="3" placeholder="Leave a message"></textarea>
                </div>
            </div>
            <label class="font-bold mb-1 block text-sm text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Select Image File:</label>
            <input type="file" name="image" class="text-[#4169E1] font-bold">
            <?php if (isset($errors['image'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><?= $this->e($errors['image']) ?></strong>
                </span>
            <?php endif ?>
            <div class="text-center">
                <button type="submit" class="inline-block rounded-lg bg-[#4169E1] px-5 py-2.5 text-sm font-bold text-[#fff] shadow-md transition-all duration-300 hover:bg-blue-500 focus:ring focus:ring-blue-300 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Add Product</button>
            </div>
        </div>
    </form>
</div>
<?php $this->stop() ?>