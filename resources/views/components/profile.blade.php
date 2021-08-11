<div class="w-3/4 mx-auto my-6">
    @if(session()->has('msg'))
        <div class="px-6 py-3 bg-green-200 text-green-900  my-4 font-bold rounded-lg" >
            {{session('msg')}}
        </div>
    @endif
        @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="px-6 py-3 bg-red-200 text-red-900  my-4 font-bold rounded-lg" >{{$error}}</li>
                    @endforeach
                </ul>
        @endif

</div>
<div class="flex w-3/4 mx-auto mt-12">
    <div class="w-1/4">
        <ul>
            <li><a href="{{route('profile.show')}}" class="text-xl hover:underline pb-2 text-blue-500 block"> My Profile</a></li>
            <li><a href="" class="text-xl hover:underline py-2 text-blue-500 block"> My Orders</a></li>
        </ul>
    </div>

    <div class="flex-1">
        <form action="{{route('profile.edit')}}" class="flex-col items-center justify-center" method="POST">
            @csrf
            @method('patch')
            <div class="pb-3">
                <label for="name">update your name</label>
                <input type="text" placeholder="" name="name" class="w-full rounded-xl" value="{{old('name',$user->name)}}">
            </div>

            <div class="py-3">
                <label for="name">update your password</label>
                <input class="w-full rounded-xl" type="password" placeholder="update your password" name="password">
            </div>

            <div class="py-3">
                <label for="name">password confirmation</label>
                <input class="w-full rounded-xl" type="password" placeholder="type your password again" name="password_confirmation">
            </div>

            <div class="py-3">
                <input class="w-1/2 mx-auto px-4 py-2 bg-blue-500 text-white rounded-full cursor-pointer shadow outline-none hover:shadow-xl font-bold block" type="submit" value="Update Profile">
            </div>
        </form>
    </div>
</div>
