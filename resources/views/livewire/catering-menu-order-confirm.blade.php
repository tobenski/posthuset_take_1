<main class="flex flex-col items-center justify-start h-full min-h-screen min-w-full overflow-x-hidden bg-white">
    <div id="overlay" class="relative pointer-events-none top-0 left-0 w-full h-screen-1/10 lg:h-screen-3/10 overflow-hidden border-black border-b-4">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
</div>
<div class="flex flex-col w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-12">
    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-white leading-none">{{ config('app.name') }}</h1>
</div>
<div class="flex flex-col w-full items-center justify-center my-8 border-b border-black">
    <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-black leading-none">{{ __('Bekræftelse på din bestilling') }}</h2>
    <p class="text-xs">En kopi af denne bekræftelse er sendt til {{ $user->email }}</p>
</div>
    <div class="w-8/12 bg-gray-200 min-h-7/10-screen p-6">
        <div class="border-b-2 border-black">
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-sche text-black leading-none w-full">{{ __('Maden') }}<span class="float-right">{{ __('Pris')}}</span></h2>
            <p class="w-full text-left mb-4 leading-none">
                {{ $order->count . __(' x ')  }} <a href="{{ route('catering.show', $menu->slug) }}" target="_blank" class="text-black hover:underline">{{ $menu->title }} </a> {{  __(' á ') . $menu->price . __(',- ') }}<span class=" float-right font-bold">{{ $order->count * $menu->price . ',-' }}</span><br>
                <span class="text-xs leading-none">{!! $menu->description !!}</span>
            </p>
            <p class="w-full text-left mb-4 leading-none">
                    @if (!$order->delivery)
                        <b>Afhentes på:</b><br>
                        <span class=" text-xs">
                        Det Gamle Posthus,<br>
                        Jernbanegade 1,<br>
                        8740 Brædstrup<br>
                    @else
                        Leveres til:<span class="float-right text-right font-bold">150,-</span><br><!-- TODO: find leverings pris ud fra zip -->
                        <span class=" text-xs">
                        {{ $order->delivery_name }}<br>
                        {{ $order->delivery_address }}<br>
                        {{ $order->delivery_zip . ' ' . $order->delivery_city }}<br>
                        {!! '<b>' . __('Telefon') . ': </b>' . $order->contact_phone !!}
                    @endif
                    <span class="capitalize">{{ Carbon\Carbon::parse($order->date)->locale('da_DK')->isoFormat('dddd [d.] Do MMMM YYYY') }}</span>
                    Klokken {{ $order->time }}
                </span>
            </p>
        </div>
        <div flex class="w-full border-b-2 border-black mt-4 flex flex:col md:flex-row">
            <div class="w-full md:w-1/2">
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-sche text-black leading-none">{{ __('Kontakt Oplysninger') }}</h2>
                <p class="w-full text-left mb-4 text-xs leading-none">
                    <b>Navn: </b>{{ $user->name . ' ' . $user->lastname }}<br>
                    <b>Email: </b>{{ $user->email }}<br>
                    @if($user->company)
                        <b>Firma: </b>{{ $user->company }}<br>
                        <b>CVR: </b> {{ $user->cvr }}<br>
                    @endif
                    <b>Telefon: </b>{{ $user->phone }}<br>
                    <b>Adresse: </b>{{ $user->address }}<br>
                    <b>Postnummer & By: </b>{{ $user->zip . ' ' . $user->city }}
                </p>
            </div>
            <div class="w-full md:w-1/2 text-right">
                <span class="font-bold">Total pris: </span>{{ $order->total() . ',-' }}
            </div>
        </div>
        <div class="border-b-2 border-black mt-4">
            <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-sche text-black leading-none">{{ __('Menuen') }}</h2>
            <p class="w-full text-left mb-4">
                <h3 class="text-sm sm:text-base md:text-lg lg:text-xl text-black leading-none underline mb-3">
                    {{ $menu->title }}
                </h3>
                {!! $menu->menu !!}
            </p>
        </div>
    </div>
</main>


