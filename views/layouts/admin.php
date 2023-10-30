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

<body>
    <header>
        <div class="relative flex items-center justify-between py-[40px]">
            <nav class="absolute flex items-center justify-between top-0 left-0 w-full px-4 py-[15px]">
                <button class="md:hidden bar">
                    <div class="relative border border-[#a3a3a3] rounded"><i class="fa-solid fa-bars p-[12px] ease-out duration-[0.4s] hover:scale-[1.1]"></i>
                    </div>
                </button>
                <div class="relative flex items-center justify-center">
                    <p class="text-[25px] md:text-[18px] font-bold uppercase"> <span class="text-[#4169E1]">JeiKei</span> Dashboard</p>
                </div>
                <ul class="ml-3 hidden md:flex lg:ml-4">
                    <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/register" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Add Admin User</a>
                    </li>
                    <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/orders" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Orders</a>
                    </li>
                    <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/customers" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Customers List</a>
                    </li>
                    <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="/admin/addproduct" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Add product</a>
                    </li>
                </ul>
                <ul>
                    <?php if (!\App\SessionGuard::isAdminLoggedIn()) : ?>
                        <li class=""><a class="" href="/login">Login</a></li>
                        <li class=""><a class="" href="/register">Register</a></li>
                    <?php else : ?>
                        <li class="">
                            <a class="" href="#" role="button" data-toggle="dropdown">
                                <?= $this->e(\App\SessionGuard::admin()->name) ?> <span class="caret"></span>
                            </a>

                            <div class="">
                                <a class="" href="/admin/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" class="d-none" action="/admin/logout" method="POST">

                                </form>
                            </div>
                        </li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>
    </header>


    <?= $this->section("page") ?>

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

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <?= $this->section("page_specific_js") ?>
</body>

</html>