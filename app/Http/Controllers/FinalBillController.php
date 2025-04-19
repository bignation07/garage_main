<?php

namespace App\Http\Controllers;

use App\Models\FinalBill;
use App\Models\JobCard;
use App\Models\VehicleCheckin;
use App\Models\Purchase;
use App\Models\ProfitReport;
use PDF;
use Illuminate\Http\Request;

class FinalBillController extends Controller
{

public function index(Request $request)
{
    // Get search query from the request
    $search = $request->input('search');
    
    // Query to filter final bills based on the search term
    $finalBills = FinalBill::with('jobCard')
        ->when($search, function ($query, $search) {
            return $query->where('customer_name', 'like', '%' . $search . '%')
                         ->orWhere('vehicle_registration_number', 'like', '%' . $search . '%')
                         ->orWhere('service_details', 'like', '%' . $search . '%');
        })
     ->orderBy('created_at', 'desc')
        ->paginate(8); // Use pagination (8 items per page)
    
    return view('final-bills.index', compact('finalBills', 'search'));
}


    public function show($id)
    {
        $finalBill = FinalBill::findOrFail($id);
        return view('final-bills.show', compact('finalBill'));
    }

public function numberToWords($number) {
    $words = array(
        0 => 'Zero', 1 => 'One', 2 => 'Two', 3 => 'Three', 4 => 'Four',
        5 => 'Five', 6 => 'Six', 7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve', 13 => 'Thirteen',
        14 => 'Fourteen', 15 => 'Fifteen', 16 => 'Sixteen', 17 => 'Seventeen',
        18 => 'Eighteen', 19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty', 70 => 'Seventy',
        80 => 'Eighty', 90 => 'Ninety', 100 => 'Hundred', 1000 => 'Thousand',
        100000 => 'Lakh', 10000000 => 'Crore'
    );

    // If the number is less than 20
    if ($number < 20) {
        return $words[$number];
    }

    // Handle tens (20-99)
    if ($number < 100) {
        $tens = floor($number / 10) * 10; // Get the tens part (20, 30, 40, etc.)
        $remainder = $number % 10; // Get the ones part (1, 2, 3, etc.)
        
        // Start with the tens part (20, 30, 40, etc.)
        $result = $words[$tens];
        
        // If there's a remainder, add the ones part (1, 2, 3, etc.)
        if ($remainder > 0) {
            $result .= ' ' . $words[$remainder];
        }

        return $result;
    }

    // Handle hundreds (100-999)
    if ($number < 1000) {
        $hundreds = floor($number / 100);
        $remainder = $number % 100;
        $result = $words[$hundreds] . ' Hundred';
        if ($remainder > 0) {
            $result .= ' and ' . $this->numberToWords($remainder);
        }
        return $result;
    }

    // Handle thousands (1000-9999)
    if ($number < 100000) {
        $thousands = floor($number / 1000);
        $remainder = $number % 1000;
        $result = $this->numberToWords($thousands) . ' Thousand';
        if ($remainder > 0) {
            $result .= ' ' . $this->numberToWords($remainder);
        }
        return $result;
    }

    // Handle lakhs (100000-999999)
    if ($number < 10000000) {
        $lakhs = floor($number / 100000);
        $remainder = $number % 100000;
        $result = $this->numberToWords($lakhs) . ' Lakh';
        if ($remainder > 0) {
            $result .= ' ' . $this->numberToWords($remainder);
        }
        return $result;
    }

    // Handle crores (10000000+)
    if ($number >= 10000000) {
        $crores = floor($number / 10000000);
        $remainder = $number % 10000000;
        $result = $this->numberToWords($crores) . ' Crore';
        if ($remainder > 0) {
            $result .= ' ' . $this->numberToWords($remainder);
        }
        return $result;
    }

    return $number; // In case the number is too large (not supported)
}


public function downloadSalarySlip($id)
{
    $finalbill = FinalBill::findOrFail($id);
    $checkinId = $finalbill->vehicle_checkin_id;
    
    // Get the JobCard related to the checkinId
    $advancepayment = JobCard::where('vehicle_checkin_id', $checkinId)->first();

    // If no advance payment exists, set it to 0
    $advanceAmount = $advancepayment ? $advancepayment->advance_payment : 0;

    // Fetch the purchases
    $purchases = Purchase::where('customer_id', $finalbill->vehicle_checkin_id)
                          ->select('name_of_parts', 'selling_price', 'qty')
                          ->get();

    // Calculate total amount
    $totalAmount = $purchases->sum(function($purchase) {
        return $purchase->selling_price * $purchase->qty;
    });

  // Calculate balance
    $balanceAmount = $totalAmount - $advanceAmount;
    // Convert total amount to words
    $amountInWords = $this->numberToWords($balanceAmount);

    // Other calculations...
    $logoPath = public_path('logo.png');
    $totalQuantity = $purchases->sum('qty');
    $checkin = VehicleCheckin::findOrFail($checkinId);
    $finalbills = FinalBill::where('vehicle_checkin_id', $checkinId)->get();

    // Pass the data to the view and generate PDF
    $pdf = \PDF::loadView('final-bills.slip', compact('finalbill', 'finalbills', 'purchases', 'totalAmount', 'totalQuantity', 'checkin', 'logoPath', 'balanceAmount','amountInWords', 'advanceAmount'));

    return $pdf->download('bill_slip_' . $finalbill->customer_name . '.pdf');
}
public function sendSalarySlipWhatsApp($id)
{
    $finalbill = FinalBill::findOrFail($id);
    $checkinId = $finalbill->vehicle_checkin_id;

    // Get the advance payment
    $advancepayment = JobCard::where('vehicle_checkin_id', $checkinId)->first();
    $advanceAmount = $advancepayment ? $advancepayment->advance_payment : 0;

    // Get the purchases
    $purchases = Purchase::where('customer_id', $finalbill->vehicle_checkin_id)
        ->select('name_of_parts', 'selling_price', 'qty')
        ->get();

    // Calculate total amount
    $totalAmount = $purchases->sum(function ($purchase) {
        return $purchase->selling_price * $purchase->qty;
    });

    // Calculate balance amount
    $balanceAmount = $totalAmount - $advanceAmount;

    // Convert balance amount to words
    $amountInWords = $this->numberToWords($balanceAmount);

    // Get vehicle checkin details
    $checkin = VehicleCheckin::findOrFail($checkinId);

    // Start the message content
    $message = "Hello " . $finalbill->customer_name . ",\n\n";
    $message .= "Here are the details of your vehicle's final bill (Registration: " . $checkin->vehicle_registration_number . "):\n\n";
    $message .= "Total Amount: ₹" . $totalAmount . "\n";
    $message .= "Advance Payment: ₹" . $advanceAmount . "\n";
    $message .= "Balance Amount: ₹" . $balanceAmount . " (" . $amountInWords . ")\n\n";

    // Add purchase details
    $message .= "Details of parts purchased:\n";
    foreach ($purchases as $purchase) {
        $message .= "Part: " . $purchase->name_of_parts . ", Price: ₹" . $purchase->selling_price . ", Quantity: " . $purchase->qty . "\n";
    }

    // Create the WhatsApp message URL
    $contactNumber = $checkin->contact_number;
    $encodedMessage = urlencode($message);
    $whatsAppUrl = "https://wa.me/{$contactNumber}?text=" . $encodedMessage;

    // Redirect to WhatsApp with the message
    return redirect($whatsAppUrl);
}


