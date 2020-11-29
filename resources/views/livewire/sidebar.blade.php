<nav class="absolute flex flex-col w-screen md:w-64 z-50 top-0 left-0 h-screen bg-navigation-bg shadow-2xl overflow-y-auto md:rounded-r-xl"
    x-data="{ open: @entangle('showSidebar') }"
    x-cloak
    x-show = "open"
    x-transition:enter="transition ease-out duration-1000 -ml-64"
    x-transition:enter-start="transform translate-x-0  opacity-0"
    x-transition:enter-end="transform translate-x-64 ml-0  opacity-100"
    x-transition:leave="transition ease-in duration-1000 ml-0"
    x-transition:leave-start="transform translate-x-0  opacity-100"
    x-transition:leave-end="transform -translate-x-full opacity-0"
    @click.away="open=!open">

    <div class="flex items-end pt-4 md:pt-6 pr-4 md:pr-6 w-full justify-end">
        <button class="focus:outline-none" wire:click="$emit('toggle-sidebar')">
            <svg class="w-6 md:w-8 h-6 md:h-8 fill-current text-gray-700 hover:text-gray-900" viewBox="0 0 512 512">
                <path d="M443.6,387.1L312.4,255.4l131.5-130c5.4-5.4,5.4-14.2,0-19.6l-37.4-37.6c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4  L256,197.8L124.9,68.3c-2.6-2.6-6.1-4-9.8-4c-3.7,0-7.2,1.5-9.8,4L68,105.9c-5.4,5.4-5.4,14.2,0,19.6l131.5,130L68.4,387.1  c-2.6,2.6-4.1,6.1-4.1,9.8c0,3.7,1.4,7.2,4.1,9.8l37.4,37.6c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1L256,313.1l130.7,131.1  c2.7,2.7,6.2,4.1,9.8,4.1c3.5,0,7.1-1.3,9.8-4.1l37.4-37.6c2.6-2.6,4.1-6.1,4.1-9.8C447.7,393.2,446.2,389.7,443.6,387.1z"/>
            </svg>
        </button>
    </div>
    <div class="flex flex-col h-full w-full p-6 justify-start">
        <x-navigation />

    </div>
</nav>
