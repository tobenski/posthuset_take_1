<main class="flex flex-col items-center justify-start min-h-screen min-w-full">
    <div id="overlay" class="absolute pointer-events-none top-0 left-0 w-full h-screen-1/3 overflow-hidden border-b-4 border-black">
        <video preload="auto" autoplay playsinline muted loop class="w-full h-full object-cover object-center">
            <source src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/front.mp4" type="video/mp4">
        </video>
    </div>
    <div class="flex w-full items-center justify-center absolute top-0 left-0 mt-2 md:mt-8">
        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-sche text-white">Det Gamle Posthus</h1>
    </div>
    <div x-data="{openTab: 1 }" class="flex flex-col relative top-screen-1/3 w-full items-center justify-start">
        <div class="flex border-b-2  border-black bg-white h-8 md:h-14 w-full items-center justify-center">
            <div @click="openTab=1"
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l-2 border-r border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 1 ? 'bg-gray-200' : 'bg-gray-50'">
                 Frokost
            </div>
            <div @click="openTab=2"
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l border-r border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 2 ? 'bg-gray-200' : 'bg-gray-50'">
                Eftermiddag
            </div>
            <div @click="openTab=3"
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l border-r border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 3 ? 'bg-gray-200' : 'bg-gray-50'">
                Aften
            </div>
            <div @click="openTab=4"
                 class="flex items-end pb-1 h-full w-30 md:w-40 justify-center text-black border-l border-r-2 border-black font-bold text-xs md:text-md px-2 md:px-8 lg:px-8 hover:bg-gray-200 cursor-pointer"
                 :class="openTab === 4 ? 'bg-gray-200' : 'bg-gray-50'">
                Børn
            </div>
        </div>
        <div class="w-full md:w-9/12 h-full min-h-1/4 bg-menu text-white relative top-4 md:top-8">
            <div x-show="openTab === 1"
                 class="text-xs text-center flex flex-col w-full p-2 md:p4 md:px-24 lg:px-40">
                 <h3 class="text-lg font-bold">Frokostmenu</h3>
                 <h5 class="text-xs font-hairline">Serveres mellem 11.30 og 14.30</h5>
                 <h5 class="text-xs font-hairline mb-1 border-b border-white -mx-2 md:-mx-24 lg:-mx-40">Menuen er gældende til og med den 23. december</h5>
                 <p class="mb-2 text-sm leading-none mt-4">
                    <b>Stjerneskud</b><br>
                    <span class="text-xs">Stegt & dampet fiskefilet med koldrøget laks, rejer & rogn.
                    Serveret på smørristet toast.<br></span>
                    <b>159,-</b></p>
                 <p class="mb-2"><b>Frokost Steak</b><br>
                    Steak af filet fra Dansk kødkvæg, serveret med kryddersmør, grøn salat, grove fritter & dyppelse.<br>
                    <b>199,-</b></p>
                <p class="mb-2">
                    <b>Stjerneskud</b><br>
                    Stegt & dampet fiskefilet med koldrøget laks, rejer & rogn.
                    Serveret på smørristet toast.<br>
                    <b>159,-</b></p>
                    <p class="mb-2"><b>Frokost Steak</b><br>
                    Steak af filet fra Dansk kødkvæg, serveret med kryddersmør, grøn salat, grove fritter & dyppelse.<br>
                    <b>199,-</b></p>
                <p class="mb-2">
                    <b>Stjerneskud</b><br>
                    Stegt & dampet fiskefilet med koldrøget laks, rejer & rogn.
                    Serveret på smørristet toast.<br>
                    <b>159,-</b></p>
                    <p class="mb-2"><b>Frokost Steak</b><br>
                    Steak af filet fra Dansk kødkvæg, serveret med kryddersmør, grøn salat, grove fritter & dyppelse.<br>
                    <b>199,-</b></p>


            </div>
            <div x-show="openTab === 1"
                class="md:absolute md:-ml-16 lg:-ml-36 md:top-24 w-full md:w-36 lg:w-72 md:h-18 lg:h-36">
                <picture>
                    <img src="https://detgamleposthusvideo.s3.eu-north-1.amazonaws.com/Stjerneskud.jpg" class="w-full h-full object-cover object-center" alt="">
                </picture>
            </div>
            <div x-show="openTab === 2"
                 class="text-xs font-bold text-center">
                 EFTERMIDDAG
                <p>Serveres mellem klokken 11.30 & 16.30</p>
                <p>Gældende til og med 23. december</p>
            </div>
            <div x-show="openTab === 3"
                 class="text-xs font-bold text-center">
                <p>Serveres fra klokken 17.30
                </p>
                <p>Gældende til og med 23. december</p>
                <p class="mt-4"><a class="btn btn-primary">Se den frokost næste menu her</a></p>
            </div>
            <div x-show="openTab === 4"
                 class="text-xs font-bold text-center">
                <p>Serveres hele dagen</p>
                <p>Kun til børn under 14 år.</p>
                <p class="mt-4"><a class="btn btn-primary">Se den frokost næste menu her</a></p>
            </div>
        </div>
    </div>
</main>
