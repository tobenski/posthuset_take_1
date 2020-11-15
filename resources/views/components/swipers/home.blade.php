<!-- https://swiperjs.com/ -->
<div class="swiper-home w-full h-full">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach($slides as $key => $slide)
            <div class="swiper-slide swiper-lazy bg-cover z-0"
                data-background="{{ $slide->image }}"
                style="background-image: url({{ $slide->image }})">
                <!-- <div class="swiper-lazy-preloader"></div> -->
                <div class="flex flex-col items-center justify-center h-full w-full">
                    {!! $slide->content !!}
                </div>

            </div>
        @endforeach
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <!-- <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>-->

    <!-- If we need scrollbar -->
    <!-- <div class="swiper-scrollbar"></div> -->
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-home', {
        spaceBetween: 0,
        centeredSlides: true,
        loop: true,
        effect: 'fade',
        speed: 1000,
        grabCursor: true,
        preloadImages: true,
        lazy: false,
        autoplay: {
            delay: 2500,
            disableOnInteraction: true,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
</script>
