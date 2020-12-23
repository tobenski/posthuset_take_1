<main class="flex flex-col items-center justify-start h-full min-h-screen min-w-full overflow-x-hidden bg-white">
    <div id="overlay" class="relative pointer-events-none top-0 left-0 w-full h-screen-1/10 lg:h-screen-3/10 overflow-hidden border-black border-b-4">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex flex-col w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-16">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-white leading-none">{{ config('app.name') }}</h1>
        <h2 class="text-xl sm:test-2xl md:text-3xl lg:text-4xl font-sche text-text leading-none">{{ __('Catering') }}</h2>
    </div>

    <div class="w-full flex justify-between pb-16 min-h-screen">
        <div class="w-1/2 pl-16 pr-8 flex flex-col pt-16 justify-between">
            <div>
                <a href="{{ route('catering') }}" class="text-xl">
                    <i class="fas fa-arrow-left text-black"></i>
                    <span class="uppercase text-menu font-extrabold tracking-widest">{{ __('Tilbage') }}</span>
                </a>
                <div class="mt-8">
                    <h1 class="text-4xl uppercase font-extrabold antialiased mb-4">{{ $menu->title }}</h1>
                    <p class="text-gray-700 mb-4">{!! $menu->description !!}</p>
                </div>
                Læs vores
                <a href="#" class="text-green-500 hover:text-gray-500">
                    Afbestillingsbetigelser
                </a>
            </div>
            <div class="flex w-full justify-between items-start mt-8 py-4 border-t-2 border-b-2 border-gray-600">
                <a href="#" class="text-gray-800 flex flex-col items-center justify-center w-1/3 text-center" >
                    <i class="fas fa-book-open text-black text-6xl mb-2"></i>
                    Alt er tilberedt og varmt så det er så nemt som muligt for dig.
                </a>
                <a href="#" class="text-gray-800 flex flex-col items-center justify-center w-1/3 text-center" >
                    <i class="fas fa-users text-black text-6xl mb-2"></i>
                    Kan laves til {{ $menu->min_couv }} personer og opefter.
                </a>
                <a href="#" class="text-gray-800 flex flex-col items-center justify-center w-1/3 text-center" >
                    <i class="far fa-calendar text-black text-6xl mb-2"></i>
                    Bestil mindst {{ $menu->days_before }} dage før.
                </a>
            </div>
        </div>
        <div class="w-1/2 h-screen">
            <div class="w-full h-full">
                @if ($menu->getFirstMedia('catering'))
                    {{ $menu->getFirstMedia('catering')->img()->attributes(['class' => 'object-cover object-center h-full']) }}
                @else
                    <img src="https://images.photowall.com/products/55415/burger.jpg" class="h-full  object-cover object-center overflow-hidden">
                @endif
            </div>
        </div>
    </div>

    <div id="menu" class="flex flex-col items-center justify-center w-8/12 text-center">
        {!! $menu->menu !!}
    </div>

    <div class="flex fixed w-full px-1/12 bg-menu bottom-0 items-center py-2">
        <form class="w-full flex justify-between" action="{{ route('catering.order') }}" method="POST">
            @csrf
            <div class="flex items-center">
                <p class="text-xl font-extrabold uppercase antialiased leading-none text-right pr-4">{{ __('Bestil') }}</p>
                <x-KuvertAntal min="{{ $menu->min_couv }}" max="50" />
                <x-DatePicker name="date" id="date" class="w-auto px-5 leading-none h-12 rounded text-center" :menu="$menu" />
                <input type="hidden" name ="menu_id" id="menu_id" value="{{ $menu->id }}" />
            </div>
            <div class="flex items-center">
                <div class="flex flex-col mr-4">
                    <p class="text-lg font-extrabold antialiased leading-none text-right">Pris: {{ $menu->price }},-</p>
                    <p class="text-xs font-extrabold antialiased leading-none text-right">Pr. Person</p>
                </div>
                <button class="px-8 py-2 bg-primary hover:bg-primary-hover text-text rounded-lg focus:outline-none shadow-sm hover:shadow-xl" type="submit">
                    {{ __('Bestil') }}
                </button>
            </div>
        </form>
    </div>
</main>
