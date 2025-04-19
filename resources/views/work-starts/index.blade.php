@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Work Start Entries</h2>
    <div class="d-flex justify-content-between">
        
        <a href="{{ route('work-starts.create') }}" class="btn btn-primary mb-3">Start New Work</a>
         <!-- Search Form -->
        <form action="{{ route('work-starts.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Job Card Number, Mechanic Assigned, or Parts Purchased">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div style="overflow-x: auto;">
    <table class="table table-bordered ">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Job Card</th>
                <th>Mechanic Assigned</th>
                <th>Parts Purchased</th>
                <th>Total Cost</th>
                <th>Service Charge</th>
                <th>Margin</th>
                <th>Status</th>
                <th>Customer Notified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workStarts as $index => $work)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $work->jobCard->job_card_number }}</td>
                <td>{{ $work->mechanic_assigned }}</td>
                <td>{{ $work->parts_purchased }}</td>
                <td>{{ $work->total_parts_cost }}</td>
                <td>{{ $work->estimated_service_charge }}</td>
                <td>{{ $work->margin_calculation }}</td>
                <td>{{ $work->status }}</td>
                <td>{{ $work->customer_notification_sent ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('work-starts.edit', $work->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <!--<form action="{{ route('work-starts.destroy', $work->id) }}" method="POST" style="display:inline-block;">-->
                    <!--    @csrf-->
                    <!--    @method('DELETE')-->
                    <!--    <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash-alt"></i></button>-->
                    <!--</form>-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
  <!-- Pagination Section -->
    <div class="d-flex justify-content-between">
        <div>
            Showing {{ $workStarts->firstItem() }} to {{ $workStarts->lastItem() }} of {{ $workStarts->total() }} entries.
        </div>
        <div>
            {{ $workStarts->links() }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
