<div id="drawerOverlay"
    class="fixed inset-0 bg-black bg-opacity-50 hidden transition-all duration-200 ease-in-out z-[50]"></div>
<div id="drawer"
    class="fixed top-0 left-0 h-full w-72 bg-slate-800 shadow-lg transform -translate-x-full transition-transform duration-300 z-[60]">
    <div class="pt-8 pb-2 text-slate-700 w-full flex items-center gap-4 px-8">
        {{-- <h2 class="text-lg font-semibold">Drawer Menu</h2> --}}
        <img src="assets/image/logoJUwhite.png" alt="" class="w-4 h-auto">
        <h4 class="text-white text-xl font-semibold">Jati<span class="font-normal">Unggul</span></h4>
    </div>
    <ul class="mt-4 px-4">
        <a href="/" class="text-slate-400 hover:text-white">
            <li
                class="px-4 py-2 hover:bg-slate-700 cursor-pointer rounded-[8px] transition-all duration-200 ease-in-out flex items-center gap-4">
                <i class="fa fa-user-o"></i>
                User
            </li>
        </a>
        <a href="/categories" class="text-slate-400 hover:text-white">
            <li
                class="px-4 py-2 hover:bg-slate-700 cursor-pointer rounded-[8px] transition-all duration-200 ease-in-out flex items-center gap-4">
                <i class="fa fa-list"></i>
                Kategori
            </li>
        </a>
        <a href="/products" class="text-slate-400 hover:text-white">
            <li
                class="px-4 py-2 hover:bg-slate-700 cursor-pointer rounded-[8px] transition-all duration-200 ease-in-out flex items-center gap-4">
                <i class="fa fa-inbox"></i>
                Produk
            </li>
        </a>
        <div class="w-full h-[1px] bg-slate-600 my-4"></div>
    </ul>
    <!-- Tombol Tutup Drawer -->
    <button id="closeDrawerBtn"
        class="absolute top-8 right-4 text-white h-8 w-8 rounded-full bg-slate-700 hover:bg-slate-400 hover:text-slate-700">
        &laquo;
    </button>
</div>
