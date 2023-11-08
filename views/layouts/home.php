<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->e($title) ?></title>
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.png" />
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="./css/output.css"> -->
</head>


<body class="relative w-full min-h-screen overflow-x-hidden">
    <div class="relative w-full max-w-[1200px] m-auto md:flex-row min-h-screen">
        <header class="">
            <nav class="flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
                <button class="md:hidden bar">
                    <div class="relative border border-[#a3a3a3] rounded"><i class="fa-solid fa-bars p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                    </div>
                </button>
                <div class="relative flex items-center justify-center">
                    <a href="/home" class="text-[25px] md:text-[18px] font-bold uppercase">JeiKei <span class="text-[#4169E1]">Store</span></a>

                    <ul class="ml-3 hidden md:flex lg:ml-4">
                        <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/orderhistory" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Order History</a>
                        </li>
                    </ul>
                    <form action="/search" method="post" class="ml-[50px] hidden md:block">
                        <input name="search" type="text" placeholder="Search for products..." class="relative border-[1px] border-[#646464] bg-transparent w-[200px] lg:w-[420px] p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <button type="submit"><i class="text-[#4169e1] fa-solid fa-magnifying-glass absolute top-[10px] left-[93%] translate-x-[50%] cursor-pointer"></i>
                        </button>
                    </form>
                </div>

                <div class="flex justify-center items-center gap-4">
                    <div id="user_info" class="w-10 h-10 border border-1 border-slate-950 rounded-full flex justify-center items-center cursor-pointer">
                        <i class="fa-solid fa-user text-[#4169e1]"></i>
                    </div>
                    <button class="relative">
                        <div class="relative border border-[#a3a3a3] rounded">
                            <i class="fa-sharp fa-solid fa-cart-shopping p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                        <div class="absolute top-[-25%] right-[-20%] bg-[#1E90FF] w-6 h-6 flex justify-center items-center rounded-[50%] font-medium text-[#fff] count_products">0</div>
                    </button>
                </div>
            </nav>
            <div class="sidebar fixed top-0 left-[-100%] bg-[#fff] p-4 w-full h-full z-40">
                <div class="mb-4">
                    <button class="closed">
                        <div class="relative border border-[#a3a3a3] rounded w-[40px] h-[40px]">
                            <i class="fa-solid fa-x p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                    </button>
                </div>
                <ul class="flex flex-col">
                    <div class="relative mb-4">
                        <input type="text" placeholder="Search for products..." class="relative border-[1px] border-[#646464] bg-transparent w-full p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <i class="fa-solid fa-magnifying-glass absolute top-[25%] right-3 cursor-pointer"></i>
                    </div>
                    <li class="pb-[15px]">
                        <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Orders</a>
                    </li>
                </ul>
            </div>
        </header>
        <?= $this->section("page") ?>
        <!-- cart -->
        <div class="cart-shop fixed top-0 right-0 bg-[#FFFAFA] w-full md:w-[500px] h-full z-20 transition-all duration-500 translate-x-[100%]">
            <div class="w-full overflow-y-auto h-full">
                <div class="relative mt-[20px]">
                    <h1 class="text-center font-bold text-2xl uppercase text-[#333]">JeiKei <span class="text-[#4169E1]">Store</span> Cart</h1>
                </div>
                <div class="flex justify-center items-center flex-col m-[30px] cart_product"></div>
            </div>
            <div class="absolute bottom-0 w-full grid grid-cols-2 font-semibold text-[#fff]">
                <div class="bg-[#4169E1] w-full p-2 text-center total">0 đ</div>
                <div class="bg-[#333] w-full p-2 text-center cursor-pointer close-cart">Close</div>
            </div>
        </div>
        <!-- Dropdown Menu -->
        <div id="user_info_panel" class="absolute top-14 right-[-100%] transition-all z-10 mt-2 w-60 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg">
            <div class="py-3 px-4">
                <div class="flex items-center gap-3">
                    <div class="relative h-10 w-10">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex justify-center items-center"> <i class="fa-solid fa-user"></i> </div>
                        <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                    </div>
                    <div class="text-xs">
                        <div class="font-medium text-gray-700"><?= $this->e(\App\SessionGuard::user()->name) ?></div>
                        <div class="text-gray-400"><?= $this->e(\App\SessionGuard::user()->email) ?></div>
                    </div>
                </div>
            </div>
            <div class="p-1">
                <a href="/profile" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100"><i class="fa-regular fa-user"></i> Profile</a>
                <a href="/editprofile" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100"><i class="fa-solid fa-wrench"></i> Edit profile</a>
            </div>
            <div class="p-1">
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Log out
                    <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                        <kbd class="min-w-[1em] font-sans">⌥</kbd>
                        <kbd class="min-w-[1em] font-sans">⇧</kbd>
                        <kbd class="min-w-[1em] font-sans">Q</kbd>
                    </span>
                    <form id="logout-form" class="d-none" action="/logout" method="POST">
                    </form>
                </a>
            </div>
        </div>
        <footer class="bg-[#333] text-[#fff] p-5 w-full">
            <div class="max-w-[1200px] mx-auto flex justify-center flex-col md:flex-row md:justify-between items-center">
                <div class="flex flex-col md:flex-row md:text-sm">
                    <p class="mr-5">© 2023 JeiKei, Inc. All rights reserved.</p>
                    <p class="md:border-l-2 md:border-l-[#fff] px-4">Designed by JeiKei & PaulTo</p>
                </div>
                <div class="md:text-sm">
                    <p>The last upgrade was on August 26, 2023</p>
                </div>
            </div>
        </footer>
    </div>
    <div class="opacity-toggle absolute top-0 left-0 w-full opacity-50 bg-[#333] h-full z-10 hidden transition-all duration-500"></div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <?= $this->section("page_specific_js") ?>
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
                var productID = productElement.find(".productID").text();
                add_to_cart(productName, price, productWarehouse, productImage, productID);
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
            function add_to_cart(name, price, warehousem, image, productID) {
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
                        quantity: 1,
                        productID: productID
                    }
                    cart_items.push(products);
                }
                updateCount();
                updateTotalPrice();
                render_CartItems();
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
                                <a href="/orders/${cart_items[i].productID}" class="px-[18px] py-[6px] bg-[#FFD700] transition-all duration-500 hover:text-[#fff] hover:bg-[#4169E1]"><i class="fa-solid fa-cart-shopping"></i> Buy Now</a>
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
                    updateTotalPrice();
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
                        cart_items.splice(productIndex, 1);
                        //cart_items[productIndex].quantity = 0;
                        updateCount();
                    }
                    updateTotalPrice();
                })

                $('.del').click(function() {
                    var productElement = $(this).closest('.cart');
                    var productNameCart = productElement.find('h1').text();
                    var productIndex = find_CartItem(productNameCart);
                    cart_items.splice(productIndex, 1);
                    productElement.remove();
                    updateTotalPrice();
                    updateCount();
                })
            }

            function updateTotalPrice() {
                var totalPrice = 0;
                for (var i = 0; i < cart_items.length; i++) {
                    var productTotalPrice = cart_items[i].price * cart_items[i].quantity;
                    totalPrice += productTotalPrice;
                }
                $('.total').text(totalPrice.toFixed(2) + " " + "$");
            }

            function updateCount() {
                var count = 0;
                count += cart_items.length;
                $('.count_products').text(count);
            }

            // Decrease the quantity of product
            $("#decrease").click(function() {
                if (parseInt($("#quantity").val()) === 1) {
                    $("#quantity").val(1);
                } else {
                    var quantity = parseInt($("#quantity").val()) - 1;
                    $("#quantity").val(quantity);
                }
            });

            $("#increase").click(function() {
                var quantity = parseInt($("#quantity").val()) + 1;
                $("#quantity").val(quantity);
            });



            $(document).ready(function() {
                $('#imageInput').change(function() {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $("#imagePreview").removeClass("hidden");
                        $("#image_icon").addClass("hidden");
                        $('#imagePreview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(file);
                });
            });
        });
    </script>
</body>

</html>