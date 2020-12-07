<x-admin-layout>
    <main class="py-12 w-screen h-screen overflow-y-scroll flex items-center justify-center">
        <div class="flex flex-col w-10/12 min-h-full">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                    <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
                </div>
            @endif
            <div>
                <h2 class="text-2xl font-bold">{{ __('Create new Eftermiddagsmenu') }}</h2>
                <form action="{{ route('admin.eftermiddagsMenu.store') }}" method="POST" >
                    @csrf
                    <div class="grid grid-cols-3 gap-6">
                        <label class="block">
                            <span class="text-gray-700">{{ __('Firstday') }}</span>
                            <input
                                type="date"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="{{ __('Firstday') }}"
                                value="{{ old('firstday') }}"
                                name="firstday"
                                id="firstday"
                            />
                            @error('firstday') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Lastday') }}</span>
                            <input
                                type="date"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="{{ __('Lastday') }}"
                                value="{{ old('lastday') }}"
                                name="lastday"
                                id="lastday"
                            />
                            @error('lastday') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="checkbox"
                                            class="rounded bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500"
                                            name="online"
                                            id="online"
                                            @if(old('online')) checked @endif />
                                        <span class="ml-2">Online</span>
                                    </label>
                                </div>
                                @error('online') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">{{ __('Timeframe') }}</span>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="{{ __('Enter Timeframe') }}"
                                value="{{ old('timeframe') ? old('timeframe') :  'Serveres mellem 11.30 & 14.30' }}"
                                name="timeframe"
                                id="timeframe"
                            />
                            @error('timeframe') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Comment') }}</span>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="{{ __('Enter Comment') }}"
                                value="{{ old('comment') }}"
                                name="comment"
                                id="comment"
                            />
                            @error('commennt') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <div class="block float-right">
                            <input type="submit" value="{{ __('Create') }}" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-admin-layout>
