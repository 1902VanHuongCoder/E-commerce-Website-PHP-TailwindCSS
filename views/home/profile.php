<?php $this->layout("layouts/home", ["title" => "Your profile"]) ?>

<?php $this->start("page");
$timestamp = strtotime($user_data["created_at"]);
$currentDate = strtotime(date('Y-m-d'));
$hour = ceil(($currentDate - $timestamp) / 3600);

?>
<div class="w-[95%] h-[647px] sm:h-[570px] mx-auto mt-3 mb-36">
    <div class="relative h-[300px] w-full bg-center bg-cover rounded-sm" style="
            background-image: url('./assets/aviv-rachmadian-7F7kEHj72MQ-unsplash.jpg');
          ">

        <div class="w-[90%] bg-[#fdfdfd] sm:h-[500px] absolute top-32 left-[50%] translate-x-[-50%] mx-auto shadow-lg rounded-md pt-[50px] px-2 sm:px-10 pb-10 sm:pb-0 h-fit ">
            <div style="<?php
                        if (isset($user_data["image"])) {
                            echo "background-image:url('" . $user_data['image'] . "')";
                        } else {
                            echo "background-image:url('./assets/user_avatar.jpg')";
                        }
                        ?>" class="w-[100px] h-[100px] rounded-full shadow-lg absolute left-1/2 translate-x-[-50%] -top-[50px] bg-center bg-cover">

            </div>
            <div class="flex justify-between items-center px-2 lg:px-24">
                <ul class="flex gap-x-6">
                    <li class="flex flex-col items-center"><span class="font-bold text-lg text-[#4169e1]"><?php echo $amountoforder ?></span><span class="text-slate-400">Ordered</span></li>
                    <li class="flex flex-col items-center"><span class="font-bold text-lg text-[#4169e1]"><?php echo  $hour ?></span><span class="text-slate-400">Hours</span></li>
                </ul>
                <a href="/editprofile" class="px-2 py-1 sm:px-5 sm:py-2 bg-[#4169e1] text-sm sm:text-md rounded-md font-medium sm:font-bold text-white">EDIT PROFILE</a>
            </div>
            <div class="text-center mt-12 pb-4">
                <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
                    <?= htmlspecialchars($user_data["name"]) ?>
                </h3>
                <div class="text-sm leading-normal mt-0 mb-2 text-slate-400 font-bold uppercase">
                    <i class="fa-regular fa-envelope"></i></i>
                    <?= htmlspecialchars($user_data["email"]) ?>
                </div>
                <div class="mb-2 text-blueGray-600 mt-10">
                    <i class="fa-solid fa-location-pin mr-2 text-lg text-slate-400"></i> <?= htmlspecialchars($user_data["address"]) ?>

                </div>
                <div class="mb-2 text-blueGray-600">
                    <i class="fa-solid fa-phone mr-2 text-lg text-slate-400"></i> <?= htmlspecialchars($user_data["phone"]) ?>
                </div>
                <hr />
                <div class="mt-5">
                    <p>
                        An artist of considerable range, Jenna the name taken by Melbourne-raised, Brooklyn-based Nick Murphy writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>