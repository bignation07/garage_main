@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-md border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">Employee List</h3>
            <a href="{{ route('employees.create') }}" class="btn btn-light fw-bold">
                <i class="fas fa-user-plus"></i> Add Employee Salary
            </a>
          

            
        </div>
        <div class="card-body">
            <table class="table table-hover table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->user->name }}</td>
                        <td>{{ $employee->user->email }}</td>
                        <td><strong>₹{{ number_format($employee->salary, 2) }}</strong></td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Salary Table with Month Selection -->
    <div class="container shadow-md mt-4 p-4">
        <h2>Employee Salary List</h2>
        
        <!-- Month Selector -->
        <form method="GET" action="{{ route('employees.index') }}" class="mb-3">
            <label for="month">Select Month:</label>
            <input type="month" id="month" name="month" class="form-control w-25 d-inline" value="{{ $selectedMonth }}">
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee Name</th>
                    <th>Base Salary (Per Month)</th>
                    <th>Total Month days</th>
                    <th>Present Days</th>
                    <th>Half-day</th>
                    <th>Leave Days</th>
                    <th>Final Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $index => $employee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $employee->user->name }}</td>
                        <td>₹{{ number_format($employee->salary, 2) }}</td>
                        <td>{{ $employee->daysInMonth }}</td>
                        <td>{{ $employee->present_days ?? 0 }}</td>
                        <td>{{ $employee->half_days }}</td>
                        <td>{{ $employee->leave_days ?? 0 }}</td>
                        <td>₹{{ number_format($employee->final_salary, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
