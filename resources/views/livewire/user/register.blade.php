<div class="flex items-center justify-center w-full mb-6">
    <div class="flex flex-row items-center mx-2 w-1/2">
        <div class="w-1/3 text-right pr-2">Fornavn:</div>
        <div class="w-2/3 pl-2">
            <input type="text" wire:model.lazy="user.name"
            class="@error('user.name') border-red-500 border-2 @enderror
            w-full px-5 leading-none h-12 rounded" />
            @error('user.name') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
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
            <input type="tel" wire:model.lazy="user.cvr"
            class="@error('user.cvr') border-red-500 border-2 @enderror
            w-full px-5 leading-none h-12 rounded" />
            @error('user.cvr') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
        </div>
    </div>
</div>
<div class="flex items-center justify-center w-full mb-6">
    <div class="flex flex-row items-center mx-2 w-1/2">
        <div class="w-1/3 text-right pr-2">Email:</div>
        <div class="w-2/3 pl-2">
            <input type="email" wire:model.lazy="user.email"
            class="@error('user.email') border-red-500 border-2 @enderror
            w-full px-5 leading-none h-12 rounded" />
            @error('user.email') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
        </div>
    </div>
    <div class="flex items-center mx-2 w-1/2">
        <div class="w-1/3 text-right pr-2">Telefon:</div>
        <div class="w-2/3 pl-2">
            <input type="tel" wire:model.lazy="user.phone"
            class="@error('user.phone') border-red-500 border-2 @enderror
            w-full px-5 leading-none h-12 rounded" />
            @error('user.phone') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
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
        <div class="flex items-center mx-2 w-1/2">
            <div class="w-1/3 text-right pr-2">Post nr:</div>
            <div class="w-2/3 pl-2">
                <input type="tel" wire:model.lazy="user.zip"
                class="@error('user.zip') border-red-500 border-2 @enderror
                w-full px-5 leading-none h-12 rounded" />
                @error('user.zip') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="flex items-center mx-2 w-1/2">
            <div class="w-1/3 text-right pr-2">By:</div>
            <div class="w-2/3 pl-2">
                <input type="tel" wire:model.lazy="user.city"
                class="@error('user.city') border-red-500 border-2 @enderror
                w-full px-5 leading-none h-12 rounded" />
                @error('user.city') <span class="text-xs text-red-500 italic">{{ $message }}</span>@enderror
            </div>
        </div>
    </div>
</div>
<div class="flex flex-col items-end justify-end mt-4">
    <button wire:click="submitStepTwo()" class="btn btn-primary">Føj bestillingen til kurv</button>
</div>
