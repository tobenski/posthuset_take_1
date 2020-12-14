<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<div x-data="{ swiper: null, thumbSwiper: null }"
     x-init="() => {
        thumbSwiper = new Swiper($refs.containerthumbs, {
            slidesPerView: {{ count($slides) }},
            spaceBetween: 10,
            freemode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            },
        });
        () => {
            swiper = new Swiper($refs.container, {
                spaceBetween: 10,
                thumbs: {
                    swiper: thumbSwiper,
                },
            },
        });
    }"
    class="w-9/12 md:w-11/12 mx-auto md:mx-20 flex flex-row relative h-screen">
    <div class="absolute inset-y-0 left-0 z-10 items-center flex">
        <button @click="swiper.slidePrev()"
                class="bg-white -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
            <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="flex flex-col">
        <div class="swiper-container h-1/5" x-ref="containerthumbs">

            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($slides as $key => $slide)
                    <div class="swiper-slide swiper-lazy bg-cover z-0 bg-center p-6 w-1/{{ count($slides) }} border-black border-8"
                        data-background="{{ $slide->image }}"
                        data-history="{{ $slide->slug }}"
                        style="background-image: url({{ $slide->image }})"
                        id="thumb_slide_{{ $key }}">

                        <div class="flex flex-col items-center justify-center h-full w-full bg-white bg-opacity-25">
                            <h2 class="text-4xl font-sche">{!! $slide->name !!}</h2>
                            {!! $slide->content !!}
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
        <div class="swiper-container gallery-bottom h-4/5" x-ref="container">

            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($slides as $key => $slide)
                    <div class="swiper-slide swiper-lazy bg-cover z-0 bg-center p-6 w-full border-black border-8"
                        data-background="{{ $slide->image }}"
                        data-history="{{ $slide->slug }}"
                        style="background-image: url({{ $slide->image }})"
                        id="slide_{{ $key }}">

                        <div class="flex flex-col items-center justify-center h-full w-full bg-white bg-opacity-25">
                            <h2 class="text-4xl font-sche">{!! $slide->name !!}</h2>
                            {!! $slide->content !!}
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <div class="absolute inset-y-0 right-0 z-10 flex items-center">
        <button @click="swiper.slideNext()"
                class="bg-white -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow focus:outline-none">
            <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
</div>
