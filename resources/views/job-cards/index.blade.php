@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="bg-dark p-3 text-light">
        
           <h2 class="">Job Cards List</h2>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-between">
            <!-- Search Form -->
            <a href="{{ route('job-cards.create') }}" class="btn btn-primary mb-3">Add New Job Cards</a>
            <form action="{{ route('job-cards.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Customer or Vehicle">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!--<a href="{{ route('job-cards.create') }}" class="btn btn-primary mb-3">Add New Job Cards</a>-->
    <div style="overflow-x: auto;">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Customer Name</th>
                    <th>Vehicle Reg. No.</th>
                    <th>Service Advisor</th>
                    <th>Mechanic</th>
                    <th>Expected Delivery</th>
                    <th>Fuel Level</th>
                    <!--<th>Estimated Cost</th>-->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jobCards as $index => $jobCard)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                    
                        <td>{{ $jobCard->vehicleCheckin ? $jobCard->vehicleCheckin->customer_name : 'N/A' }}</td>
                        <td>{{ $jobCard->vehicleCheckin ? $jobCard->vehicleCheckin->vehicle_registration_number : 'N/A' }}</td>
                    
                    
                        <td>{{ $jobCard->service_advisor }}</td>
                        <td>{{ $jobCard->mechanic }}</td>
                        <td>{{ $jobCard->expected_delivery_date }}</td>
                        <td>{{ ucfirst($jobCard->fuel_level) }}</td>
                        
                        <td>
                            <!-- <a href="{{ route('job-cards.show', $jobCard->id) }}" class="btn btn-info btn-sm">View</a> -->
                            <a href="{{ route('job-cards.edit', $jobCard->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <!--<form action="{{ route('job-cards.destroy', $jobCard->id) }}" method="POST" style="display:inline;">-->
                            <!--    @csrf-->
                            <!--    @method('DELETE')-->
                            <!--    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash-alt"></i></button>-->
                            <!--</form>-->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
      <div class="d-flex justify-content-between">
        <div>
            Showing {{ $jobCards->firstItem() }} to {{ $jobCards->lastItem() }} of {{ $jobCards->total() }} entries.
        </div>
        <div>
            {{ $jobCards->links('pagination::bootstrap-4') }} <!-- Pagination links -->
        </div>
    </div>
</div>
@endsection
