<div class="w-full lg:w-2/12 h-full bg-red-500">
    <h2 class="text-3xl font-sche font-semibold text-center w-full mt-2">Din bestilling</h2>
    <hr>
    <div class="flex flex-col px-2 py-2">
        @if($menu->title)
        <p><span class="font-bold">{{ __('Menu') }}:</span> {{ $menu->title }}</p>
        <p><span class="font-bold">{{ __('Pris') }}:</span> {{ $menu->price }},- pr. stk.</p>
        @endif
        @if($order->count)
        <p><span class="font-bold">{{ __('Antal') }}:</span> {{ $order->count . ' ' . __('Kuverter') }}</p>
        @endif
        @if($order->date)
        <p><span class="font-bold">{{ __('Dato') }}:</span> {{ $order->date }}</p>
        @endif
        @if($order->time)
        <p><span class="font-bold">{{ __('Tidspunkt') }}:</span> {{ $order->time }}</p>
        @endif
        <div class="border border-white rounded-lg p-2 my-2">
            @if(!$order->delivery)
            <b>Afhentes på:</b><br>
            Det Gamle Posthus<br>
            Jernbanegade 1,<br>
            8740 Brædstrup
            @else
            <b>Leveres til:</b><br>
            @if($order->delivery_name)
            {{ $order->delivery_name }}<br>
            @endif
            @if($order->delivery_address)
            {{ $order->delivery_address }}<br>
            @endif
            @if($order->delivery_zip)
            {{ $order->delivery_zip }} "[BYNAVN]"<br>
            @endif
            @if($order->contact_phone)
            {!! __('<b>Telefon') . ':</b> ' . $order->contact_phone !!}
            @endif
            @endif
        </div>
        {{ $order->delivery }}
    </div>
    <hr class="mb-4">
        <div class="flex justify-end font-bold text-2xl p-2">
            @if($menu->price && $order->count)
                {{ __('I alt') . ': ' . ($order->count * $menu->price) . ',-' }}
            @endif
        </div>
</div>
