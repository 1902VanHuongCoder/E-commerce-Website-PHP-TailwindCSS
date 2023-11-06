<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->e($title) ?></title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="relative w-full min-h-full max-w-[1200px] mx-auto">
    <header>
        <div class="relative flex items-center justify-center py-[40px]">
            <nav class="absolute flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
                <button class="md:hidden bar">
                    <div class="relative border border-[#a3a3a3] rounded"><i class="fa-solid fa-bars p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                    </div>
                </button>
                <div class="flex items-center  justify-center md:justify-between w-full gap-3">
                    <p class="text-[20px] font-bold uppercase"> <span class="text-[#4169E1]">JeiKei</span> Store</p>
                    <ul class="ml-3 hidden md:flex lg:ml-4">
                        <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/register" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Add Admin</a>
                        </li>
                        <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/orders" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Orders</a>
                        </li>
                        <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/customers" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Customers List</a>
                        </li>
                        <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/addproduct" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Add product</a>
                        </li>
                    </ul>

                    <div id="user_info" class="w-10 h-10 border border-1 border-slate-950 rounded-full flex justify-center items-center cursor-pointer">
                        <i class="fa-solid fa-user"></i>
                    </div>

                </div>
            </nav>
            <div class="sidebar fixed top-0 left-[-100%] bg-[#fff] p-4 w-full h-full z-100">
                <div class="mb-4">
                    <button class="closed">
                        <div class="relative border border-[#a3a3a3] rounded w-[40px] h-[40px]">
                            <i class="fa-solid fa-x p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                        </div>
                    </button>
                </div>
                <ul class="flex flex-col">
                    <li class="pb-[15px]">
                        <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Add Admin</a>
                    </li>
                    <li class="pb-[15px]">
                        <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Orders</a>
                    </li>
                    <li class="pb-[15px]">
                        <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Customers List</a>
                    </li>
                    <li class="pb-[15px]">
                        <a href="#" class="no-underline font-semibold text-[20px] transition-colors hover:text-[#4169E1]">Add product</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <!-- Dropdown Menu -->
    <div id="user_info_panel" class="absolute top-14 right-[-100%] transition-all z-10 mt-2 w-60 divide-y divide-gray-100 rounded-lg border border-gray-100 bg-white text-left text-sm shadow-lg">
        <div class="py-3 px-4">
            <div class="flex items-center gap-3">
                <div class="relative h-10 w-10">
                    <div class="w-10 h-10 rounded-full bg-slate-200 text-slate-500 flex justify-center items-center"> <i class="fa-solid fa-user"></i> </div>
                    <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                </div>
                <div class="text-xs">
                    <div class="font-medium text-gray-700"><?= $this->e(\App\SessionGuard::admin()->name) ?></div>
                    <div class="text-gray-400"><?= $this->e(\App\SessionGuard::admin()->email) ?></div>
                </div>
            </div>
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

    <?= $this->section("page") ?>

    <footer class="mt-28 bg-[#333] text-[#fff] p-5 absolute bottom-[-100%] left-0 w-full">
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

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?= $this->section("page_specific_js") ?>
</body>
<script>
    $(document).ready(function() {
        $('.bar').click(function() {
            $('.sidebar').removeClass('left-[-100%]');
        })
        $('.closed').click(function() {
            $('.sidebar').addClass('left-[-100%]');
        })
        $("#user_info").click(function() {
            $("#user_info_panel").toggleClass("right-4");
        });
    })
</script>

</html>