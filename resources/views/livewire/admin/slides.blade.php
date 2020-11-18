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
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Opret ny Slide</button>
            @if($isOpen)
                @include('livewire.admin.slides.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">#</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Page</th>
                        <th class="px-4 py-2">Duration</th>
                        <th class="px-4 py-2">Content</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slides as $slide)
                    <tr>
                        <td class="border px-4 py-2">{{ $slide->id }}</td>
                        <td class="border px-4 py-2">{{ $slide->title }}</td>
                        <td class="border px-4 py-2">{{ $slide->page }}</td>
                        <td class="border px-4 py-2">
                            {{ $slide->duration ? $slide->duration : 'default' }}</td>
                        <td class="border px-4 py-2">
                            {{ substr($slide->content, 0, 50) }}
                        </td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $slide->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $slide->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
