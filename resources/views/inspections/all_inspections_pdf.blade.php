<!DOCTYPE html>
<html>
<head>
    <title>All Vehicle Inspections</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2 style="text-align: center;">All Vehicle Inspections Report</h2>

    @foreach($checkins as $checkin)
        <h3>Customer: {{ $checkin->customer_name }} (Check-in ID: {{ $checkin->id }})</h3>
        <table>
            <thead>
                <tr>
                    <th>Inspection Item</th>
                    <th>Check</th>
                    <th>Deficiencies</th>
                    <th>Services Performed</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checkin->inspections as $inspection)
                    <tr>
                        <td>{{ $inspection->inspection_item }}</td>
                        <td>{{ $inspection->check ? '✔' : '✘' }}</td>
                        <td>{{ $inspection->deficiencies }}</td>
                        <td>{{ $inspection->services_performed }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4>Complaints:</h4>
        <ul>
            @foreach($checkin->customerComplaints as $complaint)
                <li>{{ $complaint->complaint_details }}</li>
            @endforeach
        </ul>

        <hr>
    @endforeach

</body>
</html>
