<div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
        @if($isOpen)
            @include('livewire.admin.frokost.edit')
        @endif
        <table class="table-fixed w-full text-center">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">#</th>
                    <th class="px-4 py-2 w-48">{{ __('First Day') }}</th>
                    <th class="px-4 py-2 w-48">{{ __('Last Day') }}</th>
                    <th class="px-4 py-2">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                <form>
                    <tr>
                        <td class="border px-1 py-2">#</td>
                    <td class="border px-1 py-2">
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-1 px-1 mb-3 leading-tight focus:outline-none focus:bg-white"
                               id="firstday"
                               type="date"
                               wire:model="firstday">
                    </td><!-- lav rød kan og error tekst kun ved error -->
                    <td class="border px-1 py-2">
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-1 px-1 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="lastday"
                            type="date"
                            wire:model="lastday">
                    </td>
                    <td class="border px-4 py-2">
                        <button wire:click="create()" class="bg-green-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">{{ __('Create new Frokost Menu') }}</button>
                    </td>
                    </tr>
                </form>
                @foreach($frokostmenuer as $menu)
                <tr>
                    <td class="border px-4 py-2">{{ $menu->id }}</td>
                    <td class="border px-4 py-2">{{ Carbon\Carbon::parse($menu->firstday)->locale('da_DK')->isoFormat('ddd [d.] Do MMM YY') }}</td>
                    <td class="border px-4 py-2">{{ Carbon\Carbon::parse($menu->lastday)->locale('da_DK')->isoFormat('ddd [d.] Do MMM YY') }}</td> <!-- kan jeg tilføj euge dag til datoen -->
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
