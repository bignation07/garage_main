<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $checkin->customer_name }}'s Vehicle Checklist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            text-align: center;
            border-top: 2px solid #000;
        }
        .header h1 {
            margin: 0;
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
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            border-top: 2px solid #000; /* Added border to footer */
            padding-top: 10px;
        }

        /* Ensuring page break after long content */
        @media print {
            body {
                page-break-before: always;
            }
            .footer {
                page-break-after: always;
            }
        }

        /* Optional: You can add a page break after tables or content if you need */
        .page-break {
            page-break-before: always;
        }

    </style>
</head>
<body>

    <div class="invoice-header" style="display: table; width: 100%; margin-bottom: 20px;">
        <div class="company-details" style="display: table-cell; width: 50%; vertical-align: top;">
            <h6>Company Name</h6>
            <p>1234, Main Street, Indore</p>
            <p>Phone: 9876543210</p>
            <p>Email: info@company.com</p>
        </div>
        <div class="invoice-title" style="display: table-cell; width: 50%; text-align: right; vertical-align: top;">
            <div class="customer-details">
                <h6>Customer Name: {{ $checkin->customer_name }}</h6>
                <p>Contact Number: {{ $checkin->contact_number }}</p>
                <p>Email: {{ $checkin->email }}</p>
                <p>Vehicle Reg. No.: {{ $checkin->vehicle_registration_number }}</p>
                <p>Check-in Date: {{ $checkin->checkin_date }}</p>
            </div>
        </div>
    </div>

    <header style="border-top: 2px solid #000; padding-top: 10px;">
        <h4 class="text-center">Vehicle Checklist</h4>
    </header>


    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Part Name</th>
                <th>Quantity</th>
                <th>Rate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($checklists as $index => $checklist)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $checklist->category }}</td>
                    <td>{{ $checklist->part_name }}</td>
                    <td>{{ $checklist->qty }}</td>
                    <td>{{ $checklist->rate }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($checklists->isEmpty())
        <p>No checklists available for this customer.</p>
    @endif

    <div class="footer">
        <p>Thank you for choosing our service!</p>
    </div>

</body>
</html>
