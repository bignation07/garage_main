@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="shadow ps-3 pe-3 pt-2 bg-dark text-light mb-4">
        <h2>Final Bills</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-between">
            
            <a href="{{ route('final-bills.create') }}" class="btn btn-primary mb-3">Add Final Bill</a>
            <!-- Filter Form -->
            <form action="{{ route('final-bills.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Customer Name, Vehicle Registration, or Service Details">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div style="overflow-x: auto;">
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Customer Name</th>
                <th>Vehicle Registration</th>
                <th>Service Details</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($finalBills as $index => $bill)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $bill->customer_name }}</td>
                <td>{{ $bill->vehicle_registration_number }}</td>
                <td>{{ $bill->service_details }}</td>
              
                <td>
                 
                    <a href="{{ route('final-bills.download', $bill->id) }}" class="btn btn-primary btn-sm">
                       <i class="fas fa-download"></i>
                    </a>
                    <a href="{{ route('final-bills.sendSalary-whatsapp', $bill->id) }}" class="btn btn-success btn-sm">
                        <i class="fab fa-whatsapp"></i>
                    </a>

                                     <!-- Edit Button -->
                    <a href="{{ route('final-bills.edit', $bill->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i>
                    </a>
        
                    <!-- Delete Button -->
                    <form action="{{ route('final-bills.destroy', $bill->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this bill?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>



              </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- Pagination Section -->
    <div class="d-flex justify-content-end mt-3">
        <!--<div>-->
        <!--    Showing {{ $finalBills->firstItem() }} to {{ $finalBills->lastItem() }} of {{ $finalBills->total() }} entries.-->
        <!--</div>-->
        <!--<div>-->
        <!--    {{ $finalBills->links() }} <!-- Pagination links -->
        <!--</div>-->
          <div class=" ">
                {{ $finalBills->links('pagination::bootstrap-4') }}
            </div>
    </div>
</div>
@endsection
