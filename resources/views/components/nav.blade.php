<div class="bg-gray-500">
    <div class="flex  mx-auto w-3/4 justify-between items-center text-white p-6">
        <a href="{{route('main')}}"><div class="text-3xl  font-extrabold">  Ecommerce</div></a>

        <ul class="capitalize text-xl flex space-x-12 items-center">
            @guest
                <li><a href="{{ route('login') }}">log In</a></li>
                <li><a href="{{ route('register') }}">register</a></li>
            @else
                <li><a href="{{route('profile.show')}}" class=""> My Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" class="bg-transparent inline">
                        @csrf
                        <input type="submit" value="{{ __('Logout') }}" class="bg-transparent cursor-pointer block outline-none">
                    </form>
                </li>
            @endguest
            @foreach($items as $menu_item)
                @if($menu_item->title=='card')
                    <li>
                        <a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a>
                        <p class="bg-yellow-300 w-6 h-6 inline-block text-center  rounded-full">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->count()}}</p>

                    </li>

                @else
                <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
                @endif

            @endforeach
        </ul>
    </div>

</div>
