<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                @if (session()->has('message'))
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                      <div class="flex">
                        <div>
                          <p class="text-sm">{{ session('message') }}</p>
                        </div>
                      </div>
                    </div>
                @endif
                <a href="{{ route('admin.pages.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">{{ __('Opret ny Side') }}</a>
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">#</th>
                            <th class="px-4 py-2">{{ __('Name') }}</th>
                            <th class="px-4 py-2 w-20">{{ __('Online') }}</th>
                            <th class="px-4 py-2">{{ __('Slug') }}</th>
                            <th class="px-4 py-2">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pages as $page)
                        <tr>
                            <td class="border px-4 py-2">{{ $page->id }}</td>
                            <td class="border px-4 py-2">{{ $page->name }}</td>
                            <td class="border px-4 py-2">
                                <input type="checkbox" @if($page->online) checked @endif onclick="return false;" />
                            </td>
                            <td class="border px-4 py-2">{{ $page->slug }}</td>

                            <td class="border px-4 py-2">
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-primary">Edit</button>
                                <a href="{{ route('admin.pages.destroy', $page) }}" class="btn btn-red">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
