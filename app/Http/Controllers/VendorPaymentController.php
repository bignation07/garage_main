<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VendorPayment;

class VendorPaymentController extends Controller
{
    public function index()
    {
        $payments = VendorPayment::all();
        return view('vendor.index', compact('payments'));
    }

    public function store(Request $request)
    {
        VendorPayment::create($request->all());
        return redirect()->back()->with('success', 'Vendor payment recorded successfully.');
    }
}

