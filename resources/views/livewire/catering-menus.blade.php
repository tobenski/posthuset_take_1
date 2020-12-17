<main class="flex flex-col items-center justify-start h-full min-h-screen min-w-full overflow-x-hidden bg-white">
    <div id="overlay" class="relative pointer-events-none top-0 left-0 w-full h-screen-3/10 overflow-hidden border-black border-b-4">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-16">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-white">{{ config('app.name') }}</h1>
    </div>

    <h1 class="w-full text-center font-sche text-4xl font-extrabold">{{ __('Mad ud af Huset') }}</h1>
    <div class="w-8/12 md:w-6/12 text-center mb-8">
        Vores catering er festmad ud af huset til små og store begivenheder, mærkedage og højtider. Foruden mad og drikke, kan vi levere alle remedier og bemanding, så I blot skal læne jer tilbage og nyde hinandens selskab, mens vi følger arrangementet til dørs.
    </div>
    <div class="w-full h-full flex flex-col items-center justify-start"
        x-data="{ open: 'all' }">
        <div class="flex flex-wrap w-full md:w-8/12 justify-center">
            <button class="font-bold py-2 md:py-3 px-3 md:px-5 rounded-full bg-gray-700 hover:bg-black shadow-lg mx-2 my-1 md:my-0 text-text focus:outline-none"
                @click="open='all'">
                Alle
            </button>
            @foreach($cateringTypes as $type)
                <button class="font-bold py-2 md:py-3 px-3 md:px-5 rounded-full bg-gray-700 hover:bg-black shadow-lg mx-2 my-1 md:my-0 text-text focus:outline-none"
                        @click="open = '{{ $type->name }}'">
                    {{ $type->name }}
                </button>
            @endforeach
        </div>
        <div class="w-full md:w-10/12 flex flex-wrap mt-8 justify-between mx-2 md:mx-0">
            @foreach($cateringMenus as $menu)
                <div x-show="open === '{{ $menu->cateringType->name }}' || open === 'all'"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-500"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="w-full md:w-1/2 lg:w-1/4">
                    <div class="rounded shadow-lg flex flex-col bg-paper m-4 overflow-hidden">
                        <div class="font-sche text-3xl text-center py-2">{{ $menu->title }}</div>
                        <div class="overflow-hidden w-full h-full">
                            @if ($menu->getFirstMedia('catering'))
                                {{ $menu->getFirstMedia('catering')->img()->attributes(['class' => 'w-full object-cover object-center transform duration-300 hover:scale-110 h-72']) }}
                            @else
                                <img src="https://images.photowall.com/products/55415/burger.jpg" class="w-full object-cover object-center transform duration-300 hover:scale-110 h-72">
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>
