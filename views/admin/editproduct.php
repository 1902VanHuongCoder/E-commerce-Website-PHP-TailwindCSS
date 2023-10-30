<?php $this->layout("layouts/admin", ["title" => "Edit Product"]) ?>

<?php $this->start("page") ?>
<div class="container mx-auto">
    <h1>Edit product</h1>
    <form action="<?= '/admin/' . $this->e($product['id']) ?>" method="POST" enctype="multipart/form-data">
        <div class="mx-auto">
            <h1>
                <?php echo $errors; ?>
            </h1>
            <div class="mx-auto max-w-xs">
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Name</label>
                    <input value="<?= $this->e($product['name']) ?>" name="name" required autofocus type="text" id="name" class="<?= isset($errors['name']) ? 'border-red-500' : '' ?> outline-0 block w-full rounded-md border-red-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="Product name..." />
                    <?php if (isset($errors['name'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="mx-auto max-w-xs">
                <div>
                    <label for="price" class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Price</label>
                    <input value="<?= $this->e($product['price']) ?>" min="1" name="price" required autofocus type="number" id="price" class="<?= isset($errors['price']) ? 'border-red-500' : '' ?> outline-0 block w-full rounded-md border-red-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="10$" />
                    <?php if (isset($errors['price'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['price']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="mx-auto max-w-xs">
                <div>
                    <label for="size" class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Size</label>
                    <input value="<?= $this->e($product['size']) ?>" name="size" required autofocus type="text" id="size" class="<?= isset($errors['size']) ? 'border-red-500' : '' ?> outline-0 block w-full rounded-md border-red-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="10$" />
                    <?php if (isset($errors['size'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['size']) ?></strong>
                        </span>
                    <?php endif ?>
                    <i>(Enter product dimensions, separated by 1 comma)</i>
                </div>
            </div>

            <div class="mx-auto max-w-xs">
                <div>
                    <label for="color" class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Color</label>
                    <input value="<?= $this->e($product['color']) ?>" name="color" required autofocus type="text" id="color" class="<?= isset($errors['color']) ? 'border-red-500' : '' ?> outline-0 block w-full rounded-md border-red-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="red, yellow,.." />


                    <?php if (isset($errors['color'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['color']) ?></strong>
                        </span>
                    <?php endif ?>
                    <i>(Enter product dimensions, separated by 1 comma)</i>
                </div>
            </div>
            <div>
                <h2>Choose type of product</h2>
                <select name="type">
                    <option checked value="shirts">Shirts</option>
                    <option value="pants">Pants</option>
                    <option value="backpacks">Backpack</option>
                    <option value="hats">Hats</option>
                    <option value="shoes">Shoes</option>
                    <option value="skirts">Skirt</option>
                </select>
            </div>
            <div class="mx-auto max-w-xs">
                <div>
                    <label for="quantity" class="mb-1 block text-sm font-medium text-gray-700 after:ml-0.5 after:text-red-500 after:content-['*']">Quantity</label>
                    <input value="<?= $this->e($product['quantity']) ?>" min="1" name="quantity" required autofocus type="number" id="color" class="<?= isset($errors['quantity']) ? 'border-red-500' : '' ?> outline-0 block w-full rounded-md border-red-300 shadow-sm focus:border-red-300 focus:ring focus:ring-red-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50 disabled:text-gray-500" placeholder="20" />
                    <?php if (isset($errors['quantity'])) : ?>
                        <span class="text-red-500 mt-1 text-sm">
                            <strong><?= $this->e($errors['quantity']) ?></strong>
                        </span>
                    <?php endif ?>

                </div>
            </div>
            <div class="mx-auto max-w-xs">
                <div>
                    <label for="5" class="mb-1 block text-sm font-medium text-gray-700">Message</label>
                    <textarea value="<?= $this->e($product['description']) ?>" id="description" name="description" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:cursor-not-allowed disabled:bg-gray-50" rows="3" placeholder="Leave a message"></textarea>
                </div>
            </div>
            <label>Select Image File:</label>
            <input type="file" name="image">

        </div>
        <button type="submit" class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Submit</button>
    </form>
</div>
<?php $this->stop() ?>