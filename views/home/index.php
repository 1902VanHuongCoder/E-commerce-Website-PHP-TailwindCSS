<?php $this->layout("layouts/home", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-full mb-20 mx-auto">
    <div class="w-full flex justify-between items-start p-4 gap-x-1 md:gap-x-[45px]">
        <div class="p-2 w-[15%] hidden lg:block flex-col">
            <h2 class="py-2"><i class="fa-solid fa-store text-blue-500"></i><strong> Collection</strong></h2>
            <hr />
            <ol>
                <li class="mt-1 ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Shirts</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Shoes</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Hats</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Skirts</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Backpacks</li>
            </ol>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 w-[100%] justify-center">
            <?php
            $type = [
                ["type" => "shirts", "imgHeight" => "h-64"], ["type" => "shoes", "imgHeight" => "h-36"],
                ["type" => "hats", "imgHeight" => "h-60"],   ["type" => "skirts", "imgHeight" => "h-60"], ["type" => "backpacks", "imgHeight" => "h-60"]
            ];

            for ($i = 0; $i < count($type); $i++) {
                foreach ($productinfo as $product) {
                    if ($product->type == $type[$i]["type"]) {
            ?>
                        <div class="<?php echo $type[$i]["type"] ?>group flex justify-between flex-col items-center w-full overflow-hidden rounded-md bg-white shadow-md">
                            <div class="p-4">
                                <div class="<?php echo $type[$i]["imgHeight"] ?> overflow-hidden relative transition-all duration-500 hover:scale-110">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
                                    <a class="w-full h-full absolute cursor-pointer top-0 left-0" href="/detail/<?php echo $this->e($product->id) ?>"></a>
                                </div>
                                <h3 class="text-base font-semibold text-gray-800 py-2"><?php echo $this->e($product->name) ?></h3>
                                <div class="flex justify-center items-center p-1">
                                    <p class="w-1/2 flex-1 max-w-[45ch] text-sm text-gray-500"><?php echo $this->e($product->price) ?>$</p>
                                    <small class="text-red-400">Warehouse: <?php echo $this->e($product->quantity) ?></small>
                                </div>
                            </div>
                            <div class="w-full">
                                <div class="px-3 py-6 w-full flex items-center justify-between">
                                    <button class="rounded-sm bg-transparent border border-1 border-slate-950 px-4 py-1 text-slate-950 ring-purple-500/30 ring-offset-2 hover:opacity-60 focus-visible:outline-none focus-visible:ring active:opacity-60/90">Add</button>
                                    <a href="/orders/<?php echo $this->e($product->id) ?>" class="rounded-sm bg-[#1e90ff] px-4 py-1 text-white ring-purple-500/30 ring-offset-2 hover:opacity-60 focus-visible:outline-none focus-visible:ring active:opacity-60/90">Buy Now</a>
                                </div>
                            </div>
                        </div>
            <?php }
                }
            } ?>
        </div>
    </div>
</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function() {
        const successNotification = $('#success-notification');
        if (successNotification.length > 0) {
            successNotification.css('display', 'block');
        }
        setTimeout(() => {
            successNotification.css('display', 'none');
        }, 5000);

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


        $("#user_info").click(function() {
            $("#user_info_panel").toggleClass("right-4");
        });
    });
</script>
<?php $this->stop() ?>