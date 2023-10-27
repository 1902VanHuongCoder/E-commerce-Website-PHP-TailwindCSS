<?php $this->layout("layouts/auth", ["title" => "Admin Log In"]) ?>

<?php $this->start("page") ?>
<div class="w-full min-h-screen flex justify-center items-center">
    <div class="max-w-[1300px] lg:w-10/12 w-full min-h-screen lg:m-5 flex overflow-hidden lg:rounded-xl shadow-xl">
        <div class="w-1/2 h-full overflow-hidden hidden lg:block">
            <img src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&q=60&w=600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8ZmFzaGlvbnxlbnwwfHwwfHx8MA%3D%3D" alt="">
        </div>
        <form action="/admin/login" method="POST" class="lg:w-1/2 flex justify-center items-center bg-[#00BFFF] w-full lg:p-3">
            <div class="sm:w-[450px] w-[90%] bg-[#fff] flex flex-col justify-center rounded-md p-6 shadow-xl gap-y-3">
                <h1 class="font-bold text-center text-[25px]">Admin Log In</h1>

                <label for="" class="font-medium text-[16px]">Your Email</label>
                <input name="email" id="email" type="text" required autofocus placeholder="name@gmail.com" class="<?= isset($errors['email']) ? 'border-red-500' : '' ?>  block text-[#333] border border-[#333] p-2 focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-lg" name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>">
                <?php if (isset($errors['email'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['email']) ?></strong>
                    </span>
                <?php endif ?>

                <label for="password" class="font-medium text-[16px]">Password</label>
                <input name="password" id="password" type="password" placeholder="••••••••" class=" <?= isset($errors['password']) ? 'border-red-500' : '' ?> block text-[#333] border border-[#333] p-2 focus:outline-none focus:border-sky-700 focus:ring-sky-700 rounded-lg">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>

                <div class="flex items-center justify-between">
                    <div class="flex items-center justify-center gap-1">
                        <input type="checkbox" class="cursor-pointer w-4 h-4 boder border-gray-400">
                        <p class="text-[#333] text-[16px] font-normal">Remember me</p>
                    </div>
                    <a href="#" class="text-[16px] text-[#4169E1] font-semibold cursor-pointer hover:underline">Forgot Password?</a>
                </div>
                <button class="block bg-[#00BFFF] p-2 font-bold rounded-2xl transition-all duration-300 hover:bg-[#2ea9d2] focus:ring focus:bg-[#4169E1] active:bg-[#4169E1]">Login</button>
                <div class="flex items-center gap-1">
                    <p class="text-[15px] text-[#333]">Don’t have an account yet?</p>
                    <a href="/admin/register" class="text-[16px] text-[#4169E1] font-semibold cursor-pointer hover:underline">Register</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $this->stop() ?>