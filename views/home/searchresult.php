<?php $this->layout("layouts/home", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="w-full mb-20 mx-auto">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-3 gap-y-5 w-full">
        <?php


        foreach ($resultArray as $result) {
        ?>
            <div class="group flex justify-between flex-col items-center w-full overflow-hidden rounded-md bg-white shadow-md">
                <div class="p-4">
                    <div class="overflow-hidden relative">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($result['image']); ?>" />
                        <a class="w-full h-full absolute cursor-pointer top-0 left-0" href="/detail/<?php echo $this->e($result->id) ?>"></a>
                    </div>
                    <h3 class="text-base font-semibold text-gray-800 py-2"><?php echo $this->e($result->name) ?></h3>
                    <div class="flex justify-center items-center p-1">
                        <p class="w-1/2 flex-1 max-w-[45ch] text-sm text-gray-500"><?php echo $this->e($result->price) ?>$</p>
                        <small class="text-red-400">Warehouse: <?php echo $this->e($result->quantity) ?></small>
                    </div>
                </div>
                <div class="w-full">
                    <div class="px-3 py-6 w-full flex items-center justify-between">
                        <button class="rounded-sm bg-transparent border border-1 border-slate-950 px-4 py-1 text-slate-950 ring-purple-500/30 ring-offset-2 hover:opacity-60 focus-visible:outline-none focus-visible:ring active:opacity-60/90">Add</button>
                        <a href="/orders/<?php echo $this->e($result->id) ?>" class="rounded-sm bg-[#1e90ff] px-4 py-1 text-white ring-purple-500/30 ring-offset-2 hover:opacity-60 focus-visible:outline-none focus-visible:ring active:opacity-60/90">Buy Now</a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>