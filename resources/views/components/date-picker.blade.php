<input
    x-data
    x-ref="input"
    x-init="new Datepicker($refs.input, {
        autohide: true,
        calendarWeeks:true,
        language: 'da',
        maxView: 2,
        format: 'd/m-yyyy',
        minDate: '{{ \Carbon\Carbon::now()->addDays($menu->days_before)->format('d/m-Y') }}',
        maxDate: '{{ \Carbon\Carbon::now()->addYear()->addDays($menu->days_before)->format('d/m-Y') }}',
        defaultViewDate: '{{ \Carbon\Carbon::now()->addDays($menu->days_before)->format('d/m-Y') }}',
        datesDisabled: [
            '1/1-2000'
            @foreach($closedDates as $date)
                ,'{{ $date->date->format('d/m-Y') }}'
            @endforeach
            @foreach($closedWeekendDates as $date)
                ,'{{ $date->format('d/m-Y') }}'
            @endforeach
        ]
      })"
    type="text"
    placeholder='Vælg en Dato'
    {{ $attributes }}
>
@error('{{ $attributes->name }}') <span class="text-red-500">{{ $message }}</span> @enderror

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.0/dist/css/datepicker.min.css">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.0/dist/js/datepicker-full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.0/dist/js/locales/da.js"></script>
@endsection
