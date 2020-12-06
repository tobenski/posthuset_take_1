<div class="fixed inset-0 transition-opacity">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
</div>
<div class="fixed z-10 inset-0 ease-out duration-400 overflow-auto">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
        <div class="flex w-full align-bottom bg-white rouded-lg shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3/4 p-4">
            <form class="w-full">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('First Day') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               wire:model='frokostmenu.firstday'
                               type="date">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Last Day') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               wire:model='frokostmenu.lastday'
                               type="date">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Timeframe') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               type="text"
                               wire:model="frokostmenu.timeframe">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Comment') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               wire:model='frokostmenu.comment'
                               type="text">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Image URL') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               wire:model='frokostmenu.image'
                               type="text">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        <input class="mr-2 leading-tight outline-black" type="checkbox" wire:model='frokostmenu.online'>
                        <span class="text-sm">
                        Online
                        </span>
                    </label>
                </div>
                <table class="w-full table-fixed text-center">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 w-60   ">{{ __('Name') }}</th>
                            <th class="px-4 py-2">{{ __('Content') }}</th>
                            <th class="px-4 py-2 w-20">{{ __('Price') }}</th>
                            <th class="px-4 py-2 w-32">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form>
                            <tr class=" align-top">
                                <td class="border px-1 py-2">
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-1 px-1 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="firstday"
                                type="text"
                                wire:model="name">
                                </td>
                                <td class="border px-1 py-2">
                                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-1 px-1 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        rows="5"
                                        wire:model='content'>
                                    </textarea>
                                </td>
                                <td class="border px-1 py-2">
                                    <input type="number"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-1 px-1 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    wire:model='price'>
                                </td>
                                <td class="border px-4 py-2">
                                    <button wire:click="createRet()" class="bg-green-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Create') }}</button>
                                </td>
                            </tr>
                        </form>

                        @foreach($frokostmenu->retter as $ret)
                            <tr>
                                <td><input type="text" value="{{ $ret->name }}"></td>
                                <td><textarea>Content {{ $ret->content  }}</textarea></td>
                                <td><input type="number" value="{{ $ret->price  }}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>

    </div>
</div>

