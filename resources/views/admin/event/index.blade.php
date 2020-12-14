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
            <div class="mb-4">
                <a href="{{ route('admin.event.create') }}" class="btn btn-primary">{{ __('Opret Nyt Event') }}</a>
            </div>

            <table class="w-full table-fixed">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="px-4 py-2 border-2 border-black">{{ __('Name') }}</th>
                        <th class="px-4 py-2 border-2 border-black">{{ __('Date') }}</th>
                        <th class="px-4 py-2 border-2 border-black">{{ __('Time') }}</th>
                        <th class="px-4 py-2 w-20 border-2 border-black">{{ __('Online') }}</th>
                        <th class="px-4 py-2 border-2 border-black">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td class="border px-4 py-2">{{ $event->name }}</td>
                            <td class="border px-4 py-2">{{ Carbon\Carbon::parse($event->date)->locale('da_DK')->isoFormat('ddd [d.] Do MMM YY') }}</td>
                            <td class="border px-4 py-2">{{ Carbon\Carbon::parse($event->time)->locale('da_DK')->isoFormat('H:mm') }}</td>
                            <td class="border px-4 py-2">
                                <input type="checkbox" @if($event->online) checked @endif onclick="return false;"
                                    class="rounded bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500" />
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex h-full">
                                    <a href="{{ route('admin.event.edit', $event) }}" class="btn btn-primary mr-2">{{ __('Edit') }}</a>
                                    <form method="POST" action="{{ route('admin.event.destroy', $event) }}" class="">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-red delete-box" value="{{ __('Delete') }}">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <script>
        $('.delete-box').click(function(e){
            e.preventDefault() // Don't post the form, unless confirmed
            if (confirm('Are you sure?')) {
                // Post the form
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
</x-admin-layout>
