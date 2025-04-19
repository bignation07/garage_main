@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="shadow ps-3 pe-3 pt-2 bg-dark mb-3">
       <h2 class="text-light">Drawback Parts List</h2>
       <div class="d-flex justify-content-between ">
        
        <a href="{{ route('drawback-parts.create') }}" class="btn btn-primary mb-3">Add Drawback Part</a>
          <!-- Search Form -->
        <form action="{{ route('drawback-parts.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Issue Name, Part Number, or Spare Part">
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
                <th>Issue Name</th>
                <th>Spare Part Needed</th>
                <th>Part Number</th>
                <th>Estimated Cost</th>
                <th>Availability</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drawbackParts as $index => $part)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $part->issue_name }}</td>
                <td>{{ $part->spare_part_needed }}</td>
                <td>{{ $part->part_number }}</td>
                <td>{{ $part->estimated_cost }}</td>
                <td>{{ $part->parts_availability }}</td>
                <td>
                    <a href="{{ route('drawback-parts.edit', $part->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> </a>
                    <!--<form action="{{ route('drawback-parts.destroy', $part->id) }}" method="POST" style="display:inline-block;">-->
                    <!--    @csrf-->
                    <!--    @method('DELETE')-->
                    <!--    <button type="submit" class="btn btn-sm btn-danger">Delete</button>-->
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
            Showing {{ $drawbackParts->firstItem() }} to {{ $drawbackParts->lastItem() }} of {{ $drawbackParts->total() }} entries.
        </div>
        <div>
            {{ $drawbackParts->links() }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
