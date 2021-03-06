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
                               id="first-day"
                               type="date">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Last Day') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               id="lastday"
                               type="date">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Timeframe') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               id="first-day"
                               type="text">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Comment') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               id="first-day"
                               type="text">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-day">
                            {{ __('Image URL') }}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                               id="first-day"
                               type="text">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <label class="md:w-2/3 block text-gray-500 font-bold">
                        <input class="mr-2 leading-tight outline-black" type="checkbox">
                        <span class="text-sm">
                        Online
                        </span>
                    </label>
                </div>
                <table class="w-full table table-fixed">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Content') }}</th>
                            <th>{{ __('Price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="text"></td>
                            <td><textarea></textarea></td>
                            <td><input type="number"></td>
                        </tr>
                        @for($i = 0; $i < 10; $i++)
                            <tr>
                                <td><input type="text" value="Name: {{ $i  }}"></td>
                                <td><textarea>Content {{ $i  }}</textarea></td>
                                <td><input type="number" value="{{ $i  }}"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </form>
        </div>

    </div>
</div>

