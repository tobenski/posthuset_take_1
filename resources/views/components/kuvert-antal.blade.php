<div class="relative h-12 mx-2" x-data="counter()">
    <button type="button"
            class="block w-8 pb-1 rounded-sm border-0 bg-transparent text-3xl leading-none absolute top-0 bottom-0 left-0 z-10 h-full focus:outline-none"
            x-on:click="decrement()">-</button>
    <input class="text-center align-middle px-5 leading-none w-full h-full rounded"
     name="antal"
     id="antal"
     type="tel"
     autocomplete="off"
     value="{{ $value }}"
     step="1"
     min="{{ $min }}"
     max="{{ $max }}">
    <span class="absolute right-10 transform translate-y-1/2 text-black">
         {{ __('Kuverter') }}
    </span>
    <button type="button"
            class="block w-8 pb-1 rounded-sm border-0 bg-transparent text-3xl leading-none absolute top-0 bottom-0 right-0 left-auto z-10 focus:outline-none"
            x-on:click="increment()">+</button>
    @error('antal') <span class="text-red-500">{{ $message }}</span> @enderror
</div>

<script>

    function counter() {
      return {
        increment() {
            if (document.getElementById('antal').value < 50){
                document.getElementById('antal').value++;            }

        },
        decrement() {
            if (document.getElementById('antal').value > {{ $min }}) {
                document.getElementById('antal').value--;
            }
    @error('antal') <span class="text-red-500">{{ $message }}</span> @enderror
        }
      };
    }
  </script>
