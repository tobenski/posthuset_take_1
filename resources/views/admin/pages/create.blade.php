<x-admin-layout>
    <main class="flex items-center justify-center w-screen h-full">
        <div class="inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-6xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form action="{{ route('admin.pages.store') }}" method="post">
                @csrf
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="">
                        <div class="mb-4">
                            <h3 class="text-gray-800 text-3xl">{{ __('Page Details') }}</h3>
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" placeholder="{{ __('Enter name') }}" value="{{ old('name') }}">
                            @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="online" class="block text-gray-700 text-sm font-bold mb-2">Online:</label>
                            <input type="checkbox" class="form-checkbox h-6 w-6 text-green-500" id="online" name="online" />
                            @error('online') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <h3 class=" text-gray-800 text-2xl">{{ __('SEO') }}</h3>
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('SEO Title') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" placeholder="{{ __('Enter title') }}"  value="{{ old('title') }}">
                            @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('SEO Description') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" placeholder="{{ __('Enter description') }}" value="{{ old('description') }}" >
                            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="keywords" class="block text-gray-700 text-sm font-bold mb-2">{{ __('SEO Keywords') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="keywords" name="keywords" placeholder="{{ __('Enter keywords separeted by comma') }}" value="{{ old('keywords') }}" >
                            @error('keywords') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <h3 class=" text-gray-800 text-2xl">{{ __('Open Graph') }}</h3>
                            <label for="og_title" class="block text-gray-700 text-sm font-bold mb-2">{{ __('OG Title') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="og_title" name="og_title" placeholder="{{ __('Enter title') }}" value="{{ old('og_title') }}">
                            @error('og_title') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="og_description" class="block text-gray-700 text-sm font-bold mb-2">{{ __('OG Description') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="og_description" name="og_description" placeholder="{{ __('Enter description') }}" value="{{ old('og_description') }}" >
                            @error('og_description') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="og_url" class="block text-gray-700 text-sm font-bold mb-2">{{ __('OG URL') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="og_url" name="og_url" placeholder="{{ __('Enter url') }}" value="{{ old('og_url') }}">
                            @error('og_url') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="og_type" class="block text-gray-700 text-sm font-bold mb-2">{{ __('OG Type') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="og_type" name="og_type" placeholder="{{ __('Enter type') }}" value="website">
                            @error('og_type') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="og_image" class="block text-gray-700 text-sm font-bold mb-2">{{ __('OG Image') }}:</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="og_image" name="og_image" placeholder="{{ __('Enter Iamge url') }}" value="{{ old('og_image') }}">
                            @error('og_image') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <a href="{{ route('admin.pages.index') }}" class="btn btn-red">Tilbage</a>
                            <button type="submit" class="btn btn-primary">Gem</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>


</x-admin-layout>
