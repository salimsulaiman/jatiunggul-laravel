<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full px-6">
        <div class="flex my-6 gap-4 items-center">
            <h1 class="text-slate-700 text-2xl">Data Kategori</h1>
            <button
                class="btn bg-white border-1 border-green-600 text-green-600 hover:bg-green-600 hover:border-transparent hover:text-white btn-sm"
                onclick="addCategory.showModal()">Tambah
                Kategori +</button>
            <dialog id="addCategory" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <form method="POST" action="{{ route('category.post') }}">
                        <h3 class="text-lg font-bold">Tambah kategori</h3>
                        <label class="form-control w-full my-2" for="name">
                            <div class="label">
                                <span class="label-text">Nama</span>
                            </div>
                            <input type="text" id="name" name="name" value=""
                                class="input input-bordered w-full" placeholder="Nama kategori" />
                        </label>
                        <div class="modal-action">
                            @csrf
                            <!-- if there is a button in form, it will close the modal -->
                            <div class="flex gap-2">
                                <button class="btn btn-success text-white" type="submit">Tambah</button>
                                <button class="btn" type="button"
                                    onclick="document.getElementById('addCategory').close()">Kembali</button>
                            </div>
                        </div>
                    </form>
                </div>
            </dialog>
        </div>
        <div class="overflow-x-auto">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                        <tr>
                            <th>{{ $index + 1 }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->format('d M Y | H:i A') }}</td>
                            <td>{{ $category->updated_at->format('d M Y | H:i A') }}</td>
                            <td class="flex gap-2">
                                <button
                                    class="btn bg-white border-1 border-sky-600 text-sky-600 hover:bg-sky-600 hover:border-transparent hover:text-white btn-sm"
                                    @if ($category->role == 'admin') disabled @endif
                                    onclick="updateUser{{ $category->id }}.showModal()">Edit</button>
                                <dialog id="updateUser{{ $category->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box">
                                        <form method="POST"
                                            action="{{ route('category.put', ['id' => $category->id]) }}">
                                            <h3 class="text-lg font-bold">Update user</h3>
                                            <label class="form-control w-full my-2" for="name">
                                                <div class="label">
                                                    <span class="label-text">Nama</span>
                                                </div>
                                                <input type="text" id="name" name="name"
                                                    value="{{ $category->name }}" class="input input-bordered w-full"
                                                    placeholder="Nama kategori" />
                                            </label>
                                            <div class="modal-action">
                                                @csrf
                                                @method('put')
                                                <!-- if there is a button in form, it will close the modal -->
                                                <div class="flex gap-2">
                                                    <button class="btn btn-info text-white"
                                                        type="submit">Update</button>
                                                    <button class="btn" type="button"
                                                        onclick="document.getElementById('updateUser{{ $category->id }}').close()">Kembali</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>
                                <button
                                    class="btn bg-white border-1 border-red-600 text-red-600 hover:bg-red-600 hover:border-transparent hover:text-white btn-sm"
                                    @if ($category->role == 'admin') disabled @endif
                                    onclick="deleteUser{{ $category->id }}.showModal()">Hapus</button>
                                <dialog id="deleteUser{{ $category->id }}"
                                    class="modal modal-bottom sm:modal-middle absolute">
                                    <div class="modal-box">
                                        <h3 class="text-lg font-bold">Hapus user!</h3>
                                        <p class="py-4">Apakah anda yakin akan menghapus user <span
                                                class="font-bold">{{ $category->name }}</span></p>
                                        <div class="modal-action">
                                            <form method="POST"
                                                action="{{ route('category.destroy', ['id' => $category->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" id="id"
                                                    value="{{ $category->id }}">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <div class="flex gap-2">
                                                    <button class="btn btn-error text-white"
                                                        type="submit">Hapus</button>
                                                    <button class="btn" type="button"
                                                        onclick="document.getElementById('deleteUser{{ $category->id }}').close()">Kembali</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </dialog>
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
