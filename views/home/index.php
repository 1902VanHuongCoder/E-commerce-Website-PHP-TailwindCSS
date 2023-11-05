<?php $this->layout("layouts/home", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-full mx-auto mb-[150px]">
    <div class="w-full flex justify-between items-start flex-col lg:flex-row p-4 gap-3 lg:gap-1 md:gap-x-[45px]">
        <div class="p-2 w-[20%] hidden lg:block flex-col">
            <h2 class="py-2"><i class="fa-solid fa-store text-blue-500"></i><strong> Collection</strong></h2>
            <hr />
            <ol>
                <li class="mt-1 ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md" id="all"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> All</li>
                <li class="mt-1 ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md" id="shirts"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Shirts</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md" id="shoes"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Shoes</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md" id="hats"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Hats</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md" id="skirts"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Skirts</li>
                <li class="ml-5 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md" id="backpacks"> <small class="text-[10px] text-blue-500"><i class="fa-solid fa-greater-than"></i></small> Backpacks</li>
            </ol>
        </div>
        <div class="relative block lg:hidden w-full">
            <div class="relative border border-[#a3a3a3] rounded p-3 cursor-pointer clickdown_2">
                <div class="flex items-center justify-between">
                    <h2 class="py-2"><i class="fa-solid fa-store text-blue-500"></i><strong> Collection</strong></h2>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_2"></i>
                </div>
            </div>
            <ul class="absolute top-[100%] left-0 z-40 hidden w-full bg-[#e6e6e6] p-3 rounded list_2">
                <li class="mt-1 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md font-medium" id="all_1"> <small class="text-[10px] text-blue-500"></small>All</li>
                <li class="mt-1 py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md font-medium" id="shirts_1"> <small class="text-[10px] text-blue-500"></small>Shirts</li>
                <li class="py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md font-medium" id="shoes_1"> <small class="text-[10px] text-blue-500"></small>Shoes</li>
                <li class="py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md font-medium" id="hats_1"> <small class="text-[10px] text-blue-500"></small>Hats</li>
                <li class="py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md font-medium" id="skirts_1"> <small class="text-[10px] text-blue-500"></small>Skirts</li>
                <li class="py-1 px-3 cursor-pointer hover:bg-slate-200 mb-1 rounded-md font-medium" id="backpacks_1"> <small class="text-[10px] text-blue-500"></small>Backpacks</li>
            </ul>
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
                        <div class="<?php echo $type[$i]["type"] ?> group flex justify-between flex-col items-center w-full overflow-hidden rounded-md bg-white shadow-md style">
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
                                    <button class="rounded-sm bg-transparent border border-1 border-slate-950 px-4 py-1 text-slate-950 ring-purple-500/30 ring-offset-2 hover:opacity-60 focus-visible:outline-none focus-visible:ring active:opacity-60/90 add">Add</button>
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

        // $('.clickdown_1').click(function() {
        //     $('.list_2').addClass('hidden');
        //     if (!$('.list_1').hasClass('hidden')) {
        //         $('.list_1').addClass('hidden');
        //     } else {
        //         $('.list_1').removeClass('hidden');
        //     }

        //     $('.dropdown_1').toggleClass('rotate-180');
        // });

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

        //filter products 
        $("#shirts").click(function() {
            $(".shirts").show();
            $(".shoes").hide();
            $(".hats").hide();
            $(".backpacks").hide();
            $(".skirts").hide();
        });
        $("#shoes").click(function() {
            $(".shoes").show();
            $(".hats").hide();
            $(".shirts").hide();
            $(".backpacks").hide();
            $(".skirts").hide();
        });
        $("#skirts").click(function() {
            $(".skirts").show();
            $(".shirts").hide();
            $(".hats").hide();
            $(".backpacks").hide();
            $(".shoes").hide();
        });
        $("#hats").click(function() {
            $(".hats").show();
            $(".shoes").hide();
            $(".shirts").hide();
            $(".backpacks").hide();
            $(".skirts").hide();
        });
        $("#backpacks").click(function() {
            $(".backpacks").show();
            $(".shoes").hide();
            $(".hats").hide();
            $(".shirts").hide();
            $(".skirts").hide();
        });
        $("#all").click(function() {
            $(".style").show();
        })

        //filter mobile
        $("#shirts_1").click(function() {
            $(".shirts").show();
            $(".shoes").hide();
            $(".hats").hide();
            $(".backpacks").hide();
            $(".skirts").hide();
        });
        $("#shoes_1").click(function() {
            $(".shoes").show();
            $(".hats").hide();
            $(".shirts").hide();
            $(".backpacks").hide();
            $(".skirts").hide();
        });
        $("#skirts_1").click(function() {
            $(".skirts").show();
            $(".shirts").hide();
            $(".hats").hide();
            $(".backpacks").hide();
            $(".shoes").hide();
        });
        $("#hats_1").click(function() {
            $(".hats").show();
            $(".shoes").hide();
            $(".shirts").hide();
            $(".backpacks").hide();
            $(".skirts").hide();
        });
        $("#backpacks_1").click(function() {
            $(".backpacks").show();
            $(".shoes").hide();
            $(".hats").hide();
            $(".shirts").hide();
            $(".skirts").hide();
        });
        $("#all_1").click(function() {
            $(".style").show();
        })

        //add products
        let cart_items = [];
        $('.add').click(function() {
            var productElement = $(this).closest('.style');
            var productName = productElement.find('.text-base').text().trim();
            let price = parseFloat(productElement.find('.text-gray-500').text().trim().split('$')[0].trim());
            var productWarehouse = productElement.find('.text-red-400').text().trim().split(':')[1].trim();
            var productImage = productElement.find('img').attr('src');
            add_to_cart(productName, price, productWarehouse, productImage);
        });

        //Hàm này dùng để kiểm tra xem sản phẩm có không
        function find_CartItem(productName) {
            for (var i = 0; i < cart_items.length; i++) {
                if (cart_items[i].name === productName) {
                    return i;
                }
            }
            return -1;
        }

        //Hàm này thêm giỏ hàng
        function add_to_cart(name, price, warehousem, image) {
            var productIndex = find_CartItem(name);
            var totalPrice = 0;
            if (productIndex !== -1) {
                cart_items[productIndex].quantity++;
                cart_items[productIndex].price = price * cart_items[productIndex].quantity;
            } else {
                var products = {
                    name: name,
                    price: price,
                    warehousem: warehousem,
                    image: image,
                    quantity: 1
                }
                cart_items.push(products);
            }
            render_CartItems();
            updateTotalPrice()
        }

        function render_CartItems() {
            $('.cart_product').empty();
            var totalPrice = 0;
            for (var i = 0; i < cart_items.length; i++) {
                var product = `
                    <div class="flex justify-start gap-2 border-b-2 border-[#333] py-[20px] cart">
                        <div class="w-1/3">
                            <img src="${cart_items[i].image}">
                        </div>
                        <div class="text-sm flex justify-center flex-col gap-[8px] font-semibold">
                            <h1>${cart_items[i].name}</h1>
                            <p>Price : <span class="text-[#4169E1] price">${cart_items[i].price}.00$</span></p>
                            <p>Warehouse: <span class="text-[#DC143C] warehouse">${cart_items[i].warehousem}</span></p>
                            <div class="flex items-center gap-4">
                                <p>Quantity : </p>
                                <div class="flex items-center gap-2">
                                    <button class="border border-[#333] w-[30px] text-[22px] h-[30px] font-bold minus">-</button>
                                    <input type="number" class="w-[50px] h-[30px] font-bold border border-[#a4a4a4] text-center quantity" value="${cart_items[i].quantity}">
                                    <button class="border border-[#333] w-[30px] text-[22px] h-[30px] font-bold plus">+</button>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <button class="px-[18px] py-[6px] bg-[#FFD700] transition-all duration-500 hover:text-[#fff] hover:bg-[#4169E1]"><i class="fa-solid fa-cart-shopping"></i> Buy Now</button>
                                <button class="px-[18px] py-[6px] bg-[#DC143C] transition-all duration-500 hover:text-[#fff] del">Delete</button>
                            </div>
                        </div>
                    </div>
                `
                $('.cart_product').append(product);
            }

            $('.plus').click(function() {
                var productElement = $(this).closest('.cart');
                var productNameCart = productElement.find('h1').text();
                var productIndex = find_CartItem(productNameCart);
                var initialPrice = cart_items[productIndex].price;
                cart_items[productIndex].quantity++;
                var currentPrice = cart_items[productIndex].quantity * initialPrice;
                productElement.find('.price').text(currentPrice + ".00$");
                productElement.find('.quantity').val(cart_items[productIndex].quantity);
            })

            $('.minus').click(function() {
                var productElement = $(this).closest('.cart');
                var productNameCart = productElement.find('h1').text();
                var productIndex = find_CartItem(productNameCart);
                var initialPrice = cart_items[productIndex].price;
                if (cart_items[productIndex].quantity > 1) {
                    cart_items[productIndex].quantity--;
                    var currentPrice = cart_items[productIndex].quantity * initialPrice;
                    productElement.find('.price').text(currentPrice + ".00$");
                    productElement.find('.quantity').val(cart_items[productIndex].quantity);
                } else {
                    productElement.remove();
                }
            })

            $('.del').click(function() {
                var productElement = $(this).closest('.cart');
                var productNameCart = productElement.find('h1').text();
                var productIndex = find_CartItem(productNameCart);
                cart_items.splice(productIndex, 1);
                productElement.remove();
            })
        }

        function updateTotalPrice() {
            var totalPrice = 0;
            for (var i = 0; i<cart_items.length; i++) {
                var productTotalPrice = cart_items[i].price * cart_items[i].quantity;
                totalPrice += productTotalPrice;
            }
            $('.total').text(totalPrice.toFixed(2) +" " + "$");
        }
    });
</script>
<?php $this->stop() ?>