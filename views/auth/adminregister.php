<?php $this->layout("layouts/auth", ["title" =>  "Admin register"]) ?>
<?php $this->start("page") ?>
<div class="w-full min-h-screen flex justify-center items-center">
    <div class="max-w-[1300px] lg:w-10/12 w-full min-h-screen lg:m-5 flex overflow-hidden lg:rounded-xl shadow-xl">
        <form method="POST" action="/admin/register" class="lg:w-1/2 flex justify-center items-center bg-[#FFD700] w-full lg:p-3">
            <div class="sm:w-[450px] w-[90%] bg-[#fff] flex flex-col justify-center rounded-md p-6 shadow-xl gap-y-3">
                <h1 class="font-bold text-center text-[25px]">Admin Register</h1>
                <label for="name" class="font-medium text-[16px]">Your name</label>
                <input name="name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" required autofocus type="text" placeholder="Jackson Micheal" class="<?= isset($errors['name']) ? 'border-red-500' : '' ?> block text-[#333] border border-[#333] p-2 focus:outline-none focus:border-yellow-500 focus:ring-yellow-500 rounded-lg">
                <?php if (isset($errors['name'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['name']) ?></strong>
                    </span>
                <?php endif ?>

                <label for="email" class="font-medium text-[16px]">Your email</label>
                <input name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required autofocus type="email" placeholder="name@gmail.com" class="<?= isset($errors['email']) ? 'border-red-500' : '' ?> block text-[#333] border border-[#333] p-2 focus:outline-none focus:border-yellow-500 focus:ring-yellow-500 rounded-lg">
                <?php if (isset($errors['email'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['email']) ?></strong>
                    </span>
                <?php endif ?>


                <label for="password" class="font-medium text-[16px]">Password</label>
                <input type="password" placeholder="••••••••" id="password" name="password" required class="<?= isset($errors['password']) ? ' border-red-500' : '' ?> block text-[#333] border border-[#333] p-2 focus:outline-none focus:border-yellow-500 focus:ring-yellow-500 rounded-lg">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>


                <label for="password-confirm" class="font-medium text-[16px]">Confirm Password</label>
                <input placeholder="••••••••" id="password-confirm" type="password" name="password_confirmation" required class="<?= isset($errors['password_confirmation']) ? 'border-red-500' : '' ?> block text-[#333] border border-[#333] p-2 focus:outline-none focus:border-yellow-500 focus:ring-yellow-500 rounded-lg">
                <?php if (isset($errors['password'])) : ?>
                    <span class="text-red-500">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <strong><?= $this->e($errors['password']) ?></strong>
                    </span>
                <?php endif ?>
                <button class="block bg-[#FFD700] p-2 font-bold rounded-2xl transition-all duration-300 hover:bg-[#FFFF00] focus:ring focus:bg-[#FFFF00] active:bg-[#FFFF00]">Sign Up</button>
                <div class="flex items-center gap-1">
                    <p class="text-[15px] text-[#333]">If you have an account?</p>
                    <a href="/admin/login" class="text-[16px] text-[#FFD700] font-semibold cursor-pointer hover:underline">Log in</a>
                </div>
            </div>
        </form>
        <div class="w-1/2 h-full overflow-hidden hidden lg:block">
            <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?auto=format&fit=crop&q=60&w=600&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8ZmFzaGlvbnxlbnwwfHwwfHx8MA%3D%3D" alt="">
        </div>
    </div>
</div>
<?php $this->stop() ?>

<