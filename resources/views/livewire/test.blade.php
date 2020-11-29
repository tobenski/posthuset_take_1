<main class="w-screen h-screen max-h-screen">
    <div id="overlay" class="absolute pointer-events-none top-0 left-0 w-full h-full overflow-hidden">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div id="home-content" class="flex flex-col sm:flex-row h-full relative w-full">
        @for($i = 0; $i < 3; $i++)
        <div id="restaurant-box" class="w-full h-full overflow-hidden px-10 flex items-center justify-center
                                        sm:w-1/3 sm:mt-0
                                        md:px-2
                                        lg:px-10 lg:items-start lg:pt-1/4">
            <a href="#" class="bg-transparent text-home-box-text">
                <div class="flex w-full items-start justi mb-3">
                    <i class="fas fa-arrow-right text-2xl pt-4 lg:pt-2 pr-3 bounce"></i>
                    <div class="">
                        <h3 class="text-4xl font-bold font-sche leading-none
                                   sm:text-4xl
                                   lg:text-5xl">
                            Restaurant
                        </h3>
                        <p class="mb-6 text-md sm:text-lg">Velkommen i restauranten. <br> Her er plads til en lille beskrivelse.</p>
                        <a href="#" class="font-bold py-3 px-4 rounded-lg bg-primary-500 text-text text-md
                                           sm:text-lg
                                           lg:px-5
                                           hover:bg-primary-700">
                            Se menukort her
                        </a>
                    </div>
                </div>
            </a>
        </div>
        @endfor


    </div>
</main>
