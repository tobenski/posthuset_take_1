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
            @include('livewire.admin.frokost.create')
        @endif
        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">#</th>
                    <th class="px-4 py-2">{{ __('First Day') }}</th>
                    <th class="px-4 py-2">{{ __('Last Day') }}</th>
                    <th class="px-4 py-2">{{ __('Timeframe') }}</th>
                    <th class="px-4 py-2">{{ __('Comment') }}</th>
                    <th class="px-2 py-2 w-12">{{ __('Online') }}</th>
                    <th class="px-2 py-2">{{ __('Image') }}</th>
                    <th class="px-4 py-2">{{ __('Courses') }}</th>
                    <th class="px-4 py-2">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($frokostmenuer as $menu)
                <tr>
                    <td class="border px-4 py-2">{{ $menu->id }}</td>
                    <td class="border px-4 py-2">{{ $menu->first_day->format('d/m - Y') }}</td>
                    <td class="border px-4 py-2">{{ $menu->last_day->format('d/m - Y') }}</td>
                    <td class="border px-4 py-2">
                        {{ substr($menu->timeframe, 0, 50) }}
                    </td>
                    <td class="border px-4 py-2">
                        <input type="checkbox" @if($menu->online) checked @endif readonly />
                    </td>
                    <td class="border px-4 py-2">{{ $menu->image }}</td>
                    <td class="border px-4 py-2">{{ count($menu->retter) }}</td>
                    <td class="border px-4 py-2">
                        <button wire:click="edit({{ $menu->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Edit') }}</button>
                        <button wire:click="delete({{ $menu->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Delete') }}</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
