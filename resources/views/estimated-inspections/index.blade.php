@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Estimated Inspections</h2>
    <div class="d-flex justify-content-between">
        <a href="{{ route('estimated-inspections.create') }}" class="btn btn-primary mb-3">Add Inspection</a>
        <!-- Search Form -->
        <form action="{{ route('estimated-inspections.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Customer or Vehicle">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

    </div>

    <div style="overflow-x: auto;">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Vehicle Check-in</th>
                    <th>Report</th>
                    <th>Estimated Cost</th>
                    <th>Approval Status</th>
                    <th>Approval Method</th>
                    <th>Approval Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inspections as $index => $inspection)
                <tr>
                    <td>{{ $inspections->firstItem() + $index }}</td>
                    <td>{{ $inspection->vehicleCheckin->customer_name }}</td>
                    <td>{{ $inspection->inspection_report }}</td>
                    <td>₹{{ number_format($inspection->estimated_cost, 2) }}</td> <!-- Format Estimated Cost -->
                    <td>{{ $inspection->approval_status }}</td>
                    <td>{{ $inspection->customer_approval_method }}</td>
                    <td>{{ $inspection->approval_date_time }}</td>
                    <td>
                        <a href="{{ route('estimated-inspections.edit', $inspection->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between">
        <div>
            Showing {{ $inspections->firstItem() }} to {{ $inspections->lastItem() }} of {{ $inspections->total() }} entries.
        </div>
        <div>
            {{ $inspections->links() }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
