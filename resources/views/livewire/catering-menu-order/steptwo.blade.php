<div class="w-full rounded-xl bg-menu p-4 mb-6 border border-black">
    <h1 class="text-4xl font-sche font-extrabold uppercase cursor-pointer" wire:click='gotoStep(2)'>Kontakt Information</h1>
    <div x-show="currentStep === 2" class="flex flex-col">
        <div class="flex items-center justify-center w-full mb-6">
            <div class="flex flex-row items-center mx-2 w-1/2">
                <div class="w-1/3 text-right pr-2">Fornavn:</div>
                <div class="w-2/3 pl-2">
                    <input type="text" wire:model.lazy="user.firstname"
                    class="@error('user.firstname') border-red-500 border-2 @enderror
                    w-full px-5 leading-none h-12 rounded" />
                    @error('user.firstname') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="flex items-center mx-2 w-1/2">
                <div class="w-1/3 text-right pr-2">Efternavn:</div>
                <div class="w-2/3 pl-2">
                    <input type="text" wire:model.lazy="user.lastname"
                    class="@error('user.lastname') border-red-500 border-2 @enderror
                    w-full px-5 leading-none h-12 rounded" />
                    @error('user.lastname') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center w-full mb-6">
            <div class="flex flex-row items-center mx-2 w-1/2">
                <div class="w-1/3 text-right pr-2">Evt. Firma:</div>
                <div class="w-2/3 pl-2">
                    <input type="text" wire:model.lazy="user.company"
                    class="@error('user.company') border-red-500 border-2 @enderror
                    w-full px-5 leading-none h-12 rounded" />
                    @error('user.company') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="flex items-center mx-2 w-1/2">
                <div class="w-1/3 text-right pr-2">CVR:</div>
                <div class="w-2/3 pl-2">
                    <input type="text" wire:model.lazy="user.cvr"
                    class="@error('user.cvr') border-red-500 border-2 @enderror
                    w-full px-5 leading-none h-12 rounded" />
                    @error('user.cvr') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center w-full mb-6">
            <div class="flex flex-row items-center mx-2 w-1/2">
                <div class="w-1/3 text-right pr-2">Adresse:</div>
                <div class="w-2/3 pl-2">
                    <input type="text" wire:model.lazy="user.address"
                    class="@error('user.address') border-red-500 border-2 @enderror
                    w-full px-5 leading-none h-12 rounded" />
                    @error('user.address') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="flex items-center mx-2 w-1/2">
                <div class="w-1/3 text-right pr-2">Postnummer:</div>
                <div class="w-2/3 pl-2">
                    <input type="tel" wire:model.lazy="user.zip"
                    class="@error('user.zip') border-red-500 border-2 @enderror
                    w-full px-5 leading-none h-12 rounded" />
                    @error('user.zip') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="flex flex-col items-end justify-end mt-4">
            <button wire:click="next()" class="btn btn-primary">Føj bestillingen til kurv</button>
        </div>
    </div>
</div>
