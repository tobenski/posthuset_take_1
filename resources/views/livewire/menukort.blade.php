<main class="flex flex-col items-center justify-start min-h-screen min-w-full">
    <div id="overlay" class="absolute pointer-events-none top-0 left-0 w-full h-screen-1/3 overflow-hidden border-b-4 border-black">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-8">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-sche text-white">Det Gamle Posthus</h1>
    </div>
    <div x-data="{openTab: @entangle('openTab'), current: @entangle('current'), currentAnbefaler: @entangle('currentAnbefaler'), currentAften: @entangle('currentAften') }"
         class="flex flex-col relative top-screen-1/3 w-full items-center justify-start mb-20">
        <div class="flex border-b-2  border-black bg-white h-8 md:h-14 w-full items-center justify-center">
            <div wire:click='showTab(1)'
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l-2 border-r border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 1 ? 'bg-gray-200' : 'bg-gray-50'">
                 Frokost
            </div>
            <div wire:click='showTab(2)'
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l border-r border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 2 ? 'bg-gray-200' : 'bg-gray-50'">
                Eftermiddag
            </div>
            <div wire:click='showTab(3)'
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l border-r border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 3 ? 'bg-gray-200' : 'bg-gray-50'">
                Aften
            </div>
            <div wire:click='showTab(4)'
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l border-r-2 border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 4 ? 'bg-gray-200' : 'bg-gray-50'">
                Børn
            </div>
        </div>
        <div class="w-full md:w-9/12 h-full min-h-1/4 bg-menu text-white relative top-4 md:top-8">
            @include('livewire.menukort.frokost')
            @include('livewire.menukort.eftermiddag')
            @include('livewire.menukort.aften')
            @include('livewire.menukort.born')
        </div>
    </div>
</main>
