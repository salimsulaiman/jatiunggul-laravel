<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
        <div class="flex my-6 gap-4 items-center">
            <a href="/customer/{{ $customer->id }}" class="text-2xl text-sky-600">&laquo;</a>
            <h1 class="text-slate-700 text-2xl">{{ $customer->name }}</h1>
        </div>
        <div class="w-full">
            <div class="flex justify-between items-center w-full">
                <div class="flex gap-2 items-center">
                    <img src="/assets/image/logoJU.png" alt="" class="w-12">
                    <h1 class="font-bold text-2xl">Jati Unggul</h1>
                </div>  
                <h1 class="text-4xl font-bold">Invoice</h1>
            </div>
            <div class="flex justify-between w-full my-12">
                <div class="w-1/2">
                    <h4 class="font-bold text-lg">INVOICE UNTUK:</h4>
                    <h4 class="font-bold">{{ $customer->name }}</h4>
                    <h4 class="font-normal">{{ $customer->phone }}</h4>
                    <h4 class="font-normal">{{ $customer->address }}</h4>
                </div>
                <div class="w-1/2 text-right">
                    <h4 class="font-bold">No Nota: <span class="font-normal">{{ $sale->note_number }}</span></h4>
                    <h4 class="font-normal">{{  $sale->sales_date->format('d M Y') }}</h4>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto w-full">
            {{-- <h4 class="font-bold text-xl my-2">No Nota : {{ $customer->sale->note_number }}</h4> --}}
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        {{-- <th>Terbayarkan</th>
                        <th>Kekurangan</th>
                        <th>Status</th> --}}
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($saleItems as $index => $saleItem)
                        <tr>
                            <th class="w-8">1</th>
                            <td class="w-96 truncate">{{ $saleItem->product->name }}</td>
                            <td>{{ $saleItem->product->category->name }}</td>
                            <td>{{ $saleItem->quantity }}</td>
                            <td class="w-32 truncate">@currency($saleItem->price)</td>
                            {{-- <td class="w-32 truncate">@currency($sale->total_amount)</td>
                            <td class="w-32 truncate">@currency($sale->down_payment)</td>
                            <td class="w-32 truncate">@currency($sale->remaining_payment)</td> --}}
                            {{-- <td class="w-32 truncate">
                                <div class="badge w-full py-1 h-fit {{ $sale->payment_status == 0 ? 'bg-slate-500 text-white' : 'badge-success text-white' }}">
                                    {{ $sale->payment_status == 0 ? 'Belum lunas' : 'Lunas' }}
                                </div>
                            </td>
                            <td class="flex justify-center items-center h-full">
                                <a href="/saleitems/{{ $sale->id }}" class="btn bg-white border-1 border-green-600 text-green-600 hover:bg-green-600 hover:border-transparent hover:text-white btn-sm min-h-full">
                                    Detail
                                </a>
                            </td> --}}
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        <div class="w-full mt-8">
            <div class="flex gap-4 my-4 w-full text-right justify-end">
                <h4 class="font-bold">Subtotal</h4>
                <h4 class="font-normal">@currency($sale->total_amount)</h4>
            </div>
            <div class="flex gap-4 my-4 w-full text-right justify-end">
                <h4 class="font-bold">Potongan</h4>
                <h4 class="font-normal text-green-700">@currency(300000)</h4>
            </div>
            <div class="flex gap-4 my-4 w-full text-right justify-end">
                <h4 class="font-bold text-2xl">Total</h4>
                <h4 class="font-bold text-2xl">@currency($sale->total_amount - 300000)</h4>
            </div>
        </div>
        <div class="w-full mt-16">
            <h1 class="font-bold text-4xl">Terimakasih!</h1>
        </div>
        <div class="w-full mt-24">
            <h1 class="font-bold text-lg mt-16">INFORMASI PEMBAYARAN</h1>
            <h4 class="font-bold">PT Jati Unggul Perkasa</h4>
            <h4>CS: Salim Sulaiman</h4>
            <h4>{{ $sale->created_at->format('d M Y | H:i A') }}</h4>
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
