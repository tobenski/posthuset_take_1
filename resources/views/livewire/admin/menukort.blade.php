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
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Opret nyt Menukort</button>
            @if($isOpen)
                @include('livewire.admin.menukort.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">#</th>
                        <th class="px-4 py-2">Første Dag</th>
                        <th class="px-4 py-2">Sidste Dag</th>
                        <th class="px-4 py-2">Content</th>
                        <th class="px-2 py-2 w-12">Online</th>
                        <th class="px-2 py-2">Type</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menucards as $card)
                    <tr>
                        <td class="border px-4 py-2">{{ $card->id }}</td>
                        <td class="border px-4 py-2">{{ $card->first_day->format('d/m - Y') }}</td>
                        <td class="border px-4 py-2">{{ $card->last_day->format('d/m - Y') }}</td>
                        <td class="border px-4 py-2">
                            {{ substr($card->content, 0, 50) }}
                        </td>
                        <td class="border px-4 py-2">
                            <input type="checkbox" @if($card->online) checked @endif readonly />
                        </td>
                        <td class="border px-4 py-2">
                            {{ $card->menuType->name }}
                        </td>
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $card->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $card->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
