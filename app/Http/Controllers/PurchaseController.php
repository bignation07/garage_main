<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\VehicleCheckin;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
  
public function index(Request $request)
{
    $search = $request->input('search');

    $purchases = Purchase::with(['customer'])
        ->when($search, function ($query, $search) {
            return $query->whereHas('customer', function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('vehicle_registration_number', 'like', "%{$search}%");
            });
        })
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy(function ($purchase) {
            return $purchase->customer->customer_name . ' - ' . 
                   $purchase->customer->vehicle_registration_number . ' - ' . 
                   $purchase->customer->id; // Grouping by customer_id as well
        });

    return view('purchases.index', compact('purchases'));
}


public function create()
{
    $customers = VehicleCheckin::select('id', 'customer_name', 'vehicle_registration_number')->orderBy('id', 'desc')
        ->get()
        ->mapWithKeys(function ($customer) {
            return [$customer->id => $customer->customer_name . ' - ' . $customer->vehicle_registration_number];
        });
       

    return view('purchases.create', compact('customers'));
}

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:vehicle_checkins,id',
            'name_of_parts.*' => 'required|string|max:255',
            'mrp.*' => 'required|numeric|min:0',
            'qty.*' => 'required|numeric|min:0',
            // 'sale_price.*' => 'required|numeric|min:0',
            'purchase_price.*' => 'required|numeric|min:0',
            // 'purchase_per_price.*' => 'required|numeric|min:0',
            'selling_price.*' => 'required|numeric|min:0',
            'profit.*' => 'required|numeric',
        ]);

        $data = $request->all();

        // Loop through each input row and save in database
        foreach ($data['name_of_parts'] as $key => $value) {
            Purchase::create([
                'customer_id' => $request->customer_id,
                'name_of_parts' => $data['name_of_parts'][$key],
                'mrp' => $data['mrp'][$key],
                // 'sale_price' => $data['sale_price'][$key],
                'qty' => $data['qty'][$key],
                'purchase_price' => $data['purchase_price'][$key],
                // 'purchase_per_price' => $data['purchase_per_price'][$key],
                'selling_price' => $data['selling_price'][$key],
                
                'profit' => $data['profit'][$key],
            ]);
        }

        return redirect()->route('purchases.index')->with('success', 'Purchase data saved successfully!');
    }

    // public function edit(Purchase $purchase)
    // {
    //      $purchases = Purchase::all();
    //       $customers = VehicleCheckin::pluck('customer_name', 'id');
    //     return view('purchases.edit', compact('purchase','purchases','customers'));
    // }
    public function edit(Purchase $purchase)
{
    $purchases = Purchase::all();
    $customers = VehicleCheckin::select('id', 'customer_name', 'vehicle_registration_number')
        ->get()
        ->mapWithKeys(function ($customer) {
            return [$customer->id => $customer->customer_name . ' - ' . $customer->vehicle_registration_number];
        });

    return view('purchases.edit', compact('purchase', 'purchases', 'customers'));
}


    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'customer_id' => 'required|exists:vehicle_checkins,id',
            'name_of_parts' => 'required|string|max:255',
            'mrp' => 'required|numeric|min:0',
             'qty' => 'required|numeric|min:0',
            // 'sale_price' => 'required|numeric|min:0',
            'purchase_price' => 'required|numeric|min:0',
            // 'purchase_per_price' => 'required|numeric|min:0',
            'selling_price' => 'required|numeric|min:0',
            'profit' => 'required|numeric',
           
        ]);

        $purchase->update($request->all());

        return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully!');
    }

    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully!');
    }
}
