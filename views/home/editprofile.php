<?php $this->layout("layouts/home", ["title" => "Your profile"]) ?>

<?php $this->start("page");

?>
<div class="w-[95%] min-h-screen mx-auto mt-3 mb-4">

    <div class="container max-w-screen-lg mx-auto">
        <div>
            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                    <div class="text-gray-600">
                        <p class="font-medium text-lg">Personal Details</p>
                        <p>Please fill out all the fields.</p>
                    </div>

                    <div class="lg:col-span-2">
                        <form action="/editprofile" method="post" class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5" enctype="multipart/form-data">
                            <div class="md:col-span-5">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="<?= htmlspecialchars($user_data["name"]) ?>" />
                            </div>

                            <div class="md:col-span-5">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="<?= htmlspecialchars($user_data["email"]) ?>" placeholder="email@domain.com" />
                            </div>

                            <div class="md:col-span-3">
                                <label for="address">Address / Street</label>
                                <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="<?= htmlspecialchars($user_data["address"]) ?>" placeholder="" />
                            </div>

                            <div class="md:col-span-2">
                                <label for="city">Phone</label>
                                <input type="text" name="phone" id="city" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="<?= htmlspecialchars($user_data["phone"]) ?>" placeholder="" />
                            </div>

                            <div class="md:col-span-5 mt-1">
                                <label for="city">Your avatar</label>
                                <input type="file" name="image" id="imageInput" />
                            </div>
                            <div class="border border-1 border-[#0000001a] md:col-span-5 p-5 h-[200px] rounded-md flex justify-center items-center">
                                <img id="imagePreview" class="hidden" src="#" alt="Image Preview" style="max-width:200px; max-height:200px">
                                <div class="text-[60px] text-slate-300" id="image_icon">
                                    <i class="fa-regular fa-image"></i>
                                </div>
                            </div>
                            <div class="md:col-span-5 text-right">
                                <div class="inline-flex items-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>

<?php ?>