    public function create()
{
    $jobCards = JobCard::all();
    // $checkins = VehicleCheckin::all(); // Fetch VehicleCheckin data
    $checkins = VehicleCheckin::orderBy('id', 'desc')->get();

    return view('final-bills.create', compact('jobCards', 'checkins'));
}

public function store(Request $request) {
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'service_details' => 'required|string',
    ]);

    $checkin = VehicleCheckin::findOrFail($request->vehicle_checkin_id);

    $finalBill = FinalBill::create([
        'vehicle_checkin_id' => $request->vehicle_checkin_id,
        'customer_name' => $checkin->customer_name,
        'contact_number' => $checkin->contact_number,
        'vehicle_registration_number' => $checkin->vehicle_registration_number,
        'service_details' => $request->service_details,
    ]);

    // Fetch purchases related to this customer & vehicle
    $purchases = Purchase::whereHas('customer', function ($query) use ($checkin) {
        $query->where('customer_name', $checkin->customer_name)
              ->where('vehicle_registration_number', $checkin->vehicle_registration_number);
    })->select('name_of_parts', 'profit','selling_price','qty')->get();

    // Create profit report entry
    foreach ($purchases as $purchase) {
        ProfitReport::create([
            'vehicle_checkin_id' => $request->vehicle_checkin_id,
            'name_of_parts' => $purchase->name_of_parts,
            'selling_price' => $purchase->selling_price,
            'qty' => $purchase->qty,
            'profit' => $purchase->profit,
        ]);
    }

    return redirect()->route('final-bills.index')->with('success', 'Final Bill Created Successfully');
}

    
public function edit($id)
{
    $finalBill = FinalBill::findOrFail($id);
    $jobCards = JobCard::all();
    $checkins = VehicleCheckin::orderBy('id', 'desc')->get();
    
    return view('final-bills.edit', compact('finalBill', 'jobCards', 'checkins'));
}

public function update(Request $request, $id)
{
    // Validate the incoming data
    $request->validate([
        'vehicle_checkin_id' => 'required|exists:vehicle_checkins,id',
        'service_details' => 'required|string',
    ]);

    // Find the final bill by its ID
    $finalBill = FinalBill::findOrFail($id);

    // Find the vehicle checkin using the provided checkin ID
    $checkin = VehicleCheckin::findOrFail($request->vehicle_checkin_id);

    // Update the final bill with the new data
    $finalBill->update([
        'vehicle_checkin_id' => $request->vehicle_checkin_id,
        'customer_name' => $checkin->customer_name,
        'contact_number' => $checkin->contact_number,
        'vehicle_registration_number' => $checkin->vehicle_registration_number,
        'service_details' => $request->service_details,
    ]);

    // Redirect back to the final bills index page with a success message
    return redirect()->route('final-bills.index')->with('success', 'Final Bill Updated Successfully');
}

public function destroy($id)
{
    $finalBill = FinalBill::findOrFail($id);
    $finalBill->delete();

    return redirect()->route('final-bills.index')->with('success', 'Final Bill Deleted Successfully');
}


}

