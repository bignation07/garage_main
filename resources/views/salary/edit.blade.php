@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Edit Salary Details</h2>
    <div class="card shadow-lg p-4">
        <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="employee_name" class="form-label">Employee Name</label>
                        <input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ $salary->employee_name }}" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{ $salary->employee_id }}" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <input type="text" class="form-control" id="department" name="department" value="{{ $salary->department }}" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="basic_salary" class="form-label">Basic Salary</label>
                        <input type="number" class="form-control" id="basic_salary" name="basic_salary" value="{{ $salary->basic_salary }}" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="attendance" class="form-label">Attendance</label>
                        <input type="number" class="form-control" id="attendance" name="attendance" value="{{ $salary->attendance }}" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="overtime_hours" class="form-label">Overtime Hours</label>
                        <input type="number" class="form-control" id="overtime_hours" name="overtime_hours" value="{{ $salary->overtime_hours }}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="deductions" class="form-label">Deductions</label>
                        <input type="number" class="form-control" id="deductions" name="deductions" value="{{ $salary->deductions }}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="payment_status" class="form-label">Payment Status</label>
                        <select class="form-select" id="payment_status" name="payment_status">
                            <option value="Pending" {{ $salary->payment_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Paid" {{ $salary->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="payment_mode" class="form-label">Payment Mode</label>
                        <select class="form-select" id="payment_mode" name="payment_mode">
                            <option value="Cash" {{ $salary->payment_mode == 'Cash' ? 'selected' : '' }}>Cash</option>
                            <option value="Bank Transfer" {{ $salary->payment_mode == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                            <option value="UPI" {{ $salary->payment_mode == 'UPI' ? 'selected' : '' }}>UPI</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success w-100">Update</button>
        </form>
    </div>
</div>
@endsection
