<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $this->e($title) ?></title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <?= $this->section("page_specific_css") ?>
</head>

<body>
    <!-- <nav class="navbar navbar-expand-md sticky-top navbar-light bg-light">
      
        <a class="navbar-brand" href="/">
            <?= $this->e($title) ?>
        </a>

      
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
     
            <div class="navbar-nav">
                &nbsp;
            </div>

            <ul class="navbar-nav ml-auto">
        
                <?php if (!\App\SessionGuard::isUserLoggedIn()) : ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                            <?= $this->e(\App\SessionGuard::user()->name) ?> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" class="d-none" action="/logout" method="POST">
                            </form>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </nav> -->
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
                        <li class="px-[15px] lg:px-[20px] text-[18px]"><a href="Login.html" class="no-underline font-semibold text-[18px] border-b-[2px] border-[transparent] ease-in-out duration-[0.4s] hover:border-b-[2px] hover:border-[#000]">Login</a>
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
    <script src='../../public/js/home.js'></script>
    </script>

    <?= $this->section("page_specific_js") ?>
</body>

</html>