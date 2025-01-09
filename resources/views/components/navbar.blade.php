<div class="w-full fixed bg-slate-800 top-0 left-0 right-0 z-40 shadow">
    <div class="navbar max-w-screen-xl mx-auto">
        <div class="navbar-start">
            <div class="dropdown">
                <div id="openDrawerBtn" role="button" class="btn btn-ghost hover:bg-slate-700 btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="#fff">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </div>
                {{-- <ul tabindex="0"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                    <li><a href="/">User</a></li>
                    <li><a href="/categories">Kategori</a></li>
                    <li><a href="/products">Produk</a></li>
                </ul> --}}
            </div>
        </div>
        {{-- <div class="navbar-center">
            <a class="cursor-pointer text-white text-xl">Jati Unggul</a>
        </div> --}}
        <div class="navbar-end">
            <button class="btn btn-ghost hover:bg-slate-700 btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="" viewBox="0 0 24 24"
                    stroke="#fff">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost hover:bg-slate-700 btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="" viewBox="0 0 24 24"
                        stroke="#fff">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
            @auth
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                        <div class="w-10 rounded-full">
                            <img alt="Tailwind CSS Navbar component" src="{{ auth()->user()->profile }}" />
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content text-white bg-slate-700 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                        <li>
                            <a class="justify-between hover:bg-slate-800">
                                {{ auth()->user()->name }}
                            </a>
                        </li>
                        <li><a class="hover:bg-slate-800">Settings</a></li>
                        <li class="w-full hover:bg-slate-800 rounded-lg block">
                            <form action="/logout" method="POST" class="w-full">
                                @csrf
                                <button type="submit" class="w-full">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</div>
