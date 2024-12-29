<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full px-6">
        <div class="flex my-6 gap-4 items-center">
            <h1 class="text-slate-700 text-2xl">Data Pelanggan</h1>
        </div>
        <div class="overflow-x-auto">
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
                    @foreach ($customers as $index => $customer)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email == '' ? '-' : $customer->email }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->created_at->format('d M Y | H:i A') }}</td>
                            <td>{{ $customer->updated_at->format('d M Y | H:i A') }}</td>
                            <td class="flex gap-2">
                                <button
                                    class="btn bg-white border-1 border-sky-600 text-sky-600 hover:bg-sky-600 hover:border-transparent hover:text-white btn-sm"
                                    @if ($customer->role == 'admin') disabled @endif
                                    onclick="updateCustomer{{ $customer->id }}.showModal()">Edit</button>
                                <dialog id="updateCustomer{{ $customer->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box">
                                        <form method="POST"
                                            action="{{ route('customer.put', ['id' => $customer->id]) }}">
                                            <h3 class="text-lg font-bold">Update customer</h3>
                                            <label class="form-control w-full my-2" for="name">
                                                <div class="label">
                                                    <span class="label-text">Nama</span>
                                                </div>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $customer->name }}" class="input input-bordered w-full"
                                                    placeholder="Nama pelanggan" />
                                            </label>
                                            <label class="form-control w-full my-2" for="notelp">
                                                <div class="label">
                                                    <span class="label-text">No Telp</span>
                                                </div>
                                                <input type="tel" id="notelp" name="notelp"
                                                    value="{{ $customer->phone }}" class="input input-bordered w-full"
                                                    placeholder="Nomor Telepon" />
                                            </label>
                                            <label class="form-control w-full my-2" for="email">
                                                <div class="label">
                                                    <span class="label-text">Email</span>
                                                </div>
                                                <input type="email" id="email" name="email"
                                                    value="{{ $customer->email }}" class="input input-bordered w-full"
                                                    placeholder="Email pelanggan" />
                                            </label>
                                            <label class="form-control w-full my-2" for="address">
                                                <div class="label">
                                                    <span class="label-text">Alamat</span>
                                                </div>
                                                <textarea type="text" id="address" name="address" value="" class="input input-bordered w-full h-24 p-4"
                                                    placeholder="Alamat pelanggan">{{ $customer->address }}</textarea>
                                            </label>
                                            <div class="modal-action">
                                                @csrf
                                                @method('put')
                                                <!-- if there is a button in form, it will close the modal -->
                                                <div class="flex gap-2">
                                                    <button class="btn btn-info text-white"
                                                        type="submit">Update</button>
                                                    <button class="btn" type="button"
                                                        onclick="document.getElementById('updateCustomer{{ $customer->id }}').close()">Kembali</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>
                                <a href="/customer/{{ $customer->id }}"
                                    class="btn bg-white border-1 border-green-600 text-green-600 hover:bg-green-600 hover:border-transparent hover:text-white btn-sm">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
