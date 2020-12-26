<div class="w-full rounded-xl bg-menu p-4 mb-6 border border-black">
    <h1 class="text-4xl font-sche font-extrabold uppercase cursor-pointer" wire:click='gotoStep(1)' >Tjek Bestilling</h1>
    <div x-show="currentStep === 1" class="flex flex-col">
        <form wire:submit.prevent="submitStepOne()">
            @csrf
            <div class="flex flex-col lg:flex-row justify-between">
                <div class="flex flex-col items-center mx-2">
                    <div>Antal:</div>
                    <div class="relative h-12 mx-2 @error('order.count') border-2 border-red-500 @enderror">
                        <button type="button"
                        class="block w-8 pb-1 rounded-sm border-0 bg-transparent text-3xl leading-none absolute top-0 bottom-0 left-0 z-10 h-full focus:outline-none"
                        wire:click="decrement()">-</button>
                        <input class="text-center align-middle px-5 leading-none w-full h-full rounded"
                        wire:model="order.count"
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
                        wire:click="increment()">+</button>
                        @error('order.count') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror

                    </div>
                </div>
                <div class="flex flex-col items-center mx-2">
                    <div>Dato:</div>
                    <x-DatePicker wire:model="order.date" class="w-auto px-5 leading-none h-12 rounded text-center" :menu="$menu" />
                    @error('order.date') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                </div>
                <div class="flex flex-col items-center mx-2">
                    <div>Tidspunkt:</div>
                    <div>
                        <x-TimePicker wire:model="order.time" class="w-24 px-5 leading-none h-12 rounded text-center" />
                        @error('order.time')<span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="flex flex-col items-center justify-end mx-2 py-3">
                    <x-TwoWayToggle leftLabel="Afhentning" rightLabel="Levering" wire:model='order.delivery' class="" />
                </div>
            </div>
            <div class="flex flex-col lg:justify-between mt-4"
                x-show="delivery == 1 && currentStep == 1">
                <h1 class="text-4xl font-sche font-extrabold uppercase">Leverings Oplysninger</h1>
                <div class="w-full flex flex-col lg:flex-row justify-between items-start">
                    <div class="flex flex-col items-center mx-2 w-1/5">
                        <div>Navn/Firma:</div>
                        <div>
                            <input type="text" wire:model.lazy="order.delivery_name"
                            class="@error('order.delivery_name') border-red-500 border-2 @enderror
                            w-full px-5 leading-none h-12 rounded" />
                            @error('order.delivery_name') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-col items-center mx-2 w-1/5">
                        <div>Leverings Adresse:</div>
                        <div>
                            <input type="text" wire:model.lazy="order.delivery_address"
                            class="@error('order.delivery_address') border-red-500 border-2 @enderror
                            w-full px-5 leading-none h-12 rounded" />
                            @error('order.delivery_address') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-col items-center mx-2 w-1/5">
                        <div>Postnummer:</div>
                        <div>
                            <input type="tel" wire:model.lazy="order.delivery_zip"
                            class="@error('order.delivery_zip') border-2 border-red-500 @enderror w-full px-5 leading-none h-12 rounded" />
                            @error('order.delivery_zip')<span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="flex flex-col items-center mx-2 w-1/5">
                        <div>Kontakt Telefon:</div>
                        <div>
                            <input type="tel" wire:model.lazy="order.contact_phone"
                            class="@error('order.contact_phone') border-2 border-red-500 @enderror w-full px-5 leading-none h-12 rounded" />
                            @error('order.contact_phone')<span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-end justify-end mt-4">
                <button type="submit" class="btn btn-primary">
                    @auth
                        Føj Bestillingen til kurv
                    @else
                        Fortsæt
                    @endauth
                </button>
            </div>
        </form>
    </div>
</div>
