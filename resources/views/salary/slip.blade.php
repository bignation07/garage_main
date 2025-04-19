<!DOCTYPE html>
<html>
<head>
    <title>Salary Slip</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { padding: 8px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        h2, h4 { text-align: center; margin: 10px 0; }
    </style>
</head>
<body>
    <h2>Salary Slip</h2>
    <h4>Employee Name: {{ $salary->employee_name }}</h4>
    <h4>Employee ID: {{ $salary->employee_id }}</h4>
    <table>
        <tr><th>Department</th><td>{{ $salary->department }}</td></tr>
        <tr><th>Basic Salary</th><td>{{ $salary->basic_salary }}</td></tr>
        <tr><th>Attendance</th><td>{{ $salary->attendance }}</td></tr>
        <tr><th>Overtime Hours</th><td>{{ $salary->overtime_hours }}</td></tr>
        <tr><th>Deductions</th><td>{{ $salary->deductions }}</td></tr>
        <tr><th>Net Salary</th><td>{{ $salary->net_salary }}</td></tr>
        <tr><th>Payment Status</th><td>{{ $salary->payment_status }}</td></tr>
        <tr><th>Payment Mode</th><td>{{ $salary->payment_mode }}</td></tr>
    </table>
</body>
</html>
