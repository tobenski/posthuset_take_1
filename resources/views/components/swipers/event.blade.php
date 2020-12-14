<div class="h-screen w-screen max-h-screen event-swiper">
    <div class="swiper-container gallery-thumbs" id="event-thumbs">
		<div class="swiper-wrapper">
			@foreach($slides as $slide)
                <div class="swiper-slide cursor-pointer" data-history="{{ $slide->slug }}">
                    <picture >
                        @if ($slide->getFirstMedia('event'))
                            {{ $slide->getFirstMedia('event')->img()->attributes(['class' => 'slider-image relative']) }}
                        @else
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" class="slider-image relative">
                        @endif
                    </picture>
                    <div class="flex flex-col w-full h-full absolute top-0 left-0 items-center justify-center bg-black bg-opacity-25 p-1">
                        <h4 class="text-xs sm:text-lg md:text-2xl lg:text-3xl xl:text-4xl font-sche font-bold leading-none text-center w-full text-white">{!! $slide->name !!}</h4>
                        <p class="hidden md:flex text-xs xl:text-base text-center text-white capitalize">{!! $slide->date->locale('da_DK')->isoFormat('dddd [d.] Do MMMM') !!}</p>
                        <p class="md:hidden flex text- text-xs text-center text-white capitalize">{!! $slide->date->locale('da_DK')->isoFormat('[d.] D/M') !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
	</div>
    <div class="swiper-container gallery-main">
        <div class="absolute inset-y-0 left-0 md:left-8 z-10 items-center flex">
            <button onclick="galleryMain.slidePrev()"
                    class="bg-transparent -ml-2 lg:-ml-4 flex justify-center items-center w-10 h-10 rounded-full shadow-lg focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-left w-6 h-6"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
		<div class="swiper-wrapper">
            @foreach($slides as $slide)
            <div class="swiper-slide overflow-y-auto" data-history="{{ $slide->slug }}">
                <picture >
                    @if ($slide->getFirstMedia('event'))
                        {{ $slide->getFirstMedia('event')->img()->attributes(['class' => 'slider-image']) }}
                    @else
                        <img src="https://swiperjs.com/demos/images/nature-1.jpg" class="slider-image">
                    @endif
                </picture>
                <div class="flex flex-col w-full h-auto min-h-full absolute top-0 left-0 items-center justify-start bg-white bg-opacity-75">
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
        <div class="absolute inset-y-0 right-0 md:right-8 z-10 flex items-center">
            <button onclick="galleryMain.slideNext()"
                    class="bg-transparent -mr-2 lg:-mr-4 flex justify-center items-center w-10 h-10 rounded-full shadow-lg focus:outline-none">
                <svg viewBox="0 0 20 20" fill="currentColor" class="chevron-right w-6 h-6"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
		<!-- <div class="swiper-button-prev swiper-button-white"></div>-->
	</div>
		<!-- Swiper JS -->
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
        slidesPerView: {{ count($slides) }},
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
    <script>
        var thumbs = document.getElementById("event-thumbs");
        thumbs.addEventListener('click', () => {
            thumbs.scrollIntoView(true);
        })
    </script>
</div>
