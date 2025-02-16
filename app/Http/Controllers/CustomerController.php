<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $customers = Customer::paginate(10)->withQueryString();
        return view('customers', [
            'title' => 'Customers Data',
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer, String $id)
    {
        //
        $customer = Customer::find($id);
        return view('customer', [
            'title' => $customer->name,
            'customer' => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer, String $id)
    {
        //
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('notelp'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ];

        Customer::where('id', $id)->update($data);
        return redirect()->route('customers')->with('successUpdate','Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function filterCustomer(Request $request){
        $startDate = $request->input('start_date'); // Default ke 1 Januari
        $endDate = $request->input('end_date');     // Default ke 20 Januari
        $search = $request->input('search'); // Ambil kata kunci pencarian
        $startDate = Carbon::parse($startDate)->startOfDay();  // Mulai dari jam 00:00:00
        $endDate = Carbon::parse($endDate)->endOfDay();        // Akhir hari pada jam 23:59:59
        $customers = Customer::query()
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%');
            });
        })
        ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        })
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->withQueryString(); // Retain query parameters during pagination

        return view('customers', [
            'title' => 'Customer Data',
            'customers' => $customers
        ]);
    }
}