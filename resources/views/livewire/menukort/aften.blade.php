<div x-show="openTab === 3"
        class="text-xs text-center flex flex-col w-full p-2 md:p4 md:px-24 lg:px-40 border-b border-double border-white">
    <h3 class="text-lg font-bold">{{ __('Posthuset anbefaler') }}</h3>
    <h5 class="text-xs font-hairline">{!! $currentAnbefalerMenu->timeframe !!}</h5>
    <h5 x-show="!currentAnbefaler" class="text-xs font-hairline">
        Menuen er gældende fra {{ Carbon\Carbon::parse($currentAnbefalerMenu->firstday)->locale('da_DK')->isoFormat('dddd [den] Do MMMM') }}.
    </h5>
    <h5 class="text-xs font-hairline mb-1 pb-2 border-b border-white -mx-2 md:-mx-24 lg:-mx-40">
        Menuen er gældende til {{ Carbon\Carbon::parse($currentAnbefalerMenu->lastday)->locale('da_DK')->isoFormat('dddd [den] Do MMMM') }}.
    </h5>
    <button wire:click="nextAnbefalerMenu" x-show="currentAnbefaler" class="text-xs font-semibold mb-1 border-b border-white -mx-2 md:-mx-24 lg:-mx-40 -my-1 py-1 bg-gray-600 bg-opacity-25">
        <span class="blink_me">Se den næste "Posthuset Anbefaler" menu her</span>
    </button>
    <button wire:click="currentAnbefalerMenu" x-show="!currentAnbefaler" class="text-xs font-semibold mb-1 border-b border-white -mx-2 md:-mx-24 lg:-mx-40 -my-1 py-1 bg-gray-600 bg-opacity-25">
        <span class="blink_me">Se den nuværende "Posthuset Anbefaler" menu her</span>
    </button>
    @foreach($currentAnbefalerMenu->retter as $ret)
        <p class="mb-2 text-sm leading-none mt-4">
            <b>{!! $ret->name !!}</b><br>
            <span class="text-xs">
            {!! $ret->content !!}
            </span><br>
            <b>{!! $ret->price !!},-</b>
        </p>
    @endforeach
</div>
<div x-show="openTab === 3"
        class="text-xs text-center flex flex-col w-full p-2 md:p4 md:px-24 lg:px-40">
    <h3 class="text-lg font-bold">{{ __('Forretter') }}</h3>
    <h5 class="text-xs font-hairline">{!! $currentAftenMenu->timeframe !!}</h5>
    <h5 x-show="!currentAften" class="text-xs font-hairline">
        Menuen er gældende fra {{ Carbon\Carbon::parse($currentAftenMenu->firstday)->locale('da_DK')->isoFormat('dddd [den] Do MMMM') }}.
    </h5>
    <h5 class="text-xs font-hairline mb-1 pb-2 border-b border-white -mx-2 md:-mx-24 lg:-mx-40">
        Menuen er gældende til {{ Carbon\Carbon::parse($currentAftenMenu->lastday)->locale('da_DK')->isoFormat('dddd [den] Do MMMM') }}.
    </h5>
    <button wire:click="nextAftenMenu" x-show="currentAften" class="text-xs font-semibold mb-1 border-b border-white -mx-2 md:-mx-24 lg:-mx-40 -my-1 py-1 bg-gray-600 bg-opacity-25">
        <span class="blink_me">Se den næste aftenmenu her</span>
    </button>
    <button wire:click="currentAftenMenu" x-show="!currentAften" class="text-xs font-semibold mb-1 border-b border-white -mx-2 md:-mx-24 lg:-mx-40 -my-1 py-1 bg-gray-600 bg-opacity-25">
        <span class="blink_me">Se den nuværende aftenmenu her</span>
    </button>
    @foreach($currentAftenMenu->retter as $ret)
        <p class="mb-2 text-sm leading-none mt-4">
            <b>{!! $ret->name !!}</b><br>
            <span class="text-xs">
            {!! $ret->content !!}
            </span><br>
            <b>{!! $ret->price !!},-</b>
        </p>
    @endforeach
</div>
<div x-show="openTab === 3"
    class="md:absolute md:-ml-16 lg:-ml-36 md:top-24 w-full md:w-36 lg:w-72 md:h-18 lg:h-36">
    <picture>
        @if($currentAftenMenu->getFirstMedia('menu'))
            {{ $currentAftenMenu->getFirstMedia('menu')->img()->attributes(['class' => 'w-full h-full object-cover object-center']) }}
        @else
            <img src="https://via.placeholder.com/300?text=Upload+et+billede+til+at+blive+vist+her" class="w-full h-full object-cover object-center">
        @endif

    </picture>
</div>
<div x-show="openTab === 3"
    class="md:absolute md:-ml-16 lg:-ml-36 md:top-48 lg:top-64 w-full md:w-36 lg:w-72 md:h-18 lg:h-36">
    <picture>
        @if($currentAnbefalerMenu->getFirstMedia('menu'))
            {{ $currentAnbefalerMenu->getFirstMedia('menu')->img()->attributes(['class' => 'w-full h-full object-cover object-center']) }}
        @else
            <img src="https://via.placeholder.com/300?text=Upload+et+billede+til+at+blive+vist+her" class="w-full h-full object-cover object-center">
        @endif

    </picture>
</div>
