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
                <h2 class="text-2xl font-bold">{{ __('Edit Anbefalermenu') }}</h2>
                <form action="{{ route('admin.anbefalerMenu.update', $anbefalerMenu) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('put')
                    <div class="grid grid-cols-3 gap-6">
                        <label class="block">
                            <span class="text-gray-700">{{ __('Firstday') }}</span>
                            <input
                                type="date"
                                class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                placeholder="{{ __('Firstday') }}"
                                value="{{ $anbefalerMenu->firstday }}"
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
                                value="{{ $anbefalerMenu->lastday  }}"
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
                                            @if($anbefalerMenu->online) checked @endif />
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
                                value="{{ $anbefalerMenu->timeframe }}"
                                name="timeframe"
                                id="timeframe"
                            />
                            @error('timeframe') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <label class="block">
                            <span class="text-gray-700">{{ __('Comment') }}</span>
                            <textarea class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-left"
                                      name="comment"
                                      id="comment"
                                      rows="10">
                                    {{ $anbefalerMenu->comment }}
                            </textarea>
                            @error('commennt') <span class="text-red-500">{{ $message }}</span>@enderror
                        </label>
                        <div class="flex justify-start">
                            @if($anbefalerMenu->getFirstMedia('menu'))
                                {{ $anbefalerMenu->getFirstMedia('menu')->img()->attributes(['class' => 'w-36 m-6']) }}
                            @endif
                            <label class="block">
                                <span class="text-gray-700">{{ __('Image') }}</span>
                                <input
                                    type="file"
                                    class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                    value="{{ $anbefalerMenu->image }}"
                                    name="image"
                                    id="image"
                                />
                                @error('image') <span class="text-red-500">{{ $message }}</span>@enderror
                            </label>
                        </div>
                        <div class="block float-right">
                            <input type="submit" value="{{ __('Update') }}" class="btn btn-primary" />
                        </div>
                    </div>
                </form>

                <table class="w-full table-fixed mt-4 mb-12">
                    <thead>
                        <tr class="bg-gray-300">
                            <th class="px-4 py-2 w-32 border-2 border-black">Order</th>
                            <th class="px-4 py-2 border-2 border-black">{{ __('Name') }}</th>
                            <th class="px-4 py-2 border-2 border-black">{{ __('Content') }}</th>
                            <th class="px-4 py-2 border-2 border-black">{{ __('Price') }}</th>
                            <th class="px-4 py-2 border-2 border-black">{{ __('Menu Type') }}</th>
                            <th class="px-4 py-2 border-2 border-black">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <form action="{{ route('admin.anbefalerMenu.anbefalerDish.store', $anbefalerMenu) }}" method="POST">
                                @csrf
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <input
                                        type="number"
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Order') }}"
                                        value="{{ old('order') }}"
                                        name="order"
                                        id="order"
                                    />
                                </td>
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <input
                                        type="text"
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Enter Name') }}"
                                        value="{{ old('name') }}"
                                        name="name"
                                        id="name"
                                    />
                                </td>
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <textarea
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Enter Content') }}"
                                        name="content"
                                        id="content"
                                    >{{ old('content') }}</textarea>
                                </td>
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <input
                                        type="number"
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Enter Price') }}"
                                        value="{{ old('price') }}"
                                        name="price"
                                        id="price"
                                    />
                                </td>
                                <td class="px-4 py-2 border-2 botder-gray-600">
                                    <div class="flex h-full">
                                        <button class="btn btn-primary mr-2">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @foreach($anbefalerMenu->retter as $ret)
                        <tr>
                            <form action="{{ route('admin.lunchDish.update', $ret) }}" method="POST">
                                @csrf
                                @method('put')
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <input
                                        type="number"
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Order') }}"
                                        value="{{ $ret->order }}"
                                        name="order"
                                        id="order"
                                    />
                                </td>
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <input
                                        type="text"
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Enter Name') }}"
                                        value="{{ $ret->name }}"
                                        name="name"
                                        id="name"
                                    />
                                </td>
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <textarea
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Enter Content') }}"
                                        name="content"
                                        id="content"
                                    >{{ $ret->content }}</textarea>
                                </td>
                                <td class="px-4 py-2 border-2 border-gray-600">
                                    <input
                                        type="number"
                                        class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0"
                                        placeholder="{{ __('Enter Price') }}"
                                        value="{{ $ret->price }}"
                                        name="price"
                                        id="price"
                                    />
                                </td>
                                <td class="px-4 py-2 border-2 botder-gray-600">
                                    <div class="flex h-full">
                                        <div class="flex h-full">
                                            <button type="submit" class="btn btn-primary mr-2">{{ __('Save') }}</button>
                                        </div>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</x-admin-layout>
