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
                <h2 class="text-2xl font-bold">{{ __('Update box') }}</h2>
                <form action="{{ route('admin.homebox.update', $box) }}" method="POST" >
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-1 gap-6">
                        <label class="block">
                            <span class="text-gray-700">{{ __('Title') }}</span>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="{{ __('Enter Title') }}"
                                value="{{ $box->title }}"
                                name="title"
                                id="title"
                            />
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Content') }}</span>
                            <textarea
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                rows="10"
                                id="content"
                                name="content"
                                placeholder="{{ __('Enter Content') }}">{{ $box->content }}</textarea>
                                @error('content') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Button') }}</span>
                            <input
                                type="text"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="{{ __('Enter Button Text') }}"
                                value="{{ $box->button }}"
                                name="button"
                                id="button"
                            />
                            @error('button') <span class="text-red-500">{{ $message }}</span>@enderror
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
                                            @if($box->online) checked @endif />
                                        <span class="ml-2">Online</span>
                                    </label>
                                </div>
                                @error('online') <span class="text-red-500">{{ $message }}</span>@enderror
                            </div>
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
