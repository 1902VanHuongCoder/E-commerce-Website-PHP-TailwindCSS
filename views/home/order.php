<?php $this->layout("layouts/default", ["title" => "Orders"]) ?>

<?php $this->start("page") ?>
<div class="container mx-auto">
    <a href="/">Home</a>
    <h1>Add product</h1>
    <form action="/orders/<?= $this->e($productinfo->id) ?>" method="POST" enctype="multipart/form-data">
        <div class="mx-auto">
            <div>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($productinfo->image); ?>" />
            </div>
            <div>
                <h2>Name</h2>
                <input name="name" value="<?= $this->e($productinfo->name) ?>" />
            </div>
            <div>
                <h2>Price</h2>
                <input name="price" value="<?= $this->e($productinfo->price) ?>" />
            </div>
            <div>
                <h2>Size</h2>
                <input name="size" value="<?= $this->e($productinfo->size) ?>" />
            </div>
            <div>
                <h2>Color</h2>
                <input name="color" value="<?= $this->e($productinfo->color) ?>" />
            </div>
            <div>
                <h2>Quantity</h2>
                <input name="quantity" value="<?= $this->e($productinfo->quantity) ?>" />
            </div>
            <div>
                <h2>Description</h2>
                <input name="description" value="<?= $this->e($productinfo->description) ?>" />
            </div>
            <div>
                <h2>Amount</h2>
                <input type="number" name="total_amount" min="1" />
                <?php if (isset($errors['total_amount'])) : ?>
                    <span class="text-red-500 mt-1 text-sm">
                        <strong><?= $this->e($errors['total_amount']) ?></strong>
                    </span>
                <?php endif ?>
            </div>
        </div>
        <button type="submit" class="rounded-lg border border-gray-300 bg-white px-5 py-2.5 text-center text-sm font-medium text-gray-700 shadow-sm transition-all hover:bg-gray-100 focus:ring focus:ring-gray-100 disabled:cursor-not-allowed disabled:border-gray-100 disabled:bg-gray-50 disabled:text-gray-400">Buy</button>
    </form>
</div>
<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function() {
        //sidebar
        $('.bar').click(function() {
            $('.sidebar').toggleClass('left-[-100%]');
        })

        $('.closed').click(function() {
            $('.sidebar').toggleClass('left-[-100%]');
        })

        //ẩn hiện thanh ngang
        $('.clickdown_2').click(function() {
            $('.list_1').addClass('hidden');
            $('.dropdown_1').addClass('rotate-180');
            if (!$('.list_2').hasClass('hidden')) {
                $('.list_2').addClass('hidden');
            } else {
                $('.list_2').removeClass('hidden');
            }

            $('.dropdown_2').toggleClass('rotate-180');
        });

        $('.clickdown_1').click(function() {
            $('.list_2').addClass('hidden');
            if (!$('.list_1').hasClass('hidden')) {
                $('.list_1').addClass('hidden');
            } else {
                $('.list_1').removeClass('hidden');
            }

            $('.dropdown_1').toggleClass('rotate-180');
        });

        //cart
        $('.close-cart').click(function() {
            $('.cart-shop').addClass('translate-x-[100%]');
            $('.opacity-toggle').addClass('hidden');
        })

        $('.fa-cart-shopping').click(function() {
            $('.cart-shop').removeClass('translate-x-[100%]');
            $('.opacity-toggle').removeClass('hidden');
        })
    });
</script>
<?php $this->stop() ?>