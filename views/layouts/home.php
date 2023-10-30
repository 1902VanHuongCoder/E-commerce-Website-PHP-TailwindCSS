<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->e($title) ?></title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" />
    <script src="https://cdn.tailwindcss.com"></script>
    <?= $this->section("page_specific_css") ?>
</head>


<body class="relative">
    <div class="relative max-w-[1200px] m-auto md:flex-row">
        <header>
            <div class="relative flex items-center justify-between py-[40px]">
                <nav class="absolute flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
                    <button class="md:hidden bar">
                        <div class="relative border border-[#a3a3a3] rounded"><i class="fa-solid fa-bars p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                    </button>
                    <div class="relative flex items-center justify-center">
                        <p class="text-[25px] md:text-[18px] font-bold uppercase">JeiKei <span class="text-[#4169E1]">Store</span></p>
                        <ul class="ml-3 hidden md:flex lg:ml-4">
                            <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="#" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">All</a>
                            </li>
                            <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="#" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Shirts</a>
                            </li>
                            <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="#" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Stickers</a>
                            </li>
                        </ul>
                        <div class="ml-[50px] hidden md:block">
                            <input type="text" placeholder="Search for products..." class="relative border-[1px] border-[#646464] bg-transparent w-[200px] lg:w-[420px] p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                            <i class="fa-solid fa-magnifying-glass absolute top-[10px] left-[95%] translate-x-[50%] cursor-pointer"></i>
                        </div>
                    </div>
                    <button class="relative">
                        <div class="relative border border-[#a3a3a3] rounded">
                            <i class="fa-sharp fa-solid fa-cart-shopping p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                        <div class="absolute top-[-25%] right-[-20%] bg-[#1E90FF] w-6 h-6 flex justify-center items-center rounded-[50%] font-medium text-[#fff]">0</div>
                    </button>
                    <ul>
                        <?php if (\App\SessionGuard::isUserLoggedIn()) : ?>

                            
                            <div class="flex h-96 justify-center">
                                <button type="button" id="dropdownButton">
                                    <div class="relative h-10 w-10">
                                        <img class="h-full w-full rounded-full object-cover object-center ring ring-white" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                    </div>
                                </button>

                                <!-- Panel -->
                                <div id="dropdownMenu" class="fixed right-0 z-50 mt-2 w-60 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg hidden">
                                    <div class="py-3 px-4">
                                        <div class="flex items-center gap-3">
                                            <div class="relative h-10 w-10">
                                                <img class="h-full w-full rounded-full object-cover object-center ring ring-white" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                                <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                                            </div>
                                            <div class="text-sm">
                                                <div class="font-medium text-gray-700">Customers</div>
                                                <div class="text-gray-400">customers@sailboatui.com</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-1">
                                        <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                            <a class="" href="/login">Login</a>
                                            <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                                                <kbd class="min-w-[1em] font-sans">⌥</kbd>
                                                <kbd class="min-w-[1em] font-sans">⇧</kbd>
                                                <kbd class="min-w-[1em] font-sans">P</kbd>
                                            </span>
                                        </a>
                                        <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-left text-sm text-gray-700 hover:bg-gray-100"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            <li class=""><a class="" href="/register">Register</a></li>
                                            <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                                                <kbd class="min-w-[1em] font-sans">⌥</kbd>
                                                <kbd class="min-w-[1em] font-sans">⇧</kbd>
                                                <kbd class="min-w-[1em] font-sans">S</kbd>
                                            </span>
                                        </a>
                                    </div>

                                </div>
                            </div>
            </div>
        <?php else : ?>

            <div class="flex h-96 justify-center">
                <button type="button" id="dropdownButton">
                    <div class="relative h-10 w-10">
                        <img class="h-full w-full rounded-full object-cover object-center ring ring-white" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                    </div>
                </button>

                <!-- Panel -->
                <div id="dropdownMenu" class="absolute right-0 z-10 mt-2 w-60 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg hidden">
                    <div class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <div class="relative h-10 w-10">
                                <img class="h-full w-full rounded-full object-cover object-center ring ring-white" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                                <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                            </div>
                            <div class="text-xs">
                                <div class="font-medium text-gray-700"><?= $this->e(\App\SessionGuard::user()->name) ?></div>
                                <div class="text-gray-400"><?= $this->e(\App\SessionGuard::user()->email) ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="p-1">
                        <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                            <i class="fa-solid fa-cart-shopping"></i>
                            Orders
                            <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                                <kbd class="min-w-[1em] font-sans">⌥</kbd>
                                <kbd class="min-w-[1em] font-sans">⇧</kbd>
                                <kbd class="min-w-[1em] font-sans">P</kbd>
                            </span>
                        </a>
                        <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Log out
                            <form id="logout-form" class="d-none" action="/logout" method="POST">
                            </form>
                            <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                                <kbd class="min-w-[1em] font-sans">⌥</kbd>
                                <kbd class="min-w-[1em] font-sans">⇧</kbd>
                                <kbd class="min-w-[1em] font-sans">Q</kbd>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

        <?php endif ?>
        </header>
    </div>
    <!-- sidebar -->
    <div class="sidebar fixed top-0 bottom-0 left-[-100%] bg-[#fff] p-4 w-full h-full z-50 md:hidden">
        <div class="mb-4">
            <button class="closed">
                <div class="relative border border-[#a3a3a3] rounded w-[40px] h-[40px]">
                    <i class="fa-solid fa-x p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                </div>
            </button>
        </div>
        <div class="relative mb-4">
            <input type="text" placeholder="Search for products..." class="relative border-[1px] border-[#646464] bg-transparent w-full p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
            <i class="fa-solid fa-magnifying-glass absolute top-[25%] right-3 cursor-pointer"></i>
        </div>
        <ul class="flex flex-col">
            <li class="pb-[15px]">
                <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">All</a>
            </li>
            <li class="pb-[15px]">
                <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Shirts</a>
            </li>
            <li class="pb-[15px]">
                <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Stickers</a>
            </li>
            <li class="pb-[15px]">
                <a href="Login.html" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Login</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto flex max-w-screen-2xl flex-col gap-8 px-4 pd-4 md:flex-row">
        <div class="relative md:hidden">
            <div class="relative border border-[#a3a3a3] rounded p-3 cursor-pointer clickdown_2">
                <div class="flex items-center justify-between">
                    <p class="font-bold">All</p>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_2"></i>
                </div>
            </div>
            <ul class="absolute top-[100%] left-0 z-40 hidden w-full bg-[#cacaca] p-3 rounded list_2">
                <li class="pb-1.5 block"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">All</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Bags</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Shoes</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Shirts</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Hoodies</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Headwear</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Jackets</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Trousers</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Stickers</a></li>
            </ul>
        </div>

        <div class="relative md:hidden">
            <div class="relative border border-[#a3a3a3] rounded p-3 cursor-pointer clickdown_1">
                <div class="flex items-center justify-between">
                    <p class="font-bold">Relevance</p>
                    <i class="fa-solid fa-caret-down rotate-180 ease-out duration-500 dropdown_1"></i>
                </div>
            </div>
            <ul class="absolute top-[100%] left-0 z-50 w-full hidden bg-[#cacaca] p-3 rounded list_1">
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Relevance</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Trending</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Latest arrivals</a></li>
                <li class="pb-1.5"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Hot</a></li>
            </ul>
        </div>

        <div class="order-first w-full hidden flex-none md:block md:max-w-[125px]">
            <p class="text-[#808080] text-sm mb-1 order-first">Collections</p>
            <ul class="md:block">
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[#000] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">All</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Bags</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Shoes</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Shirts</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Hoodies</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Headwear</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Jackets</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Trousers</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Stickers</a></li>
            </ul>
        </div>
        <div id="products" class="order-last grid w-full gap-x-5 pt-5 place-content-center md:text-[18px] sm:grid-cols-2 lg:grid-cols-3 md:order-none">

            <?= $this->section("page") ?>

        </div>
        <div class="order-none w-full flex-none hidden md:block md:max-w-[125px] md:order-last">
            <p class="text-[#808080] text-sm mb-1">Sort By</p>
            <ul class="md:d-block">
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[#000] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Relevance</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Trending</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Latest arrivals</a></li>
                <li class="pb-1"><a href="#" class="no-underline text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Hot</a></li>
            </ul>
        </div>
    </div>
    <!-- cart -->
    <div class="cart-shop fixed top-0 right-0 bg-[#FFFAFA] w-full md:w-[500px] h-full z-20 transition-all duration-500 translate-x-[100%]">
        <div class="w-full overflow-y-auto h-full">
            <div class="relative mt-[20px]">
                <h1 class="text-center font-bold text-2xl uppercase text-[#333]">JeiKei <span class="text-[#4169E1]">Store</span> Cart</h1>
            </div>
            <div class="flex justify-center items-center flex-col m-[30px]">
                <div class="flex justify-start gap-2 border-b-2 border-[#333] py-[20px]">
                    <div class="w-1/3">
                        <img src="img/41l1iOm08+L._AC_UY575_.jpg" class="w-[100%]">
                    </div>
                    <div class="text-sm flex justify-center flex-col gap-[6px] font-semibold">
                        <h1>Nike Men's Air Force 1 '07 Basketball Shoe</h1>
                        <p>Price : <span class="text-[#DC143C]">$132</span></p>
                        <div class="flex items-center gap-2">
                            <p>Quantity : </p>
                            <div>
                                <button class="border border-[#a4a4a4] w-[25px]">-</button>
                                <input type="number" class="w-[35px] border border-[#a4a4a4] text-center" value="1">
                                <button class="border border-[#a4a4a4] w-[25px]">+</button>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="px-[18px] py-[6px] bg-[#FFD700] transition-all duration-500 hover:text-[#fff] hover:bg-[#4169E1]"><i class="fa-solid fa-cart-shopping"></i> Buy Now</button>
                            <button class="px-[18px] py-[6px] bg-[#DC143C] transition-all duration-500 hover:text-[#fff]">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-start gap-2 border-b-2 border-[#333] py-[20px]">
                    <div class="w-1/3">
                        <img src="img/5183zo0U+2L._AC_UX679_.jpg" class="w-[100%]">
                    </div>
                    <div class="text-sm flex justify-center flex-col gap-[6px] font-semibold">
                        <h1>DICKIES MEN'S HEAVYWEIGHT CREW NECK SHORT SLEEVE TEE</h1>
                        <p>Price : <span class="text-[#DC143C]">$23</span></p>
                        <div class="flex items-center gap-2">
                            <p>Quantity : </p>
                            <div>
                                <button class="border border-[#a4a4a4] w-[25px]">-</button>
                                <input type="number" class="w-[35px] border border-[#a4a4a4] text-center" value="1">
                                <button class="border border-[#a4a4a4] w-[25px]">+</button>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="px-[18px] py-[6px] bg-[#FFD700] transition-all duration-500 hover:text-[#fff] hover:bg-[#4169E1]"><i class="fa-solid fa-cart-shopping"></i> Buy Now</button>
                            <button class="px-[18px] py-[6px] bg-[#DC143C] transition-all duration-500 hover:text-[#fff]">Delete</button>
                        </div>
                    </div>
                </div>
                <div class="flex justify-start gap-2 border-b-2 border-[#333] py-[20px]">
                    <div class="w-1/3">
                        <img src="img/51lAjVqM7dL._AC_UY575_.jpg" class="w-[100%]">
                    </div>
                    <div class="text-sm flex justify-center flex-col gap-[6px] font-semibold">
                        <h1>DICKIES MEN'S HEAVYWEIGHT CREW NECK SHORT SLEEVE TEE</h1>
                        <p>Price : <span class="text-[#DC143C]">$23</span></p>
                        <div class="flex items-center gap-2">
                            <p>Quantity : </p>
                            <div>
                                <button class="border border-[#a4a4a4] w-[25px]">-</button>
                                <input type="number" class="w-[35px] border border-[#a4a4a4] text-center" value="1">
                                <button class="border border-[#a4a4a4] w-[25px]">+</button>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <button class="px-[18px] py-[6px] bg-[#FFD700] transition-all duration-500 hover:text-[#fff] hover:bg-[#4169E1]"><i class="fa-solid fa-cart-shopping"></i> Buy Now</button>
                            <button class="px-[18px] py-[6px] bg-[#DC143C] transition-all duration-500 hover:text-[#fff]">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 w-full grid grid-cols-2 font-semibold text-[#fff]">
            <div class="bg-[#4169E1] w-full p-2 text-center">0 đ</div>
            <div class="bg-[#333] w-full p-2 text-center cursor-pointer close-cart">Close</div>
        </div>
    </div>
    </div>
    <div class="opacity-toggle absolute top-0 left-0 w-full opacity-50 bg-[#333] h-full z-10 hidden transition-all duration-500"></div>
    <footer class="mt-28 bg-[#333] text-[#fff] p-5">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?= $this->section("page_specific_js") ?>
</body>

</html>