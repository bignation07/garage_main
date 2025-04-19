@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="shadow ps-3 pe-3 pt-2 bg-dark mb-3">
        
        <h2 class="text-light">Drawback Issues List</h2>
        <div class="d-flex justify-content-between  ">
            
            <a href="{{ route('drawbacks.create') }}" class="btn btn-primary mb-3">Add Drawback Issue</a>
              <!-- Search Form -->
            <form action="{{ route('drawbacks.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Issue Name, Mechanic Notes, or Customer Name">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div style="overflow-x: auto;">
        <table class="table table-bordered ">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Vehicle Check-in</th>
                    <th>Issue Name</th>
                    <th>Severity</th>
                    <th>Additional Repairs</th>
                    <th>Mechanic Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($drawbacks as $index => $drawback)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $drawback->vehicleCheckin->customer_name }} - {{ $drawback->vehicleCheckin->vehicle_registration_number }}</td>
                    <td>{{ $drawback->issue_name }}</td>
                    <td>{{ $drawback->issue_severity }}</td>
                    <td>{{ $drawback->additional_repairs }}</td>
                    <td>{{ $drawback->mechanic_notes }}</td>
                    <td>
                        <a href="{{ route('drawbacks.edit', $drawback->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> </a>
                        <form action="{{ route('drawbacks.destroy', $drawback->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
  <!-- Pagination Section -->
    <div class="d-flex justify-content-between">
        <div>
            Showing {{ $drawbacks->firstItem() }} to {{ $drawbacks->lastItem() }} of {{ $drawbacks->total() }} entries.
        </div>
        <div>
            {{ $drawbacks->links() }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
