<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="w-full px-6">
        <div class="flex my-6 gap-4 items-center">
            <h1 class="text-slate-700 text-2xl">Data Produk</h1>
            <button
                class="btn bg-white border-1 border-green-600 text-green-600 hover:bg-green-600 hover:border-transparent hover:text-white btn-sm"
                onclick="addProduct.showModal()">Tambah
                Produk +</button>
            <dialog id="addProduct" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <form method="POST" action="{{ route('product.post') }}">
                        <h3 class="text-lg font-bold">Tambah produk</h3>
                        <label class="form-control w-full my-2" for="name">
                            <div class="label">
                                <span class="label-text">Nama</span>
                            </div>
                            <input type="text" id="name" name="name" value=""
                                class="input input-bordered w-full" placeholder="Nama barang" />
                        </label>
                        <label class="form-control w-full my-2" for="name">
                            <div class="label">
                                <span class="label-text">Deskripsi</span>
                            </div>
                            <textarea type="text" id="description" name="description" value="" class="input input-bordered w-full h-24 p-4"
                                placeholder="Deskripsi barang"></textarea>
                        </label>
                        <label class="form-control w-full my-2" for="name">
                            <div class="label">
                                <span class="label-text">Harga</span>
                            </div>
                            <input type="number" id="price" name="price" value=""
                                class="input input-bordered w-full" placeholder="Harga barang" />
                        </label>
                        <label class="form-control w-full my-2" for="name">
                            <div class="label">
                                <span class="label-text">Stok</span>
                            </div>
                            <input type="number" id="stock" name="stock" value=""
                                class="input input-bordered w-full" placeholder="Stok barang" />
                        </label>
                        <label class="form-control w-full my-2" for="name">
                            <div class="label">
                                <span class="label-text">Kategori</span>
                            </div>
                            <select class="select select-bordered w-full" id="category" name="category">
                                <option disabled selected>Kategori barang</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </label>
                        <div class="modal-action">
                            @csrf
                            <!-- if there is a button in form, it will close the modal -->
                            <div class="flex gap-2">
                                <button class="btn btn-success text-white" type="submit">Tambah</button>
                                <button class="btn" type="button"
                                    onclick="document.getElementById('addProduct').close()">Kembali</button>
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
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $index => $product)
                        <tr>
                            <th>{{ ($products->currentPage() - 1) * $products->perPage() + $index + 1 }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td class="w-32 truncate">@currency($product->price)</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->created_at->format('d M Y | H:i A') }}</td>
                            <td>{{ $product->updated_at->format('d M Y | H:i A') }}</td>
                            <td class="flex gap-2">
                                <button
                                    class="btn bg-white border-1 border-sky-600 text-sky-600 hover:bg-sky-600 hover:border-transparent hover:text-white btn-sm"
                                    onclick="updateUser{{ $product->id }}.showModal()">Edit</button>
                                <dialog id="updateUser{{ $product->id }}" class="modal modal-bottom sm:modal-middle">
                                    <div class="modal-box">
                                        <form method="POST"
                                            action="{{ route('product.put', ['id' => $product->id]) }}">
                                            <h3 class="text-lg font-bold">Update product</h3>
                                            <label class="form-control w-full my-2" for="name">
                                                <div class="label">
                                                    <span class="label-text">Nama</span>
                                                </div>
                                                <input type="text" required id="name" name="name"
                                                    value="{{ $product->name }}" class="input input-bordered w-full"
                                                    placeholder="Nama barang" />
                                            </label>
                                            <label class="form-control w-full my-2" for="name">
                                                <div class="label">
                                                    <span class="label-text">Deskripsi</span>
                                                </div>
                                                <textarea type="text" required id="description" name="description" class="input input-bordered w-full h-24 py-2"
                                                    placeholder="Deskripsi barang">{{ $product->description }}</textarea>
                                            </label>
                                            <label class="form-control w-full my-2" for="name">
                                                <div class="label">
                                                    <span class="label-text">Harga</span>
                                                </div>
                                                <input type="number" required id="price" name="price"
                                                    value="{{ $product->price }}" class="input input-bordered w-full"
                                                    placeholder="Harga barang" />
                                            </label>
                                            <label class="form-control w-full my-2" for="name">
                                                <div class="label">
                                                    <span class="label-text">Stok</span>
                                                </div>
                                                <input type="number" required id="stock" name="stock"
                                                    value="{{ $product->stock }}" class="input input-bordered w-full"
                                                    placeholder="Stok barang" />
                                            </label>
                                            <label class="form-control w-full my-2" for="name">
                                                <div class="label">
                                                    <span class="label-text">Kategori</span>
                                                </div>
                                                <select class="select select-bordered w-full" required id="category"
                                                    name="category">
                                                    <option disabled>Kategori barang</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            @if ($product->category_id == $category->id) selected @endif>
                                                            {{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                            <div class="modal-action">
                                                @csrf
                                                @method('put')
                                                <!-- if there is a button in form, it will close the modal -->
                                                <div class="flex gap-2">
                                                    <button class="btn btn-info text-white"
                                                        type="submit">Update</button>
                                                    <button class="btn" type="button"
                                                        onclick="document.getElementById('updateUser{{ $product->id }}').close()">Kembali</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </dialog>
                                <button
                                    class="btn bg-white border-1 border-red-600 text-red-600 hover:bg-red-600 hover:border-transparent hover:text-white btn-sm"
                                    @if ($product->role == 'admin') disabled @endif
                                    onclick="deleteProduct{{ $product->id }}.showModal()">Hapus</button>
                                <dialog id="deleteProduct{{ $product->id }}"
                                    class="modal modal-bottom sm:modal-middle absolute">
                                    <div class="modal-box">
                                        <h3 class="text-lg font-bold">Hapus produk!</h3>
                                        <p class="py-4">Apakah anda yakin akan menghapus produk <span
                                                class="font-bold">{{ $product->name }}</span></p>
                                        <div class="modal-action">
                                            <form method="POST"
                                                action="{{ route('product.destroy', ['id' => $product->id]) }}">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" id="id"
                                                    value="{{ $product->id }}">
                                                <!-- if there is a button in form, it will close the modal -->
                                                <div class="flex gap-2">
                                                    <button class="btn btn-error text-white"
                                                        type="submit">Hapus</button>
                                                    <button class="btn" type="button"
                                                        onclick="document.getElementById('deleteProduct{{ $product->id }}').close()">Kembali</button>
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
        <div class="my-4">{{ $products->links() }}</div>
    </div>
</x-layout>
