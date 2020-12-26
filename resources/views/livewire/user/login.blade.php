
<form wire:submit.prevent='login()'>
    <div class="flex items-center justify-center w-full mb-6">
        <h2 class="uppercase font-bold mr-6">Eksisterende bruger</h2>
        <div class="mb-6 mr-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                Email
            </label>
            <input class="shadow appearance-none @error('email') border border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" wire:model="email">
            @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>
        <div class="mb-6 mr-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
              Password
            </label>
            <input class="shadow appearance-none @error('password') border border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" wire:model="password" placeholder="******************">
            @error('password') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
        </div>
        <div class="mb-6">
            <input type="submit" value="Log ind" class="btn btn-primary">
        </div>
    </div>

</form>
