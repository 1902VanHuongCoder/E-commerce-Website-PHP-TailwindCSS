<?php $this->layout("layouts/default", ["title" => "Orders"]) ?>

<?php $this->start("page") ?>
<div class="container mx-auto">
    <i class="fa-solid fa-arrow-left ml-4 "></i> <a href="/" class="font-bold transition-all duration-300 hover:text-[#4169E1] text-[20px]">Home</a>
    <div class="relative w-full flex justify-center mb-3">
        <h1 class="text-[30px] font-semibold">Order history</h1>
        <div class="absolute bottom-0 w-24 h-1 bg-[#4169E1]"></div>
    </div>

    <?php
    foreach ($orders as $order) {
    ?>
        <div class="max-w-full h-full grid grid-cols-1 md:grid-cols-3 gap-7 border rounded-xl p-5 shadow-md">
            <div class="w-full flex items-center justify-center">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($order->image); ?>" />
            </div>
            <div class="col-span-2 flex flex-col gap-y-3">
                <h1 class="text-xl font-semibold py-2"><?php echo $this->e($order->name); ?></h1>
                <p class="text-[18px] font-normal">Price : <span class="text-red-500">$<?php echo $this->e($order->price); ?></span></p>
                <div class="flex gap-x-2 items-center">
                    <p class="text-[18px] font-normal">Color :</p>
                    <?php
                    $colorArray = explode(",", $order->color);
                    for ($i = 0; $i < count($colorArray); $i++) {
                    ?>
                        <button class="mr-1 border border-[#A9A9A9] px-2 py-1 transition-all duration-300 hover:bg-black hover:text-[#fff]"><?php echo $colorArray[$i] ?></button>
                    <?php } ?>
                </div>
                <div class="flex gap-x-2 items-center ">
                    <p class="text-[18px] font-normal">Size :</p>
                    <?php
                    $sizeArray = explode(",", $order->size);
                    for ($i = 0; $i < count($sizeArray); $i++) {
                    ?>
                        <button class="mr-1 border border-[#A9A9A9] px-2 py-1 transition-all duration-300 hover:bg-black hover:text-[#fff]"><?php echo $sizeArray[$i] ?></button>
                    <?php } ?>
                </div>
                <div class="flex justify-start items-center gap-x-2">
                    <p>Quantiy: </p>
                    <p class="text-blue-500"><?php echo $this->e($order->amount) ?></p>
                </div>
                <div class="flex justify-start items-center gap-x-1">
                    <p>Delivery method: </p>
                    <b>
                        <?php echo $this->e($order->payment) ?>
                    </b>
                </div>
                <div class="flex justify-start items-center gap-x-1">
                    <p>Address:</p>
                    <b>
                        <?php echo $this->e($order->address) ?>
                    </b>
                </div>
                <div class="flex justify-start items-center gap-x-1">
                    <p>Phone:</p>
                    <b>
                        <?php echo $this->e($order->phone) ?>
                    </b>
                </div>
            </div>
        </div>
    <?php } ?>

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