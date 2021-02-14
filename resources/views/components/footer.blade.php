<div class=" bg-gray-700">
    <div class="text-white flex w-2/3 mx-auto justify-between capitalize p-6 text-xl" >
        <div>made with
            <i class="fas fa-heart text-red-400"></i>            By ahmed shaheen
        </div>
            <ul class="flex justify-between capitalize w-1/3 ">
                <li class="text-white">follow me</li>
                @foreach($items as $menu_item)
                    <li><a href="{{ $menu_item->link() }}"> <i class="fab text-white hover:text-{{$menu_item->icon_class}}-400 {{$menu_item->title}}"></i> </a></li>
                @endforeach
            </ul>
    </div>

</div>
