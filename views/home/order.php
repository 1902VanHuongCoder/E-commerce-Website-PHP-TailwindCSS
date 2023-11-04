<?php $this->layout("layouts/default", ["title" => "Orders"]) ?>

<?php $this->start("page") ?>
<div class="container">
    <i class="fa-solid fa-arrow-left ml-4 "></i> <a href="/" class="font-bold transition-all duration-300 hover:text-[#4169E1] text-[20px]">Home</a>

    <?php if ($orderState) {
    ?>
        <div id="success-notification" class="bg-green-500 text-white px-4 py-2 fixed top-0 right-0 m-4 rounded-md shadow-lg animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-check"></i> Order success</p>
            <p>Your order will be quickly delivered to you</p>
        </div>
    <?php } else if (!$orderState && isset($errors)) { ?>
        <div id="success-notification" class="bg-red-500 text-white px-4 py-2 fixed top-0 right-0 m-4 rounded-md shadow-lg animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-check"></i> Order failed</p>
            <p>Check order information</p>
        </div>

    <?php } ?>

    <div class="relative w-full flex justify-center mb-3">
        <h1 class="text-[30px] font-semibold">Order</h1>
        <div class="absolute bottom-0 w-24 h-1 bg-[#4169E1]"></div>
    </div>
    <div class="w-full h-full grid grid-cols-1 md:grid-cols-3 gap-7 border rounded-xl p-5 shadow-md justify-center items-center">
        <div class="w-full flex items-center justify-center">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
        </div>
        <form action="/orders/<?= $this->e($product->id) ?>" method="POST" class="col-span-2">
            <h1 class="text-xl font-semibold py-2"><?php echo $this->e($product->name); ?></h1>
            <p class="text-[20px] font-semibold">Price : <span class="text-red-500">$<?php echo $this->e($product->price); ?></span></p>
            <div class="flex gap-x-2 items-center py-2 flex-wrap">
                <p class="text-[20px] font-semibold">Color :</p>
                <?php
                $colorArray = explode(",", $product->color);
                for ($i = 0; $i < count($colorArray); $i++) {
                ?>
                    <span class="flex justify-center ml-2 items-center">
                        <input type="checkbox" name="color_<?= $i  + 1 ?>" value="<?php echo $colorArray[$i] ?>">
                        <span class="px-2 py-1 transition-all duration-300"><?php echo $colorArray[$i] ?></span>
                    </span>
                <?php } ?>
            </div>
            <?php if (isset($errors['color'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['color']) ?></strong>
                </span>
            <?php endif ?>
            <div class="flex gap-x-2 items-center py-2 flex-wrap">
                <p class="text-[20px] font-semibold">Size :</p>
                <?php
                $sizeArray = explode(",", $product->size);
                for ($i = 0; $i < count($sizeArray); $i++) {
                ?>
                    <span class="flex justify-center items-center ml-2">
                        <input type="checkbox" name="size_<?= $i + 1 ?>" value="<?php echo $sizeArray[$i] ?>">
                        <span class="px-2 py-1 transition-all duration-300"><?php echo $sizeArray[$i] ?></span>
                    </span>
                <?php } ?>
            </div>
            <?php if (isset($errors['size'])) : ?>
                <span class="text-red-500 mt-1 text-sm">
                    <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['size']) ?></strong>
                </span>
            <?php endif ?>
            <p class="text-[20px] font-semibold py-2 flex justify-start items-center gap-x-2">Warehouse:<span class="text-[#4169e1] flex justify-center items-center gap-x-1"><?php echo $this->e($product->quantity); ?> <small>products available</small></span></p>
            <div class="py-2">
                <p class="text-[20px] font-semibold">Choose product quantity: </p>
                <div class="py-2 flex gap-1">
                    <button type="button" class="text-xl border border-1 border-slate-950 py-1 px-3">-</button>
                    <input name="total_amount" value="1" style="appearance: textfield;" type="number" min="1" class="border border-1 border-slate-950 h-10 w-12 flex justify-center items-center" />
                    <button type="button" class="text-xl border border-1 border-slate-950 py-1 px-3">+</button>
                </div>
                <?php if (isset($errors['total_amount'])) : ?>
                    <span class="text-red-500 mt-1 text-sm">
                        <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['total_amount']) ?></strong>
                    </span>
                <?php endif ?>
            </div>
            <p class="text-[20px] font-semibold mb-2">Choose Delivery Method :</p>
            <select class="relative mb-2" name="payment">
                <div class="flex justify-between items-center p-[10px] border border-[#7a7a7a] rounded-[10px] cursor-pointer clickdown_2">
                    <p>Direct payment</p>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_2"></i>
                </div>
                <div class="bg-[#ededed] p-2 rounded-[10px] hidden list_2">
                    <option class="transition-all duration-300 hover:text-[#4169E1] cursor-pointer py-1" value="direct payment">Direct payment</option>
                    <option class="transition-all duration-300 hover:text-[#4169E1] cursor-pointer py-1" value="payment via card">Payment via card</option>
                </div>
            </select>
            <div class="flex flex-col bg-[#4169E1] p-2">
                <p class="text-[18px] font-semibold pb-2 text-[#fff]">Address :</p>
                <div class="flex flex-col gap-2">
                    <input name="address" type="text" placeholder="Address..." class="p-2 border-none outline-none text-[#333]">
                    <?php if (isset($errors['address'])) : ?>
                        <span class="text-yellow-500 mt-1 text-sm">
                            <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['address']) ?></strong>
                        </span>
                    <?php endif ?>
                    <input name="phone" type="text" placeholder="0##-###-####" class="p-2 border-none outline-none text-[#333]">
                    <?php if (isset($errors['phone'])) : ?>
                        <span class="text-yellow-500 mt-1 text-sm">
                            <strong><i class="fa-solid fa-triangle-exclamation"></i> <?= $this->e($errors['phone']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
            </div>
            <button type="submit" class="bg-yellow-400 p-2 my-3 font-medium hover:bg-[#1E90FF] hover:text-[#fff] transition-all duration-[0.4s]"><i class="fa-solid fa-cart-shopping"></i> Buy Now</button>
        </form>
    </div>
</div>
<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function() {
        //sidebar
        $('.bar').click(function() {
            $('.sidebar').toggleClass('left-[-100%]');
        })

        $('.closed').click(function() {
            $('.sidebar').toggleClass('left-[-100%]');
        })

        //ẩn hiện thanh ngang
        $('.clickdown_2').click(function() {
            $('.list_1').addClass('hidden');
            $('.dropdown_1').addClass('rotate-180');
            if (!$('.list_2').hasClass('hidden')) {
                $('.list_2').addClass('hidden');
            } else {
                $('.list_2').removeClass('hidden');
            }

            $('.dropdown_2').toggleClass('rotate-180');
        });

        $('.clickdown_1').click(function() {
            $('.list_2').addClass('hidden');
            if (!$('.list_1').hasClass('hidden')) {
                $('.list_1').addClass('hidden');
            } else {
                $('.list_1').removeClass('hidden');
            }

            $('.dropdown_1').toggleClass('rotate-180');
        });

        //cart
        $('.close-cart').click(function() {
            $('.cart-shop').addClass('translate-x-[100%]');
            $('.opacity-toggle').addClass('hidden');
        })

        $('.fa-cart-shopping').click(function() {
            $('.cart-shop').removeClass('translate-x-[100%]');
            $('.opacity-toggle').removeClass('hidden');
        })
        // Notifications
        const successNotification = $('#success-notification');
        if (successNotification.length > 0) {
            successNotification.css('display', 'block');
        }
        setTimeout(() => {
            successNotification.css('display', 'none');
        }, 5000);
    });
</script>
<?php $this->stop() ?>