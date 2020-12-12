<nav class="flex items-center justify-between flex-wrap bg-white p-6 shadow text-gray-800">
    <div class="flex items-center flex-shrink-0 mr-6 font-sche text-2xl">
      <a href="/"><span class="font-semibold text-gray-800 text-xl tracking-tight">{{ config('app.name') }}</span></a>
    </div>

    <div class="flex items-center w-auto">
      <div class="text-sm flex-grow">
        <a href="{{ route('admin.pages.index') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-gray-600 border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4">
            Pages
        </a>
        <a href="{{ route('admin.homebox.index') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-gray-600 border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4">
            Homeboxes
        </a>
        <a href="{{ route('admin.navigation') }}" class="inline-block text-sm px-4 py-2 leading-none border rounded text-gray-600 border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4">
            Navigation
        </a>
      </div>

      <!-- Pay attention to x-data, that is our state -->
      <div class="relative" x-data="{ open: false }">
        <!-- @click toggles the open state from x-data by assigning !open -->
        <a href="#" @click="open = !open" :class="{ 'font-bold text-indigo-500': open === true }" class="inline-block text-sm px-4 py-2 leading-none border rounded text-gray-800 border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 ml-4 w-48">Menukort</a>
        <!-- x-show will show the element when open from x-data is true and hide it otherwise -->
        <!-- @click.away is what happens when you click outside of the element -->
        <!-- all the x-transition styles are added to the element at different points when the element becomes visible/invisible -->
        <ul x-show="open" @click.away="open = false" class="border border-gray-200 text-gray-800 text-sm bg-white shadow-md py-1 absolute w-48 right-0 mr-2"
        x-transition:enter="transition ease-out duration-75"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        >
          <li><a href="{{ route('admin.frokostmenu.index') }}" class="block px-2 py-1 hover:bg-indigo-100 hover:text-indigo-600 text-gray-800">Frokostmenu</a></li>
          <li><a href="{{ route('admin.eftermiddagsMenu.index') }}" class="block px-2 py-1 hover:bg-indigo-100 hover:text-indigo-600 text-gray-800">Eftermiddagsmenu</a></li>
          <li><a href="{{ route('admin.aftenMenu.index') }}" class="block px-2 py-1 hover:bg-indigo-100 hover:text-indigo-600 text-gray-800">Aftenmenu</a></li>
          <li><a href="{{ route('admin.anbefalerMenu.index') }}" class="block px-2 py-1 hover:bg-indigo-100 hover:text-indigo-600 text-gray-800">Anbefalermenu</a></li>
          <li><a href="{{ route('admin.borneMenu.index') }}" class="block px-2 py-1 hover:bg-indigo-100 hover:text-indigo-600 text-gray-800">Børnemenu</a></li>
        </ul>
      </div>
    </div>
  </nav>
