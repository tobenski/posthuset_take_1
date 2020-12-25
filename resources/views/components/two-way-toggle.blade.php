<!-- Toggle Button -->
<label for="toogleA" id="toggle__label" class="flex items-center cursor-pointer">
    <div class="mr-3 text-gray-700 font-medium">
        {{ $leftLabel }}
    </div>
    <!-- toggle -->
    <div class="relative">
        <!-- input -->
        <input id="toogleA" type="checkbox" class="hidden" {{ $attributes }}/>
        <!-- line -->
        <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
        <!-- dot -->
        <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
    </div>
    <!-- label -->
    <div class="ml-3 text-gray-700 font-medium">
        {{ $rightLabel }}
    </div>
</label>

@push('mystyles')
    <style>
        .toggle__dot {
            top: -.25rem;
            left: -.25rem;
            transition: all 0.3s ease-in-out;
        }

        input:checked ~ .toggle__dot {
            transform: translateX(100%);
            /*background-color: #48bb78;*/
        }

        input:checked ~ #toggle__label {
            font-weight: 900;
        }

</style>
@endpush
