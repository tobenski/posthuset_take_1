<main class="w-screen h-screen max-h-screen">
    <div id="overlay" class="absolute pointer-events-none top-0 left-0 w-full h-full overflow-hidden">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div id="home-header" class="flex w-full items-center justify-center relative mt-8">
        <h1 class="text-6xl font-sche text-white">Det Gamle Posthus</h1>
    </div>
    <div id="home-content" class="flex flex-col sm:flex-row h-full relative w-full justify-evenly">
        @foreach($boxes as $box)
            <div class="w-full h-full overflow-hidden px-10 flex items-center justify-center
                                            sm:w-1/{{ count($boxes) }} sm:mt-0 sm:max-w-1/3
                                            md:px-2
                                            lg:pr-2 lg:pl-20 lg:items-start lg:pt-1/6">
                <a href="{{ $box->link }}" class="bg-transparent text-home-box-text">
                    <div class="flex w-full items-start justi mb-3">
                        <i class="fas fa-arrow-right text-2xl pt-4 lg:pt-2 pr-3 bounce"></i>
                        <div class="">
                            <h3 class="text-4xl font-bold font-sche leading-none
                                    sm:text-4xl
                                    lg:text-5xl">
                                {{ $box->title }}
                            </h3>
                            <p class="mb-6 text-md sm:text-lg">{{ $box->content }}</p>
                            <a href="#" class="font-bold py-3 px-4 rounded-lg bg-primary-500 text-text text-md
                                            sm:text-lg
                                            lg:px-5
                                            hover:bg-primary-700">
                                {{ $box->button }}
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</main>
