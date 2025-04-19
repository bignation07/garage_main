@extends('layouts.admin')

@section('content')
<style>
    .dashboard-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        font-weight: bold;
        font-size: 1.1rem;
        background-color: #f8f9fa;
    }

    .table thead th {
        background-color: #343a40;
        color: white;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
    }

    h2.mb-4 {
        font-weight: bold;
        color: #2c3e50;
    }

    .card-body h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .icon-left {
        margin-right: 10px;
    }
</style>

<div class="container">
    <h2 class="mb-4">🚗 Garage Dashboard</h2>

    <!-- Summary Cards -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary dashboard-card">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-clipboard-list fa-2x icon-left"></i>
                    <div>
                        <h5>Total Vehicle Check-ins</h5>
                        <h2>{{ $totalCheckins }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger dashboard-card">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle fa-2x icon-left"></i>
                    <div>
                        <h5>Total Complaints</h5>
                        <h2>{{ $totalComplaints }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success dashboard-card">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-tools fa-2x icon-left"></i>
                    <div>
                        <h5>Total Job Cards</h5>
                        <h2>{{ $totalJobCards }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Graphs -->
    <div class="row mb-4">
        <div class="card mb-4 dashboard-card col-md-6">
            <div class="card-header"><i class="fas fa-chart-bar icon-left"></i>Complaint Types</div>
            <div class="card-body">
                <canvas id="complaintChart"></canvas>
            </div>
        </div>

        <div class="card mb-4 dashboard-card col-md-6">
            <div class="card-header"><i class="fas fa-cogs icon-left"></i>Service Types</div>
            <div class="card-body">
                <canvas id="serviceTypeChart"></canvas>
            </div>
        </div>
    </div>

    <div class="card mb-4 dashboard-card">
        <div class="card-header text-danger"><i class="fas fa-truck-loading icon-left"></i>🚨 Delivery Alerts</div>
        <div class="card-body">
            @if($pendingDeliveries->isEmpty())
                <p class="text-success">✅ No pending deliveries today or overdue.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Vehicle No.</th>
                            <th>Expected Delivery</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendingDeliveries as $job)
                            <tr class="table-warning">
                                <td>{{ $job->vehicleCheckin->customer_name ?? '-' }}</td>
                                <td>{{ $job->vehicleCheckin->vehicle_registration_number ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($job->expected_delivery_date)->format('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="row mb-4">
        <div class="card mb-4 dashboard-card col-md-6">
            <div class="card-header"><i class="fas fa-users icon-left"></i>Employee Attendance</div>
            <div class="card-body">
                <canvas id="attendanceChart"></canvas>
            </div>
        </div>

        <div class="card mb-4 dashboard-card col-md-6">
            <div class="card-header"><i class="fas fa-calendar-day icon-left"></i>Leave Types</div>
            <div class="card-body">
                <canvas id="leaveChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Delivery Alerts -->
</div>

<!-- Chart.js + Font Awesome -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<script>
    // Complaint Types
    new Chart(document.getElementById('complaintChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($complaintCounts)) !!},
            datasets: [{
                label: 'Complaints',
                data: {!! json_encode(array_values($complaintCounts)) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.7)',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Service Types
    new Chart(document.getElementById('serviceTypeChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_keys($serviceTypes)) !!},
            datasets: [{
                data: {!! json_encode(array_values($serviceTypes)) !!},
                backgroundColor: ['#36A2EB', '#FFCE56', '#FF6384', '#4BC0C0'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });

    // Attendance
    new Chart(document.getElementById('attendanceChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($attendanceData)) !!},
            datasets: [{
                label: 'Days Present',
                data: {!! json_encode(array_values($attendanceData)) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });

    // Leave Types
    new Chart(document.getElementById('leaveChart').getContext('2d'), {
        type: 'pie',
        data: {
            labels: {!! json_encode(array_keys($leaveData)) !!},
            datasets: [{
                data: {!! json_encode(array_values($leaveData)) !!},
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#9966FF'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection
