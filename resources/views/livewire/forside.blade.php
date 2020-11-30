<main class="w-screen h-screen max-h-screen">
    <div id="overlay" class="absolute pointer-events-none top-0 left-0 w-full h-full overflow-hidden">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div id="home-header" class="flex w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-8">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-sche text-white">Det Gamle Posthus</h1>
    </div>
    <div id="home-content" class="flex flex-col md:flex-row h-full relative w-full justify-center md:justify-evenly mt-2">
        @foreach($boxes as $box)
            <div class="w-full h-full max-h-1/{{ count($boxes)+1 }} overflow-hidden px-10 flex items-center justify-center mt-0
                                            md:px-2 md:w-1/{{ count($boxes) }} md:max-w-1/3 md:max-h-full
                                            lg:pr-2 lg:pl-20 lg:items-start lg:pt-1/4">
                <a href="{{ $box->link }}" class="bg-transparent text-home-box-text">
                    <div class="flex w-full items-start mb-3">
                        <i class="fas fa-arrow-right text-2xl pt-4 lg:pt-2 pr-3 bounce"></i>
                        <div class="">
                            <h3 class="text-2xl font-bold font-sche leading-none
                                    sm:text-4xl
                                    lg:text-5xl">
                                {{ $box->title }}
                            </h3>
                            <p class="mb-6 text-xs sm:text-sm md:text-lg">{{ $box->content }}</p>
                            <a href="#" class="font-bold py-1 px-2 rounded-lg bg-primary text-text text-xs
                                            sm:text-sm
                                            md:text-md md:py-3 md:px-4 md:text-md
                                            lg:px-5 lg:text-lg
                                            hover:bg-primary-hover">
                                {{ $box->button }}
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <x-book-btn />
</main>
