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
            padding: 10px;
            border-bottom: 2px solid #007bff;
        }

        header h4 {
            margin: 0;
            color: #007bff;
        }

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
            padding: 4px;
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
            <!--<p>Vehicle Reg. No.: {{ $checkin->vehicle_registration_number }}</p>-->
            <p>Check-in Date: {{ $checkin->arrival_datetime }}</p>
            <!--<p>Check-in Date: {{ $checkin->created_at->format('d-m-Y') }}</p>-->

        </div>
    </div>
</div>
<header>
    <h4>Work Assignments Report</h4>
</header>

<div class="vehicle-info" style="display: flex; align-items: center; justify-content: space-between; padding: 10px; background-color: #f1f1f1; border-radius: 5px; margin-bottom: 15px; width: 100%; text-align: center;">
    <span style="font-weight: bold; color: #007bff; margin-right: 10px;">Model:</span>
    <span style="margin-right: 20px;">{{ $checkin->make_model }}</span>

    <span style="font-weight: bold; color: #007bff; margin-right: 10px; margin-left: 10px;">Year:</span>
    <span>{{ $checkin->year_of_manufacture }}</span>
    <span style="font-weight: bold; color: #007bff; margin-right: 10px; margin-left: 10px;">Vehicle Reg. No.:</span>
    <span>{{ $checkin->vehicle_registration_number }}</span>
</div>

<div class="complaints-section">
    @foreach($workAssignments as $customerId => $assignments)
    
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                 
                    <th>Work</th>
                    <th>Mechanic</th>
                    <th>Completed</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $index => $assignment)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                    
                        <td>{{ $assignment->name_of_work }}</td>
                        <td>{{ $assignment->mechanic }}</td>
                        <td>{{ $assignment->completed ? 'Yes' : 'No' }}</td>
                        <td>{{ $assignment->result }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>

<footer>
    <p>&copy; {{ date('Y') }} Big Nation 7 Infotech. All rights reserved.</p>
</footer>

</body>
</html>
