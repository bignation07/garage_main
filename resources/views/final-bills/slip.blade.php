<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Bill Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        header {
            text-align: center;
            margin-bottom: 10px;
            padding-top: 10px;
            border-top: 2px solid #c5060e;
        }

        header h4 {
            margin: 0;
            color: #007bff;
        }

        /* Adjusted layout for company and customer details */
        .company-customer-section {
            width: 100%;
            margin-bottom: 20px;
            clear: both;
        }

       

        .company-details h6, .customer-details h6 {
            margin: 5px 0;
            font-size: 16px;
            font-weight: bold;
        }

        .company-details p, .customer-details p {
            margin: 2px 0;
            font-size: 14px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        .table th, .table td {
            padding: 5px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #c5060e;
            color: white;
        }

        h3 {
            margin: 10px 0;
            color: #343a40;
        }

        .complaints-section h3 {
            color: #dc3545;
        }

        .summary {
            margin: 10px 0;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }

        

        footer {
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
        }
        @media print {
    body {
        font-size: 12pt;
    }

    .invoice-header, .complaints-section, .summary {
        margin-bottom: 20px;
    }

    .table th, .table td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    footer {
        page-break-before: always;
        margin-top: 50px;
    }
}

    </style>
</head>
<body>

    
    <div class="invoice-header" style="display: table; width: 100%; margin-bottom: 10px;">
            <div class="company-details" style="display: table-cell; width: 50%; vertical-align: bottom; ">
                <!--<img src="{{ asset('logo.png') }}" />-->
                <img src="{{ $logoPath }}" width="120px" height="80px" />


            </div>
            <div class="invoice-title" style="display: table-cell; width: 50%; text-align: right; vertical-align: top;">
                 <div class="customer-details">
                   <h6>Mathews Automotive.Pvt.Ltd</h6>
                    <p>United compound Opposite Gati Getroleum pump Dewas Naka Indore</p>
                    <p>Phone no.: 8962532649</p>
                    <p>Email: automotivemathews@gmail.com</p>
                </div>
            </div>
        
    </div>
    <header>
        <h3>Bill of Supply</h3>
    </header>

  <div class="invoice-header" style="display: table; width: 100%; margin-bottom: 10px;">
            <div class="company-details" style="display: table-cell; width: 50%; vertical-align: top;">
                  <h6>Bill To: {{ $finalbill->customer_name }}</h6>
                <p>Contact Number: {{ $finalbill->contact_number }}</p>
                 <p>Email: {{ $checkin->email }}</p>
            </div>
            <div class="invoice-title" style="display: table-cell; width: 50%; text-align: right; vertical-align: top;">
                 <div class="customer-details">
              
                    <p>Vehicle Reg. No.: {{ $finalbill->vehicle_registration_number }}</p>
                     <p>Invoice Date:{{ now()->format('d-m-Y') }}</p>
                 </div>
        </div>
        
    </div>
   
    <!-- Customer Complaints Section -->
    <div class="complaints-section">
  
        <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Item name</th>
            <th>HSN/ SAC </th>
            <th>Quantity</th>
            
            <th>Price/ unit</th>
            <th>Amount</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach ($purchases as $index => $purchase)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $purchase->name_of_parts }}</td>
                <td></td>
                <td>{{ $purchase->qty }}</td>
                <td>{{ number_format($purchase->selling_price, 2) }}</td>
                <td>{{ number_format($purchase->qty * $purchase->selling_price, 2) }}</td>

            </tr>
        @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td colspan="2"><strong>{{ $totalQuantity }}</strong></td>
        <td><strong>{{ number_format($totalAmount, 2) }}</strong></td>
    </tr>
</tfoot>

    
</table>
  <div class="invoice-header" style="display: table; width: 100%; margin-bottom: 20px;">
            <div class="company-details" style="display: table-cell; width: 50%; vertical-align: top;">
                <div>
                    <div style="background-color:#c5060e; color:#fff; margin-right:10px; padding-left:5px;"><strong>Invoice Amount In Words</strong></div>
                    <p style="padding-left:5px;padding-right:5px;">{{ $amountInWords }} Rupees only</p>
                    
                    <div style="background-color:#c5060e; color:#fff; margin-right:10px; margin-top:10px; padding-left:5px;"><strong>Terms and Conditions</strong></div>
                    <p style="padding-left:5px;padding-right:5px;">Thank you for doing business with us.</p>
                </div>
            </div>
            <div class="invoice-title" style="display: table-cell; width: 50%; text-align: right; vertical-align: top;">
                 <div class="customer-details">
              
                 <div>
    <div style="background-color:#c5060e; color:#fff;text-align:left; padding-left:5px;">
        <strong>Amounts</strong>
    </div>
    <table class="table table-bordered text-center" style="padding-top:0px; margin-top:0px;">
        <tr>
            <td>Sub Total</td>
            <td style="font-size:13px;">{{ number_format($totalAmount, 2) }}</td>
        </tr>
        <tr>
            <td>Received</td>
            <td style="font-size:13px;">{{ number_format($advanceAmount, 2) }}</td> <!-- Access the advanceAmount directly -->
        </tr>
        <tr>
            <td><strong>Balance</strong></td>
            <td><strong>{{ number_format($balanceAmount, 2) }}</strong></td> <!-- Balance calculation -->
        </tr>
    </table>
</div>

                    
                   <p class="text-end">For: Mathews Automotive.Pvt.Ltd</p>
                   <p class="text-end" style="padding-top: 20px;">________________________<br>Authorized Signatory</p>
            </div>
        </div>
        
    </div>

       
        <header style="padding-bottom:0px; margin-bottom:0px;">
       
        </header>
       <div style="text-align: center; margin-top: 0px;">
           
            <p style="font-size:14px; padding-bottom:0px;padding-top:0px;">Acknowledgment</p>
            <p style="color:#c5060e;  padding-top:2px;"><strong>Mathews Automotive.Pvt.Ltd</strong></p>
        </div>

     
              <div class="invoice-header" style="display: table; width: 100%; margin-bottom: 10px;">
                    <div class="company-details" style="display: table-cell; width: 50%; vertical-align:bottom;">
                               <p><strong>Invoice To:</strong><br>{{ $finalbill->customer_name }}</p>
                        </div>
                        <div class="invoice-title" style="display: table-cell; width: 50%; text-align:center; vertical-align:bottom;">
                             <div class="customer-details">
                          
                                   <p><strong>Invoice Details:</strong><br>Invoice No.: {{ $finalbill->vehicle_registration_number }}<br>Invoice Date:{{ now()->format('d-m-Y') }}<br>Invoice Amount: {{ number_format($totalAmount, 2) }}</p>
               

                    </div>
                      </div>
                            <div class="invoice-title" style="display: table-cell; width: 50%; text-align: right; vertical-align: bottom;">
                                <div class="customer-details">
                          
                                   <p class="text-end">________________________</p>
                                   
                                   <p class="text-end " style="padding-top: 10px;">Receiver’s Seal & Sign</p>
                                  
                
                            </div>
                    </div>
                    
                </div>
        

    </div>

</body>
</html>

