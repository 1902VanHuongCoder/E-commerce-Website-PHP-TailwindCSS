<?php $this->layout("layouts/default", ["title" => "Products detail"]) ?>

<?php $this->start("page") ?>
<i class="fa-solid fa-arrow-left ml-4 "></i> <a href="/" class="font-bold transition-all duration-300 hover:text-[#4169E1] text-[20px]">Home</a>
<div class="relative grid grid-cols-1 w-[95%] gap-y-6 min-h-screen mx-auto lg:grid-cols-4 lg:gap-x-6 mt-3">
    <div class="w-full">
        <div class="w-full <img src=" data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" />
    </div>
</div>
<div class="col-span-2">
    <h1 class="text-[18px] text-[#333] font-bold mb-4 lg:text-[28px]"><?php echo $this->e($product->name); ?></h1>
    <hr>
    <div class="flex flex-col gap-3">
        <div class="py-2">
            <p class="text-[#333] text-[20px] font-medium">Price :<span class="font-normal text-[#DC143C]">
                    $<?php echo $this->e($product->price); ?></span></p>
        </div>
        <div class="flex gap-x-4 justify-start flex-wrap md:flex-row">
            <p class="text-[20px] font-medium">Color :</p>
            <?php
            $colorArray = explode(",", $product->color);
            for ($i = 0; $i < count($colorArray); $i++) {
            ?>
                <input type="checkbox"><?php echo $colorArray[$i] ?></input>
            <?php } ?>
        </div>
        <div>
            <p class="text-[20px]">Size : <span class="text-lg font-medium">Select Size</span></p>
            <div class="flex gap-4 py-2 flex-wrap">
                <?php
                $sizeArray = explode("/", $product->size);
                for ($i = 0; $i < count($sizeArray); $i++) {
                ?>
                    <input type="checkbox"><?php echo $sizeArray[$i] ?></input>
                <?php } ?>
            </div>
        </div>
        <div>
            <h3 class="text-[20px] font-medium">Details :</h3>
            <?php
            $detailArray = explode("/", $product->description);
            for ($i = 0; $i < count($detailArray); $i++) {
            ?>
                <?php
                if ($detailArray[$i] == "") {
                    continue;
                }
                ?>
                <li><?php echo $detailArray[$i] ?></li>

            <?php } ?>

            <li><span class="font-medium">Product Dimensions : </span>12 x 8 x 4 inches; 1.92 Pounds</li>
            <li><span class="font-medium">Item model number : </span>FD7039</li>
            <li><span class="font-medium">Manufacturer : </span>NIKE</li>
        </div>
    </div>
</div>
<div class="relative text-[16px]">
    <div class="flex flex-col border border-[#333] rounded-md p-3 gap-2">
        <p>No Import Fees Deposit & $30.03 Shipping to Vietnam</p>
        <p>Delivery <span class="font-medium">Monday, August 28</span></p>
        <p class="text-[#1E90FF]"><i class="fa-solid fa-plane-departure text-[#000]"></i> Transporting water
            out</p>
        <a href="/orders/<?php echo $product->id ?>" class="flex justify-center items-center gap-x-1 bg-yellow-400 py-1 font-medium hover:bg-[#1E90FF] hover:text-[#fff] transition-all duration-[0.4s]"><i class="fa-solid fa-cart-shopping"></i> Buy
            Now</a>
        <div>
            <div class="flex justify-between items-center">
                <span>Payment :</span>
                <span class="text-[#1E90FF]">Secure transaction</span>
            </div>
            <div class="flex justify-between items-center">
                <span>Ships form :</span>
                <a href="#" class="hover:underline hover:text-[#1E90FF] transition-all duration-[0.2s]">Amazon.com</a>
            </div>
            <div class="flex justify-between items-center">
                <span>Guarantee :</span>
                <span class="text-[#1E90FF]">30 days</span>
            </div>
        </div>
        <p class="text-[18px] font-medium">After the warranty period, no returns</p>
    </div>
</div>
</div>

<?php $this->stop() ?>