@extends('layouts.admin')

@section('content')
<div class="container ">
    <h2 class="mb-2">Salary Management</h2>
    <div class="d-flex justify-content-between mb-2">
        <a href="/salaries/create" class="btn btn-primary ">Add Salary</a>
        
        <!-- Search Form -->
        <form method="GET" action="{{ route('salaries.index') }}" class="d-flex align-items-center">
            <input type="text" name="search" class="form-control form-control" placeholder="Search by Employee Name, ID, or Department" value="{{ $query ?? '' }}" style="max-width: 300px;">
            <button type="submit" class="btn btn-primary ml-2 ">Search</button>
        </form>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Employee ID</th>
                        <th>Department</th>
                        <th>Basic Salary</th>
                        <th>Net Salary</th>
                        <th>Payment Status</th>
                        <th>Payment Mode</th>
                        <th>Action</th>
                        <th>PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaries as $key => $salary)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $salary->employee_name }}</td>
                            <td>EMP00{{ $salary->employee_id }}</td>
                            <td>{{ $salary->department }}</td>
                            <td>{{ number_format($salary->basic_salary, 2) }}</td>
                            <td>{{ number_format($salary->net_salary, 2) }}</td>
                            <td>{{ $salary->payment_status }}</td>
                            <td>{{ $salary->payment_mode }}</td>
                            <td>
                                <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-warning btn-sm rounded-pill">Edit</a>
                            </td>
                            <td>
                                <a href="{{ route('salaries.download', $salary->id) }}" class="btn btn-success btn-sm rounded-pill">
                                    <i class="fas fa-download"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-end mt-3 ">
                {{ $salaries->appends(['search' => $query])->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
