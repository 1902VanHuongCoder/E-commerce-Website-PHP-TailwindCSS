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
    <div class="relative max-w-[1200px] m-auto md:flex-row min-h-screen overflow-hidden">
        <header>
            <nav class="flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
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
                    </ul>
                    <div class="ml-[50px] hidden md:block">
                        <input type="text" placeholder="Search for products..." class="relative border-[1px] border-[#646464] bg-transparent w-[200px] lg:w-[420px] p-[6px] rounded-e-[5px] rounded-s-[5px] placeholder:text-[#808080]">
                        <i class="fa-solid fa-magnifying-glass absolute top-[10px] left-[95%] translate-x-[50%] cursor-pointer"></i>
                    </div>
                </div>

                <div class="flex justify-center items-center gap-8">
                    <button class="relative">
                        <div class="relative border border-[#a3a3a3] rounded">
                            <i class="fa-sharp fa-solid fa-cart-shopping p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                        <div class="absolute top-[-25%] right-[-20%] bg-[#1E90FF] w-6 h-6 flex justify-center items-center rounded-[50%] font-medium text-[#fff]">0</div>
                    </button>
                    <div id="user_info" class="flex justify-center items-center gap-1 cursor-pointer">
                        <i class="fa-solid fa-user"></i> <span>User info</span>
                    </div>
                </div>
            </nav>

            <div class="carousel w-full h-[400px] overflow-hidden">
                <div class="carousel-slide">
                    <img src="https://images.unsplash.com/photo-1612423284934-2850a4ea6b0f?auto=format&fit=crop&q=60&w=600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzJ8fGNsb3RoZXN8ZW58MHx8MHx8fDA%3D" alt="Image 1">
                </div>
                <div class="carousel-slide">
                    <img src="https://images.unsplash.com/photo-1544441893-675973e31985?auto=format&fit=crop&q=60&w=600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjJ8fGNsb3RoZXN8ZW58MHx8MHx8fDA%3D" alt="Image 2">
                </div>
                <div class="carousel-slide">
                    <img src="https://plus.unsplash.com/premium_photo-1677011778938-47a8fecde397?auto=format&fit=crop&q=60&w=600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODF8fGNsb3RoZXN8ZW58MHx8MHx8fDA%3D" alt="Image 3">
                </div>
            </div>

            <button class="carousel-prev absolute left-0 top-1/2 transform -translate-y-1/2">Previous</button>
            <button class="carousel-next absolute right-0 top-1/2 transform -translate-y-1/2">Next</button>


        </header>
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
        <div class="opacity-toggle absolute top-0 left-0 w-full opacity-50 bg-[#333] h-full z-10 hidden transition-all duration-500"></div>
        <!-- Dropdown Menu -->
        <div id="user_info_panel" class="absolute right-4 top-14 opacity-0 z-10 mt-2 w-60 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg">
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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                    View profile
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
                    Settings
                    <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                        <kbd class="min-w-[1em] font-sans">⌥</kbd>
                        <kbd class="min-w-[1em] font-sans">⇧</kbd>
                        <kbd class="min-w-[1em] font-sans">S</kbd>
                    </span>
                </a>
                <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>
                    Download
                </a>
            </div>
            <div class="p-1">
                <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                    Help Center
                    <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                        <kbd class="min-w-[1em] font-sans">?</kbd>
                    </span>
                </a>
                <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    Changelog
                </a>
                <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                    API
                </a>
            </div>
            <div class="p-1">
                <a href="#" class="flex w-full items-center gap-2 rounded-md px-3 py-2 text-gray-700 hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Log out
                    <span class="inline-flex flex-1 justify-end gap-1 text-xs capitalize text-gray-400">
                        <kbd class="min-w-[1em] font-sans">⌥</kbd>
                        <kbd class="min-w-[1em] font-sans">⇧</kbd>
                        <kbd class="min-w-[1em] font-sans">Q</kbd>
                    </span>
                </a>
            </div>
        </div>
        <!-- <footer class="mt-28 bg-[#333] text-[#fff] p-5">
        <div class="max-w-[1200px] mx-auto flex justify-center flex-col md:flex-row md:justify-between items-center">
            <div class="flex flex-col md:flex-row md:text-sm">
                <p class="mr-5">© 2023 JeiKei, Inc. All rights reserved.</p>
                <p class="md:border-l-2 md:border-l-[#fff] px-4">Designed by JeiKei & PaulTo</p>
            </div>
            <div class="md:text-sm">
                <p>The last upgrade was on August 26, 2023</p>
            </div>
        </div>
    </footer> -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?= $this->section("page_specific_js") ?>
</body>

</html>