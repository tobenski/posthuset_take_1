<main class="flex flex-col items-center justify-start h-full min-h-screen min-w-full overflow-x-hidden bg-white">
    <div id="overlay" class="relative pointer-events-none top-0 left-0 w-full h-screen-1/10 lg:h-screen-1/10 overflow-hidden border-black border-b-4">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex flex-col w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-2">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-white leading-none">{{ config('app.name') }}</h1>
    </div>
    <div class="flex flex-col w-full items-center justify-center my-8">
        <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-sche text-black leading-none">{{ __('Bestil ') . $menu->title }}</h2>
    </div>
    <div class="flex flex-col lg:flex-row justify-start lg:justify-evenly h-full min-h-screen w-full pt-8"
         x-data="{currentStep: @entangle('currentStep'), delivery: @entangle('order.delivery') }">
        <div class="w-full lg:w-8/12 h-full">
            <div class="w-full rounded-xl bg-menu p-4 mb-6 border border-black">
                <h1 class="text-4xl font-sche font-extrabold uppercase">Tjek Bestilling</h1>
                <div x-show="currentStep === 1" class="flex flex-col lg:flex-row">
                    <div class="flex flex-col items-center">
                        <div>Antal:</div>
                        <div class="relative h-12 mx-2" x-data="counter()">
                            <button type="button"
                                    class="block w-8 pb-1 rounded-sm border-0 bg-transparent text-3xl leading-none absolute top-0 bottom-0 left-0 z-10 h-full focus:outline-none"
                                    x-on:click="decrement()">-</button>
                            <input class="text-center align-middle px-5 leading-none w-full h-full rounded"
                             wire:model="order.count"
                             id="antal"
                             type="tel"
                             autocomplete="off"
                             step="1"
                             min="{{ $menu->min_couv }}"
                             max="50">
                            <span class="absolute right-10 transform translate-y-1/2 text-black">
                                 {{ __('Kuverter') }}
                            </span>
                            <button type="button"
                                    class="block w-8 pb-1 rounded-sm border-0 bg-transparent text-3xl leading-none absolute top-0 bottom-0 right-0 left-auto z-10 focus:outline-none"
                                    x-on:click="increment()">+</button>
                            @error('antal') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex flex-col items-center mx-2">
                        <div>Dato:</div>
                        <x-DatePicker wire:model="order.date" class="w-auto px-5 leading-none h-12 rounded text-center" :menu="$menu" />
                    </div>
                    <div class="flex flex-col items-center mx-2">
                        <div>Tidspunkt:</div>
                        <div>
                            <x-TimePicker wire:model="order.time" class="w-24 px-5 leading-none h-12 rounded text-center" />
                        </div>
                    </div>
                    <div class="flex flex-col items-center mx-2">
                        <div>Afhentning/Levering</div>
                        <div>
                            <select x-model="delivery" class="w-auto px-5 leading-none h-12 rounded text-center">
                                <option value=0>Afhentning</option>
                                <option value=1>Levering</option>
                            </select>
                        </div>
                    </div>
                    <button x-show="delivery == 0" wire:click="next()" class="btn btn-primary">Næste</button>
                </div>
                <div class="w-11/12 rounded-xl bg-menu p-4"
                 x-show="delivery == 1">
                <h1 class="text-4xl font-sche font-extrabold">Leverings Oplysninger</h1>
                <div >
                    test 2
                    <button wire:click="next()" class="btn btn-primary">Næste</button>
                </div>
            </div>
            </div>

        </div>
        <div class="w-full lg:w-2/12 h-full bg-red-500">
            <h2 class="text-3xl font-sche font-semibold text-center w-full mt-2">Din bestilling</h2>
            <hr>
            <div class="flex flex-col px-2 py-2">
                @if($menu->title)
                    <p><span class="font-bold">{{ __('Menu') }}:</span> {{ $menu->title }}</p>
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
                @if(!$order->delivery)
                    Afhentes på<br>
                    Det Gamle Posthus<br>
                    Jernbanegade 1,<br>
                    8740 Brædstrup
                @else
                    Leveres til:
                @endif
            </div>
            <hr class="mb-4">
        </div>
    </div>
</main>

@push('bottomscripts')
<script>
    function counter() {
      return {
        increment() {
            if (document.getElementById('antal').value < 50){
                document.getElementById('antal').value++;            }

        },
        decrement() {
            if (document.getElementById('antal').value > {{ $menu->min_couv }}) {
                document.getElementById('antal').value--;
            }
    @error('antal') <span class="text-red-500">{{ $message }}</span> @enderror
        }
      };
    }
  </script>
  @endpush
