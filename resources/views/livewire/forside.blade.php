<main class="flex flex-col items-center justify-start min-h-screen min-w-full">
    <x-swipers.home />
    <livewire:inc.header />

    <section class="w-full content py-6"
        id="content"
        x-ref="content"
        x-data="{ sticky: false }"
        x-on:header-sticky.window="sticky = $event.detail"
        x-bind:class="{ 'lg:pt-32': sticky, 'pt-64': sticky }">

        {!! $page->content !!}

    </section>


</main>


