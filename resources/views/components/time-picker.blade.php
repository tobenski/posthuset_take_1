<input
    x-data
    x-ref="time"
    x-init="new flatpickr($refs.time, {
        enableTime: true,
        noCalendar: true,
        dateFormat: 'H:i',
        time_24hr: true,
        locale: 'da',
        minuteIncrement: 15,
        minTime: '11.30',
        maxTime: '19.00',
    });"
    type="text"
    placeholder='Tid'
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
