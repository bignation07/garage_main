@extends('layouts.admin')

@section('content')
    <div class="container mb-4">
        <!-- Title and Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class=" text-dark">Vehicle Checklist & Estimated Overview</h2>
            <a href="{{ route('vehicle-checklist.create') }}" class="btn btn-success  rounded-pill">
                <i class="fas fa-plus-circle"></i> Add New Checklist
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Loop through each checkin (customer) -->
        @foreach ($checkins as $checkin)
            <div class="mb-5 shadow-lg p-4 rounded-lg border border-light bg-light">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3 class="">{{ $checkin->customer_name }} - Vehicle Checklists</h3>
                    <a href="{{ route('vehicle-checklist.download-customer', $checkin->id) }}" class="btn btn-primary rounded-pill">
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>

                <!-- Table to display checklists for this customer -->
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Part Name</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Get the checklists for this customer
                            $customerChecklists = $checklists->where('vehicle_checkin_id', $checkin->id);
                        @endphp

                        @foreach ($customerChecklists as $index => $checklist)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $checklist->category }}</td>
                                <td>{{ $checklist->part_name }}</td>
                                <td>{{ $checklist->qty }}</td>
                                <td>{{ number_format($checklist->rate, 2) }}</td>
                                <td>
                                    <a href="{{ route('vehicle-checklist.edit', $checklist->id) }}" class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!--<form action="{{ route('vehicle-checklist.destroy', $checklist->id) }}" method="POST" style="display:inline;">-->
                                    <!--    @csrf-->
                                    <!--    @method('DELETE')-->
                                    <!--    <button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Are you sure you want to delete this checklist item?')">-->
                                    <!--        <i class="fas fa-trash"></i> Delete-->
                                    <!--    </button>-->
                                    <!--</form>-->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- If no checklists are found for this customer -->
                @if ($customerChecklists->isEmpty())
                    <div class="alert alert-warning text-center">
                        No checklists found for this customer.
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
            color: #495057;
        }

        .btn {
            border-radius: 30px;
            padding: 8px 20px;
        }

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
            color: #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
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
            margin-right: 5px;
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
