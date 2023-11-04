<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->e($title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" />
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <?= $this->section("page_specific_css") ?>
</head>

<body class="relative w-full min-h-screen">
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
                        <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="#" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Orders</a>
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
                    <?php if (!\App\SessionGuard::isUserLoggedIn()) : ?>
                        <li class=""><a class="" href="/login">Login</a></li>
                        <li class=""><a class="" href="/register">Register</a></li>
                    <?php else : ?>
                        <li class="">
                            <a class="" href="#" role="button" data-toggle="dropdown">
                                <?= $this->e(\App\SessionGuard::user()->name) ?> <span class="caret"></span>
                            </a>

                            <div class="">
                                <a class="" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" class="d-none" action="/logout" method="POST">
                                </form>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
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
        </div>
    </header>

    <?= $this->section("page") ?>

    <footer class="bg-[#333] text-[#fff] p-5 absolute bottom-[-100%] left-0 w-full">
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
    </script>
    <script>
        $('.bar').click(function() {
            $('.sidebar').toggleClass('left-[-100%]');
        })

        $('.closed').click(function() {
            $('.sidebar').toggleClass('left-[-100%]');
        })
    </script>
    <?= $this->section("page_specific_js") ?>
</body>

</html>