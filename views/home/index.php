<?php $this->layout("layouts/home", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <?php
    if ($userinfo) {
    ?>
        <div id="success-notification" class="bg-green-500 text-white px-4 py-2 fixed top-0 right-0 m-4 rounded-md shadow-lg animate__animated animate__backInRight">
            <p class="font-bold"><i class="fa-solid fa-check"></i> Logged in successfully</p>
            <p>Welcome to Jeikei Store</p>
        </div>
    <?php } ?>

    <div class="grid grid-cols-2">
        <?php
        foreach ($productinfo as $product) :
        ?>
            <div class="w-full overflow-hidden rounded-md bg-white shadow-md transition-all duration-75 hover:shadow-lg hover:shadow-gray-600/50">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($product['image']); ?>" class="aspect-video w-96 object-cover" />
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800"><?php echo $this->e($product->name) ?></h3>
                    <p class="w-full max-w-[45ch] text-sm text-gray-500"><?php echo $this->e($product->price) ?>$</p>
                    <div class="mt-4 flex items-end justify-end">
                        <button class="rounded-sm bg-purple-500 px-4 py-1 text-white ring-purple-500/30 ring-offset-2 hover:bg-purple-600 focus-visible:outline-none focus-visible:ring active:bg-purple-600/90">Add cart</button>
                        <a href="/orders/<?php echo $this->e($product->id) ?>" class="rounded-sm bg-purple-500 px-4 py-1 text-white ring-purple-500/30 ring-offset-2 hover:bg-purple-600 focus-visible:outline-none focus-visible:ring active:bg-purple-600/90">Buy Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

</div>
<!-- ALERT BOX -->
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function() {
        const successNotification = $('#success-notification');
        if (successNotification.length > 0) {
            successNotification.css('display', 'block');
        }
        setTimeout(() => {
            successNotification.css('display', 'none');
        }, 5000);

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


        $("#user_info").click(function() {
            $("#user_info_panel").toggleClass("opacity-100");
        });
        var $carousel = $('.carousel');
        var $slides = $('.carousel-slide');

        var currentSlide = 0;
        var slideWidth = $slides.first().width();
        var totalSlides = $slides.length;

        setInterval(function() {
            var newPosition = -(currentSlide + 1) * slideWidth;
            $carousel.find('.carousel-inner').animate({
                'transform': 'translateX(' + newPosition + 'px)'
            }, 500, function() {
                currentSlide++;
                if (currentSlide === totalSlides - 1) {
                    $carousel.find('.carousel-inner').css('transform', 'translateX(0)');
                    currentSlide = 0;
                }
            });
        }, 3000);

    });
</script>
<?php $this->stop() ?>