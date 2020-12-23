<div class="md:flex md:items-center mb-6 max-w-sm">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="email">
        Email
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
        wire:model="email" type="email" placeholder="Email adresse">
    </div>
</div>
<div class="md:flex md:items-center mb-6 max-w-sm">
    <div class="md:w-1/3">
        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="password">
        Password
        </label>
    </div>
    <div class="md:w-2/3">
        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                wire:model="password" type="password" placeholder="******************">
    </div>
</div>
<div class="md:flex md:items-center mb-6 max-w-sm">
    <div class="md:w-1/3"></div>
    <label class="md:w-2/3 block text-gray-500 font-bold">
        <input class="mr-2 leading-tight" type="checkbox" wire:model="remember">
        <span class="text-sm">
        Husk Mig!
        </span>
    </label>
</div>
<div class="md:flex md:items-center">
    <div class="md:w-1/3"></div>
    <div class="md:w-2/3">
        <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                type="button"
                wire:click='login()'>
        Log Ind
        </button>
    </div>
</div>
@if (session()->has('login'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
    <div class="flex">
        <div>
        <p class="text-sm text-red-500 italic">{{ session('login') }}</p>
        </div>
    </div>
    </div>
@endif
