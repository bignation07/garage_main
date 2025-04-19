@extends('layouts.admin')

@section('content')
<div class="container">
       @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
       @endif
    <!-- Search Filter Section -->
    <div class="d-flex justify-content-between align-items-center p-3 shadow-lg bg-dark text-light mb-4">
        <div>
            <h2 class=" text-light">Employee Leave Management</h2>
        
         
            
            <!-- Button to trigger the modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#leaveModal">
                Request Leave
            </button>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('leave.index') }}" class="d-flex align-items-center">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Search by Employee or Leave Type">
                <button type="submit" class="btn btn-outline-secondary">Search</button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="leaveModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="leaveModalLabel">Leave Request Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('leave.store') }}" method="POST" class="p-4 shadow rounded bg-light leave-form">
                        @csrf
                        <div class="row">
                            @if(auth()->user()->role === 'admin')
                            <!-- Admin: Can select employee -->
                            <div class="col-md-4 col-sm-12 mb-3">
                                <label class="form-label fw-bold">Employee Name:</label>
                                <select name="employee_name" class="form-select" required id="employeeSelect">
                                    <option value="">Select Employee</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->name }}" data-employee-id="{{ $employee->id }}">
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" id="employee_id" name="employee_id">
                            @else
                            <!-- User Role: Auto-fill and readonly -->
                            <div class="col-md-4 col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Employee Name:</label>
                                    <input type="text" name="employee_name" class="form-control" value="{{ $employee_name }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12" style="display: none;">
                                <div class="form-group">
                                    <label>Employee ID:</label>
                                    <input type="hidden" name="employee_id" class="form-control" value="{{ $employee_id }}">
                                </div>
                            </div>
                            @endif

                            <!-- Script to update the hidden employee ID field -->
                            <script>
                                document.getElementById('employeeSelect')?.addEventListener('change', function() {
                                    const selectedOption = this.options[this.selectedIndex];
                                    const employeeId = selectedOption.getAttribute('data-employee-id');
                                    document.getElementById('employee_id').value = employeeId;
                                });
                            </script>

                            <div class="col-md-4 col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Leave Type:</label>
                                    <select name="leave_type" class="form-control" required>
                                        <option value="Casual">Casual</option>
                                        <option value="Sick">Sick</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Unpaid</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Leave Start Date:</label>
                                    <input type="date" name="leave_start_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-3">
                                <div class="form-group">
                                    <label>Leave End Date:</label>
                                    <input type="date" name="leave_end_date" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit Leave Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--<hr>-->

    <!--<h3 class="mb-3">Leave Records</h3>-->

    <!-- Table to Display Leave Records -->
    <div style="overflow-x: auto; ">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Employee Name</th>
                    <th>Employee ID</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Days</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaves as $index => $leave)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $leave->employee_name }}</td>
                    <td>EMP00{{ $leave->employee_id }}</td>
                    <td>{{ $leave->leave_type }}</td>
                    <td>{{ $leave->leave_start_date }}</td>
                    <td>{{ $leave->leave_end_date }}</td>
                    <td>{{ $leave->total_days_requested }}</td>

                    @if(auth()->user()->role === 'admin')
                    <td>
                        <form action="{{ route('leave.update', $leave->id) }}" method="POST">
                            @csrf
                            <select name="leave_approval_status" class="form-control">
                                <option value="Pending" {{ $leave->leave_approval_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approved" {{ $leave->leave_approval_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Rejected" {{ $leave->leave_approval_status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <button type="submit" class="btn btn-success mt-1">Update</button>
                        </form>
                    </td>
                    @else
                    <td>
                        <span>{{ $leave->leave_approval_status }}</span>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-end mt-3">
            {{ $leaves->appends(request()->query())->links('pagination::bootstrap-4') }}
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
@endsection
