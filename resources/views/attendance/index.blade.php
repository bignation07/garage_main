@extends('layouts.admin')

@section('content')
<div class="container mt-2">

    <!-- Search Form -->
    <div class="d-flex justify-content-between p-4 shadow-lg bg-dark ">
        <div>
            
            <h2 class=" mb-2 text-light">Employee Attendance</h2>
        
           
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#attendanceModal">+ Add Attendance</button>
        </div>
        <form method="GET" action="{{ route('attendance.index') }}" class="d-flex align-items-center">
             <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Employee, Date, or Status" value="{{ request('search') }}" style="max-width: 300px;">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
                
            </div>
        </form>
    </div>
 @if(session('success'))
    <div class="alert alert-success fixed-bottom end-0 m-3 p-3" style="width: 300px; z-index: 1050; right:0;">
        {{ session('success') }}
    </div>
@endif


    <!-- Attendance Table -->
    <div style="overflow-x: auto;">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Employee ID</th>
                    <th>Date</th>
                    <th>Check-in Time</th>
                    <th>Check-out Time</th>
                    <th>Total Working Hours</th>
                    <th>Breaks Taken</th>
                    <th>Leave Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $index => $attendance)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $attendance->employee_name }}</td>
                        <td>EMP00{{ $attendance->employee_id }}</td>
                        <td>{{ $attendance->date }}</td>
                        <td>{{ $attendance->check_in_time }}</td>
                        <td>{{ $attendance->check_out_time }}</td>
                        <td>{{ $attendance->total_working_hours }}</td>
                        <td>{{ $attendance->breaks_taken }}</td>
                        <td>{{ $attendance->leave_status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3">
            {{ $attendances->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal for Adding Attendance -->
<div class="modal fade" id="attendanceModal" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
    <!--<div class="modal-dialog">-->
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="attendanceModalLabel">Add Attendance</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
       <form action="{{ route('attendance.store') }}" method="POST" class="p-4 shadow rounded bg-light">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Employee Name:</label>
                @if(auth()->user()->role === 'admin')
                    <!-- Admin: Can select employee -->
                    <select name="employee_name" class="form-select" required id="employeeSelect">
                        <option value="">Select Employee</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->name }}" data-employee-id="{{ $employee->id }}">
                                {{ $employee->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" id="employee_id" name="employee_id">
                @else
                    <!-- User Role: Auto-fill and readonly -->
                    <input type="text" name="employee_name" class="form-control" value="{{ auth()->user()->name }}" readonly>
                    <input type="hidden" name="employee_id" value="{{ auth()->user()->id }}">
                @endif
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Date:</label>
                @if(auth()->user()->role === 'admin')
                    <input type="date" name="date" class="form-control" required>
                @else
                    <input type="date" name="date" class="form-control" value="{{ now()->toDateString() }}" readonly>
                @endif
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold">Check-in Time:</label>
                <input type="time" name="check_in_time" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="form-label fw-bold">Check-out Time:</label>
                <input type="time" name="check_out_time" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Total Working Hours:</label>
                <input type="number" name="total_working_hours" class="form-control" placeholder="Enter working hours">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold">Breaks Taken (Optional):</label>
                <input type="text" name="breaks_taken" class="form-control" placeholder="Enter breaks taken">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label fw-bold">Leave Status:</label>
                <select name="leave_status" class="form-select" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                    <option value="Half-day">Half-day</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">💾 Save Attendance</button>
    </form>

            </div>
        </div>
    </div>
</div>
<style>
    /* Media query for small screens */
    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 100%; /* Adjusts width for smaller screens */
        }
    }
    @media (min-width: 768px) {
        .modal-dialog {
            max-width: 70%; /* Adjusts width for smaller screens */
        }
    }
</style>
<script>
    const employeeSelect = document.getElementById('employeeSelect');
    const employeeIdInput = document.getElementById('employee_id');

    if (employeeSelect) {
        employeeSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const employeeId = selectedOption.getAttribute('data-employee-id');
            employeeIdInput.value = employeeId;
        });
    }
</script>
@endsection
