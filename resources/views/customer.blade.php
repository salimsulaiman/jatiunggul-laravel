<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full px-6">
        <div class="flex my-6 gap-4 items-center">
            <a href="/customers" class="text-2xl text-sky-600">&laquo;</a>
            <h1 class="text-slate-700 text-2xl">Data Pelanggan</h1>
        </div>
        <div class="grid grid-cols-3 gap-12">
            <div class="w-full flex flex-col">
                <div class="w-11/12 h-96 bg-slate-200 my-4 rounded-md"></div>
                <h1 class="font-bold text-2xl">{{ $customer->name }}</h1>
                <div class="flex gap-2 items-center">
                    <i class="fa fa-phone w-5 text-center"></i>
                    <h4>{{ $customer->phone }}</h4>
                </div>
                <div class="flex gap-2 items-center">
                    <i class="fa fa-envelope w-5 text-center"></i>
                    <h4>{{ $customer->email == '' ? '-' : $customer->email }}</h4>
                </div>
                <div class="flex gap-2 items-center">
                    <i class="fa fa-map-marker w-5 text-center"></i>
                    <h4>{{ $customer->address }}</h4>
                </div>
            </div>
            <div class="overflow-x-auto col-span-2">
                <table class="table table-zebra">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
</x-layout>
