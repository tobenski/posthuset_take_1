<div class="flex align-center flex-col hover:shadow">
    <div class="flex justify-between w-full px-5 py-3 ">
        <a href="{{ $menu->url }}" class="hover:font-semibold">
            {{ $menu->text }}
        </a>
        @if(count($menu->children) != 0)
            <div @click="selected !== {{ $menu->order }} ? selected = {{ $menu->order }} : selected = null"
                class="cursor-pointer text-navigation-text text-center inline-block hover:opacity-75 hover:shadow hover:-mb-3">
                <i class="fas fa-caret-down"></i>
            </div>
        </div>
        @foreach($menu->children as $child)

        <div x-show="selected == {{ $menu->order }}"
            x-transition:enter="transition ease-out duration-1000 -ml-64"
            x-transition:enter-start="transform translate-x-0"
            x-transition:enter-end="transform translate-x-64 ml-0"
            x-transition:leave="transition ease-in duration-1000 ml-0"
            x-transition:leave-start="transform translate-x-0"
            x-transition:leave-end="transform -translate-x-full"
            class="pl-8 py-3">
            <a href="{{ $child->url }}" class="hover:font-semibold">
                {{ $child->text }}
            </a>
        </div>
        @endforeach
        @else
        </div>
        @endif
</div>
<!-- https://codepen.io/allmanaj/pen/dyPqOxo -->
