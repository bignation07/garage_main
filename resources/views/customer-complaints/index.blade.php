@extends('layouts.admin')

@section('content')
    <div class="container mb-4">
        <!-- Title and Search Bar -->
       <!-- Title and Search Bar -->
        <div class="d-flex justify-content-between align-items-center  p-3  bg-dark shadow-md ">
            <div>
                
                <h2 class="text-light font-weight-bold">Customer Complaints Overview</h2>
                <a href="{{ route('customer-complaints.create') }}" class="btn btn-primary btn-sm rounded-pill">
                    <i class="fas fa-plus"></i> Add Complaint
                </a>
            </div>

            
               <form method="GET" action="{{ route('customer-complaints.index') }}" class="d-flex align-items-center">
                     <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request('search') }}" style="max-width: 300px;">
                        <button type="submit" class="btn btn-outline-primary">Search</button>
                        
                    </div>
                </form>
        </div>


        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

       
       @php
    // Group complaints by 'Customer Name - Vehicle Registration Number'
    $complaintsGrouped = $complaints->groupBy(function($complaint) {
        return $complaint->vehicleCheckin->customer_name . ' - ' . $complaint->vehicleCheckin->vehicle_registration_number;
    });
@endphp


        @foreach ($complaintsGrouped as $customerName => $customerComplaints)
            <div class="mt-4 shadow-md  border border-light bg-light">
                
               <div class="d-flex justify-content-between align-items-center mb-0 p-2" style="border: solid 1px #e7e4e4;">
                    <h6 class="text-dark fw-bold text-secondary">{{ $customerName }} - Complaints</h6>
                    @php
                        // Get the checkin ID of the first complaint to use for the download link
                        $checkinId = $customerComplaints->first()->vehicleCheckin->id;
                    @endphp
                    <a href="{{ route('complaints.download-customer', $checkinId) }}" class="btn btn-primary btn-sm rounded-pill">
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>
               

                <!-- Table to display complaint details -->
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Complaint Type</th>
                            <th>Previous Repairs Done?</th>
                            <th>Urgency Level</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerComplaints as $index => $complaint)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $complaint->description }}</td>
                                <td>{{ $complaint->complaint_type }}</td>
                                <td>{{ $complaint->previous_repairs_done ? 'Yes' : 'No' }}</td>
                                <td>{{ $complaint->urgency_level }}</td>
                                <td>
                                    <a href="{{ route('customer-complaints.edit', $complaint->id) }}" class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                    <!--<form action="{{ route('customer-complaints.destroy', $complaint->id) }}" method="POST" style="display:inline;">-->
                                    <!--    @csrf-->
                                    <!--    @method('DELETE')-->
                                    <!--    <button type="submit" class="btn btn-danger btn-sm rounded-pill">-->
                                    <!--        <i class="fas fa-trash-alt"></i> -->
                                    <!--    </button>-->
                                    <!--</form>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- If no complaints are found for this customer -->
                @if ($customerComplaints->isEmpty())
                    <div class="alert alert-warning text-center">
                        No complaints found for this customer.
                    </div>
                @endif
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-end mt-3 ">
            {{ $complaints->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <style>
    
      @media (max-width: 468px) {
       .sidebar{
           height:200vh;
       }
      }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
            color: #495057;
        }

        /*.btn {*/
        /*    border-radius: 30px;*/
        /*    padding: 8px 20px;*/
        /*}*/

        .container {
            max-width: 1200px;
        }

        h1 {
            font-size: 28px;
            color: #343a40;
            font-weight: 600;
        }

        h3 {
            font-size: 22px;
            color: #007bff;
            /*padding-bottom: 10px;*/
            /*margin-bottom: 20px;*/
        }

        .alert-dismissible .btn-close {
            padding: .2rem .5rem;
            font-size: 1.2rem;
        }

        .rounded-pill {
            border-radius: 50px !important;
        }

        .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .btn i {
            /*margin-right: 5px;*/
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
    </style>
@endsection
