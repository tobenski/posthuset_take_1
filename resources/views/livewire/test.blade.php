@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
@endsection

<main>
    <form wire:submit.prevent="schedule">
        <label for="title">Event Title</label>
        <input wire:model="title" id="title" type="text">

        <label for="date">Event Date</label>
        <x-date-picker wire:model="date" id="date"/>

        <button>Schedule Event</button>
    </form>
</main>
