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

            <table class="w-full table-fixed">
                <thead>
                    <tr class="bg-gray-300">
                        <th class="px-4 py-2 border-2 border-black">{{ __('Date') }}</th>
                        <th class="px-4 py-2 border-2 border-black w-24">{{ __('Closed') }}</th>
                        <th class="px-4 py-2 border-2 border-black w-32">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-black border-b-4">
                        <form method="POST" action="{{ route('admin.calendar.store') }}">
                            @csrf
                            <td class="border px-4 py-2">
                                <input type="date" id="date" name="date" value="{{ old('date') }}" placeholder="Choose Date">
                            </td>
                            <td class="border px-4 py-2">
                                <input type="checkbox" checked id="closed" name="closed"
                                    class="rounded bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500" />
                            </td>
                            <td class="border px-4 py-2">
                                <input type="submit" class="btn btn-blue" value="{{ __('Opret') }}">
                            </td>
                        </form>
                    </tr>
                    @foreach($dates as $date)
                        <tr>
                            <td class="border px-4 py-2">{{ Carbon\Carbon::parse($date->date)->locale('da_DK')->isoFormat('dddd [d.] Do MMM YYYY') }}</td>
                            <td class="border px-4 py-2">
                                <input type="checkbox" @if($date->closed) checked @endif onclick="return false;"
                                    class="rounded bg-gray-200 border-transparent focus:border-transparent focus:bg-gray-200 text-gray-700 focus:ring-1 focus:ring-offset-2 focus:ring-gray-500" />
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex h-full">
                                    <form method="POST" action="{{ route('admin.calendar.destroy', $date) }}" class="">
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
