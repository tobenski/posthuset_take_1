<div x-show="openTab === 4"
        class="text-xs text-center flex flex-col w-full p-2 md:p4 md:px-24 lg:px-40">
    <h3 class="text-lg font-bold">{{ __('Børnemenu') }}</h3>
    <h5 class="text-xs font-hairline">{!! $currentBorneMenu->timeframe !!}</h5>
    <h5 class="text-xs font-hairline mb-1 pb-2 border-b border-white -mx-2 md:-mx-24 lg:-mx-40">
        {{ $currentBorneMenu->comment }}
    </h5>
    @foreach($currentBorneMenu->retter as $ret)
        <p class="mb-2 text-sm leading-none mt-4">
            <b>{!! $ret->name !!}</b><br>
            <span class="text-xs">
            {!! $ret->content !!}
            </span><br>
            <b>{!! $ret->price !!},-</b>
        </p>
    @endforeach
        <p class="mb-2 text-sm leading-none mt-4">
            <b>{{ __('Mad i børnehøjde') }}</b><br>
            <span class="text-xs">
                Alle retter i menukortet kan laves i en børnevenlig udgave, til halvdelen af den almindelige pris.<br />
                Maden vil blive anrettet adskilt og dele kan på opfordring undlades.
            </span>
        </p>
</div>
<div x-show="openTab === 4"
    class="md:absolute md:-ml-16 lg:-ml-36 md:top-24 w-full md:w-36 lg:w-72 md:h-18 lg:h-36">
    <picture>
        @if($currentBorneMenu->getFirstMedia('menu'))
            {{ $currentBorneMenu->getFirstMedia('menu')->img()->attributes(['class' => 'w-full h-full object-cover object-center']) }}
        @else
            <img src="https://via.placeholder.com/300?text=Upload+et+billede+til+at+blive+vist+her" class="w-full h-full object-cover object-center">
        @endif

    </picture>
</div>
