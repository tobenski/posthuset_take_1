<header id="header"
    class="w-full h-48 lg:h-24 bg-white px-6 lg:px-16 flex flex-wrap items-center justify-center md:justify-between"
    x-ref="header"
    x-data="{ sticky: false }"
    x-on:scroll.window="
        sticky = window.pageYOffset > document.getElementById('header').offsetTop ? true : false;
        $dispatch('header-sticky', sticky );"
    x-bind:class="{'fixed': sticky, 'top-0': sticky, 'shadow-2xl': sticky, 'z-10': sticky}">

    <a href="/" class="font-sche text-3xl lg:text-6xl font-bold text-center lg:text-left text-black">{{ config('app.name') }}</a>
    <div class="flex items-center justify-center lg:justify-end flex-wrap">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Book Bord</button>
        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-full m-2 md:ml-6">Bestil Nytårs Take Away</button>
    </div>
</header>

