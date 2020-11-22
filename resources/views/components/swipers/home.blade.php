<!-- https://swiperjs.com/ -->
<!-- https://codepen.io/knud-plougmann-rish-j/pen/RwROpjm -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<div x-data="{ swiper: null, show: false }"
     x-init="() => {
        swiper = new Swiper($refs.container, {
            spaceBetween: 0,
            centeredSlides: true,
            loop: true,
            effect: 'fade',
            speed: 1000,
            grabCursor: true,
            preloadImages: true,
            updateOnImagesReady: true,
            lazy: false,
            autoplay: {
                delay: 5000,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            on: {
            transitionStart: () => {
                show = false;
            },
            transitionEnd: () => {
                show = true;
            }
            },
        });
        setTimeout( () => {
            show = true;
        }, 1000);
    }"
    class="w-full h-72">
    <div class="swiper-container w-full h-full" x-ref="container">
        <div class="swiper-pagination"></div>
        <div class="swiper-wrapper">
            <!-- Slides -->
            @foreach($slides as $key => $slide)
                <div class="swiper-slide swiper-lazy bg-cover z-0 bg-center p-6"
                    data-background="{{ $slide->image }}"
                    @if($slide->duration)
                    data-swiper-autoplay="{{ $slide->duration }}"
                    @endif
                    style="background-image: url({{ $slide->image }})"
                    id="slide_{{ $key }}">

                    <div class="flex flex-col items-center justify-center h-full w-full">
                        {!! $slide->content !!}
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>
