<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Checklist</title>
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
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #007bff;
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
            margin: 20px 0;
        }

        .table th, .table td {
            padding: 4px 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        h3 {
            margin: 15px 0;
            color: #343a40;
        }

        .complaints-section h3 {
            color: #dc3545;
        }

        .summary {
            margin: 20px 0;
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 5px;
        }

        

        footer {
            text-align: center;
            margin-top: 30px;
            padding: 10px;
            font-size: 12px;
            color: #666;
            border-top: 1px solid #ddd;
        }
    </style>
</head>
<body>

    
    <div class="invoice-header" style="display: table; width: 100%; margin-bottom: 20px;">
        <div class="company-details" style="display: table-cell; width: 50%; vertical-align: top;">
            <h6>Mathews Automotive.Pvt.Ltd</h6>
            <p>United compound Opposite Gati Getroleum pump Dewas Naka Indore</p>
            <p>Phone no.: 8962532649</p>
            <p>Email: automotivemathews@gmail.com</p>
        </div>
        




        <div class="invoice-title" style="display: table-cell; width: 50%; text-align: right; vertical-align: top;">
             <div class="customer-details">
            <h6>Customer Name: {{ $checkin->customer_name }}</h6>
            <p>Contact Number: {{ $checkin->contact_number }}</p>
            <p>Email: {{ $checkin->email }}</p>
            <p>Vehicle Reg. No.: {{ $checkin->vehicle_registration_number }}</p>
            <p>Check-in Date: {{ $checkin->arrival_datetime }}</p>

            <!--<p>Check-in Date: {{ $checkin->checkin_date }}</p>-->
        </div>
        </div>
    </div>
    <header>
        <h4>inspections</h4>
    </header>


    <!-- Customer Complaints Section -->
    <div class="complaints-section">
        <!--<h3>Customer Complaints</h3>-->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Complaint Type</th>
                    <th>Previous Repairs Done?</th>
                    <th>Urgency Level</th>
                </tr>
            </thead>
            <tbody>
                 @php
                    $totalServices = 0;
                @endphp
                @foreach ($customerComplaints as $index => $inspection)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                     
                           <td>{{ $inspection->inspection_item }}</td>
                            <td>{{ $inspection->check ? 'yes' : 'no' }}</td>
                            <td>{{ $inspection->deficiencies }}</td>
                            <td>{{ $inspection->services_performed }}</td>
                    </tr>
                     @php
                        // Agar services_performed number hai toh add karo, warna 0
                        $totalServices += is_numeric($inspection->services_performed) ? $inspection->services_performed : 0;
                    @endphp
                @endforeach
                  <!-- Total Row -->
                <tr>
                    <td colspan="4" style="text-align: left;"><strong>Total Estimated Price:</strong></td>
                    <td><strong>{{ $totalServices }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- PDF Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Big Nation 7 Infotech. All rights reserved.</p>
    </footer>

</body>
</html>
