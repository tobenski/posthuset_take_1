<input
    x-data
    x-ref="input"
    x-init="new flatpickr($refs.input, {
        enableTime: false,
        dateFormat:'d-m-Y',
        altInput: true,
        altFormat: 'j. F, Y',
        minDate: '{{ \Carbon\Carbon::now()->addDays($menu->days_before)->format('d-m-Y') }}',
        maxDate: '{{ \Carbon\Carbon::now()->addYear()->addDays($menu->days_before)->format('d-m-Y') }}',
        disable: [
            '1/1-2000'
            @foreach($closedDates as $date)
                ,'{{ $date->date->format('d/m/Y') }}'
            @endforeach
            @foreach($closedWeekendDates as $date)
                ,'{{ $date->format('d/m-Y') }}'
            @endforeach
        ],
        locale: 'da',
        weekNumbers: true,
        onChange: function(selectedDates, dateStr, instance) {
            console.log('{{ $menu->slug }}');
        },
    });"
    type="text"
    placeholder='Vælg en Dato'
    {{ $attributes }}
>
@error('{{ $attributes->name }}') <span class="text-red-500">{{ $message }}</span> @enderror

@push('mystyles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('myscripts')
<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/da.js"></script>
@endpush
