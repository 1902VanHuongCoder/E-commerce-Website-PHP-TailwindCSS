<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <title><?= $this->e($title) ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="./assets/favicon-32x32.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Use tailwind library through cdn (Content Delivery Network) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Tailwindcss local using -->
    <!-- <link rel="stylesheet" href="./css/output.css"> -->
</head>

<body>
    <div class="relative w-full max-w-[1200px] m-auto md:flex-row min-h-screen overflow-x-hidden">
        <!-- header -->
        <header name="top">
            <nav class="flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
                <button class="flex items-center gap-x-4">
                    <div class="md:hidden bar relative border border-[#a3a3a3] rounded"><i class="fa-solid fa-bars p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                    </div>
                    <a href="/home" class="text-[16px] md:text-[18px] font-bold uppercase">JeiKei <span class="text-[#4169E1]">Store</span></a>
                </button>
                <div class="relative flex items-center justify-center">
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
                    <div id="user_info" class="w-10 h-10 border border-1 border-slate-950 rounded-full flex justify-center items-center cursor-pointer bg-center bg-cover" style="<?php
                                                                                                                                                                                    if (isset(\App\SessionGuard::user()->image)) {
                                                                                                                                                                                        echo "background-image:url('" . \App\SessionGuard::user()->image . "')";
                                                                                                                                                                                    } else {
                                                                                                                                                                                        echo "background-image:url('./assets/user_avatar.jpg')";
                                                                                                                                                                                    }
                                                                                                                                                                                    ?>">
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
                    <form action="/search" method="post" class="relative mb-4">
                        <input type="text" name="search" placeholder="Search for products..." class="relative border-[1px] border-[#646464] bg-transparent w-full p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <i class="fa-solid fa-magnifying-glass absolute top-[25%] right-3 cursor-pointer"></i>
                    </form>
                    <li class="pb-[15px]">
                        <a href="/orderhistory" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Orders History</a>
                    </li>
                </ul>
            </div>
        </header>

        <!-- Navigation button to Home page-->
        <div class="px-4">
            <i class="fa-solid fa-arrow-left text-[#4169E1]"></i> <a href="/" class="font-bold transition-all duration-300 hover:text-[#4169E1] text-[20px]">Home</a>
        </div>
        <!-- main content -->
        <?= $this->section("page") ?>

        <!-- shopping cart -->
        <div class="cart-shop fixed top-0 right-0 bg-[#FFFAFA] w-full md:w-[500px] h-full z-20 transition-all duration-100 translate-x-[100%]">
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

        <!-- footer -->
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

        <!-- Dropdown Menu -->
        <div id="user_info_panel" class="absolute top-14 right-[-100%] z-10 mt-2 w-60 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg transition-all">
            <div class="py-3 px-4">
                <div class="flex items-center gap-3">
                    <div class="relative h-10 w-10">
                        <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex justify-center items-center bg-center bg-cover" style="<?php
                                                                                                                                                    if (isset(\App\SessionGuard::user()->image)) {
                                                                                                                                                        echo "background-image:url('" . \App\SessionGuard::user()->image . "')";
                                                                                                                                                    } else {
                                                                                                                                                        echo "background-image:url('./assets/user_avatar.jpg')";
                                                                                                                                                    }
                                                                                                                                                    ?>">
                        </div>
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

        <!-- Black background when open Side bar -->
        <div class="opacity-toggle absolute top-0 left-0 w-full opacity-50 bg-[#333] h-full z-10 hidden transition-all duration-100"></div>

        <!-- Arrow to top -->
        <a href="#top" id="backtotop" class="hidden fixed bottom-5 right-5 z-30 w-12 h-12 bg-[#4169E1] rounded-full justify-center items-center text-white font-semibold shadow-md"><i class="fa-solid fa-arrow-up"></i></a>
    </div>

    <!-- Javascript and Jquery code -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./js/home.js"></script>
</body>

</html>