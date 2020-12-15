<main class="event-swiper h-screen w-full overflow-y-auto">
    <div class="relative pointer-events-none top-0 left-0 w-full h-screen-1/5 border-black border-b-4 overflow-hidden">
        <video preload="auto" autoplay playsinline muted loop class="object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-6">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-white">Det Gamle Posthus</h1>
    </div>
    <!-- <x-swipers.event :slides="$events" -->
    <div class="swiper-container gallery-thumbs bg-yellow-500" id="event-thumbs">
        <div class="swiper-wrapper">
            @foreach($events as $slide)
                <div class="swiper-slide cursor-pointer">
                    <picture>
                        @if ($slide->getFirstMedia('event'))
                            {{ $slide->getFirstMedia('event')->img()->attributes(['class' => 'slider-image']) }}
                        @else
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" class="slider-image">
                        @endif
                    </picture>
                    <div class="absolute top-0 left-0 bg-black bg-opacity-25 w-full h-full flex flex-col items-center justify-center p-1">
                        <h4 class="text-xs sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl font-sche font-bold leading-none text-center w-full text-white">{!! $slide->name !!}</h4>
                        <p class="hidden md:flex text-xs xl:text-base text-center text-white capitalize">{!! $slide->date->locale('da_DK')->isoFormat('dddd [d.] Do MMMM') !!}</p>
                        <p class="md:hidden flex text- text-xs text-center text-white capitalize">{!! $slide->date->locale('da_DK')->isoFormat('[d.] D/M') !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="swiper-container gallery-main">
        <div class="swiper-wrapper">
            @foreach($events as $slide)
                <div class="swiper-slide">
                    <picture>
                        @if ($slide->getFirstMedia('event'))
                            {{ $slide->getFirstMedia('event')->img()->attributes(['class' => 'slider-image']) }}
                        @else
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" class="slider-image relative">
                        @endif
                    </picture>
                    <div class="flex flex-col w-full h-full absolute top-0 left-0 items-center justify-start bg-white bg-opacity-75">
                        <h1 class="text-4xl font-sche w-full text-center mt-4 leading-none font-extrabold">{{ $slide->name }}</h1>
                        <h3 class="text-xs leading-none w-full text-center text-gray-600 -mt-2">
                            <span class="capitalize">{{ $slide->date->locale('da_DK')->isoFormat('dddd ') }}</span>
                            {{ $slide->date->locale('da_DK')->isoFormat('[den] Do MMMM') . '.' }}
                        </h3>
                        <h3 class="text-xs leading-none w-full text-center text-gray-600">
                            {{ __('Klokken ') . $slide->time->format('H:i') . __(' til ') . $slide->time->addMinutes($slide->duration)->format('H:i') . '.'  }}
                        </h3>
                        <a href="{{ $slide->button_link }}" class="btn btn-primary my-2" target="_blank">{{ $slide->button_text }}</a>
                        <div class="w-full h-full flex flex-col items-center md:items-start md:flex-row p-8 md:py-4 md:px-16 text-center">
                            <div class="w-full text-xs md:text-base font-semibold md:pr-8">{!! $slide->content !!}</div>
                            <div class="w-full text-xs md:text-base font-semibold mt-4 md:mt-0 md:pl-8">{!! $slide->content2 !!}</div>

                        </div>
                        <p class="text-2xl font-sche font-bold w-full text-center">
                            {{ __('Pris: ') . $slide->price . __(',-') }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 3,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      breakpoints: {
    // when window width is >= 640px
        640: {
        slidesPerView: 4,
        spaceBetween: 10
        },
        // when window width is >= 1024px
        1024: {
        slidesPerView: {{ count($events) }},
        spaceBetween: 10
        },
      }
    });
    var galleryMain = new Swiper('.gallery-main', {
      spaceBetween: 10,
      loop: true,
      effect: 'fade',
      centeredSlides: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      history: {
        key: 'arrangementer',
        replaceState: false,
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
    </script>
</main>
