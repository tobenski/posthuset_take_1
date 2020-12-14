<main class="flex flex-col items-center justify-start h-full min-h-screen min-w-full overflow-x-hidden">
    <div id="overlay" class="relative pointer-events-none top-0 left-0 w-full h-screen-1/5 overflow-hidden mb-2 border-black border-b-4">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-6">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-white">Det Gamle Posthus</h1>
    </div>
    <x-swipers.event :slides="$events" />

</main>
