<main class="flex flex-col items-center justify-start h-full min-h-screen min-w-full overflow-x-hidden bg-white">
    <div id="overlay" class="relative pointer-events-none top-0 left-0 w-full h-screen-1/10 lg:h-screen-1/10 overflow-hidden border-black border-b-4">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 py-3 shadow-md my-3" role="alert">
            <div class="flex">
                <div>
                    @foreach ($errors->all() as $message)
                        <p class="text-sm">{{ $message }}</p>
                    @endforeach
                </div>
            </div>
        </div>


    <div class="flex flex-col w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-2">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-white leading-none">{{ config('app.name') }}</h1>
    </div>
    <div class="flex flex-col w-full items-center justify-center my-8">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-black leading-none">{{ __('Bestil ') . $menu->title }}</h2>
    </div>
    <div class="flex flex-col lg:flex-row justify-start lg:justify-evenly h-full min-h-screen w-full pt-8"
         x-data="{ currentStep: @entangle('currentStep'), delivery: @entangle('order.delivery'), show: '' }">
        <div class="w-full lg:w-8/12 h-full">
            @include('livewire.catering-menu-order.bestilling')
            @include('livewire.catering-menu-order.user')
        </div>
        @include('livewire.catering-menu-order.total')
    </div>

</main>
