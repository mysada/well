<header class="
  bg-base-100 text-base-content sticky top-0 z-30 flex h-16
  w-full justify-center bg-opacity-90 backdrop-blur px-2
  transition-shadow duration-100 [transform:translate3d(0,0,0)]
  ">
    <div class="navbar w-full">
        <h1 class="flex-1 text-2xl">
            {{$title??'Transfer the title'}}
        </h1>
        <div class="flex-none gap-4">
            <span>{{Auth::getUser()->name}}</span>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                                alt="avatar"
                                width="10px"
                                height="10px"
                                src="/images/logo/header_logo.png"/>
                    </div>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li>
                        <form class="flex flex-col" action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="w-full h-full text-left">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
