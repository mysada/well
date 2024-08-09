<div class="navbar h-20 p-4">
    <div class="flex-1">
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                    <img
                            alt="Tailwind CSS Navbar component"
                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"/>
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
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
