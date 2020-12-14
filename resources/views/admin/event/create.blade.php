<x-admin-layout>
    <main class="py-12 w-screen min-h-screen flex items-center justify-center">
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
                <h2 class="text-2xl font-bold">{{ __('Create new Event') }}</h2>
                <form action="{{ route('admin.event.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="grid grid-cols-3 gap-6">
                        <label class="block">
                            <span class="text-gray-700">{{ __('Navn') }}</span>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                value="{{ old('name') }}"
                                name="name"
                                id="name"
                            />
                            @error('timeframe') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Date') }}</span>
                            <input
                                type="date"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                value="{{ old('date') }}"
                                name="date"
                                id="date"
                            />
                            @error('date') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Time') }}</span>
                            <input
                                type="time"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                value="{{ old('time')}}"
                                name="time"
                                id="time"
                            />
                            @error('time') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Duration in minutes') }}</span>
                            <input
                                type="number"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                value="{{ old('duration') }}"
                                name="duration"
                                id="duration"
                            />
                            @error('duration') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <div class="block">
                            <div class="mt-2">
                                <div>
                                    <label class="inline-flex items-center">
                                        <input
                                            type="checkbox"
                                            class="rounded bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500 p-1"
                                            name="online"
                                            id="online"
                                             />
                                        <span class="ml-2">Online</span>
                                    </label>
                                </div>
                                @error('online') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">{{ __('Content 1') }}</span>
                            <textarea class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-left p-1"
                                      name="content"
                                      id="content"
                                      rows="20"
                                      >{{ old('content') }}</textarea>
                            @error('content') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Content 2') }}</span>
                            <textarea class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-left p-1"
                                      name="content2"
                                      id="content2"
                                      rows="20"
                                      >{{ old('content2') }}</textarea>
                            @error('content2') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <div class="flex justify-start">
                            <label class="block">
                                <span class="text-gray-700">{{ __('Image') }}</span>
                                <input
                                    type="file"
                                    class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 p-1"
                                    name="image"
                                    value="{{ old('image') }}"
                                    id="image" />
                                @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                            </label>
                        </div>
                        <div class="block float-right">
                            <input type="submit" value="{{ __('Update') }}" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</x-admin-layout>
