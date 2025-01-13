<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    @auth
        <div class="w-full px-6">
            <div class="flex w-full mt-4 items-center justify-between">
                <h1 class="text-slate-800 text-lg">Selamat datang, <span class="font-bold">{{ auth()->user()->name }}</span>
                </h1>
                <h4 class="font-bold">{{ date('d M Y') }}</h4>
            </div>
            <div class="grid grid-cols-4 gap-4 w-full mt-4">
                <div class="border-slate-300 p-4">
                    <div class="flex gap-4 w-full items-center">
                        <div class="w-12 h-12 bg-slate-800 rounded-md"></div>
                        <div class="flex flex-col gap-2">
                            <div class="text-lg font-bold">21</div>
                            <div class="text-sm text-slate-400">Proses pending</div>
                        </div>
                    </div>
                    <hr class="w-full h-2 bg-sky-400 mt-4">
                    </hr>
                </div>
                <div class="border-slate-300 p-4">
                    <div class="flex gap-4 w-full items-center">
                        <div class="w-12 h-12 bg-slate-800 rounded-md"></div>
                        <div class="flex flex-col gap-2">
                            <div class="text-lg font-bold">21</div>
                            <div class="text-sm text-slate-400">Proses pending</div>
                        </div>
                    </div>
                    <hr class="w-full h-2 bg-sky-400 mt-4">
                    </hr>
                </div>
                <div class="border-slate-300 p-4">
                    <div class="flex gap-4 w-full items-center">
                        <div class="w-12 h-12 bg-slate-800 rounded-md"></div>
                        <div class="flex flex-col gap-2">
                            <div class="text-lg font-bold">21</div>
                            <div class="text-sm text-slate-400">Proses pending</div>
                        </div>
                    </div>
                    <hr class="w-full h-2 bg-sky-400 mt-4">
                    </hr>
                </div>
                <div class="border-slate-300 p-4">
                    <div class="flex gap-4 w-full items-center">
                        <div class="w-12 h-12 bg-slate-800 rounded-md"></div>
                        <div class="flex flex-col gap-2">
                            <div class="text-lg font-bold">21</div>
                            <div class="text-sm text-slate-400">Proses pending</div>
                        </div>
                    </div>
                    <hr class="w-full h-2 bg-sky-400 mt-4">
                    </hr>
                </div>
            </div>
            @if (session('successDelete'))
                <div class="toast toast-end" id="toast">
                    <div class="alert bg-red-600 text-white">
                        <span>{{ session('successDelete') }}</span>
                    </div>
                </div>
            @endif
            @if (session('successAdd'))
                <div class="toast toast-end" id="toast">
                    <div class="alert bg-green-600 text-white">
                        <span>{{ session('successAdd') }}.</span>
                    </div>
                </div>
            @endif
            @if (session('successUpdate'))
                <div class="toast toast-end" id="toast">
                    <div class="alert bg-green-600 text-white">
                        <span>{{ session('successUpdate') }}.</span>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="toast toast-end" id="toast">
                    <div class="alert bg-red-600 text-white">
                        <span>
                            @foreach ($errors->all() as $error)
                                {{ $error }},
                            @endforeach
                        </span>
                    </div>
                </div>
            @endif
        </div>
    @endauth
</x-layout>
