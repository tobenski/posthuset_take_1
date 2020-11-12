<div class="w-full h-full flex flex-col items-center justify-start">
    <div class="block w-full my-4 mx-auto" x-data="{selected:null}">
        @foreach($menus as $menu)
            <x-navigation-item :menu=$menu />
        @endforeach
    </div>
</div>
