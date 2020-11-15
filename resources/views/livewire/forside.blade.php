<main x-data="{ counter: 0 }"
    class="w-full"
    x-init="setInterval(() => {
        if(counter == {{ count($slides)-1 }})
        {
            counter = 0;
        }
        else {
            counter++;
        }
    }, 5000);"
    >
    @foreach($slides as $key => $slide)
        <div style="background-image: url({{ $slide->image }})"
            class="min-h-screen bg-gray-100 flex items-center justify-center w-full bg-cover bg-center"
            x-show="counter == {{ $key }}"
            x-transition:enter="transition ease-out duration-1000"
            x-transition:enter-start="opacity-0 transform translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-1000"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full"
        >
            {{ $slide->title }}
        </div>
    @endforeach
</main>
