@extends('layouts.admin')

@section('content')
<div class="container mb-4">
    <!-- Title and Search Bar -->
    <div class="d-flex justify-content-between align-items-center p-3 bg-dark shadow-md">
        <div>
            <h2 class="text-light font-weight-bold">Customer Inspection Overview</h2>
            <a href="{{ route('inspections.create') }}" class="btn btn-primary btn-sm rounded-pill">
                <i class="fas fa-plus"></i> Add Inspection
            </a>
        </div>
    
        <form method="GET" action="{{ route('inspections.index') }}" class="d-flex align-items-center">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Employee, Date, or Status" value="{{ request('search') }}" style="max-width: 300px;">
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

    <!-- Loop through inspections grouped by customer name -->
    @foreach ($inspections as $groupKey => $customerInspections)
        @php
            list($customerName, $registrationNumber) = explode(' - ', $groupKey);
            $checkinId = $customerInspections->first()->vehicleCheckin->id;
            $totalPrice = 0; // Initialize total price for this customer
        @endphp
        <div class="mt-4 shadow-sm border border-light bg-light">
            <div class="d-flex justify-content-between align-items-center p-2" style="border: solid 1px #e7e4e4;">
                <h6 class="text-dark ps-2 pe-2 mt-2 text-dark fw-bold text-secondary">{{ $customerName }} ({{ $registrationNumber }}) Inspection</h6>
                <div class="d-flex align-items-center gap-3 pe-4 ps-2">
                    <a href="{{ route('inspections.download-customer', $checkinId) }}" class="btn btn-primary btn-sm ">
                        <i class="fas fa-download"></i>
                    </a>
                    <a href="{{ route('inspections.send-whatsapp', $checkinId) }}" class="btn btn-success btn-sm ">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
            <!-- Table to display inspection details -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Inspection Item</th>
                            <th>Check</th>
                            <th>Deficiencies</th>
                            <th>Estimated Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customerInspections as $index => $inspection)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $inspection->inspection_item }}</td>
                                <td>{{ $inspection->check == 1 ? '✔' : '✘' }}</td>
                                <td>{{ $inspection->deficiencies }}</td>
                                <td>{{ $inspection->services_performed }}</td>
                                <td>
                                    <a href="{{ route('inspections.edit', $inspection->id) }}" class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('inspections.destroy', $inspection->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                // Ensure services_performed is a numeric value (remove any non-numeric characters)
                                $price = preg_replace('/[^0-9.]/', '', $inspection->services_performed); // Remove non-numeric characters
                                $totalPrice += (float)$price; // Convert to float and add to totalPrice
                            @endphp
                        @endforeach
                          <tr class="table-light">
                            <td colspan="4" class="text-start ps-5 font-weight-bold">Total Estimated Price:</td>
                           
                            <td class="fw-bold">{{ number_format($totalPrice, 2) }}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
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
    .table td {
        padding: 1px ;
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
        color: #007bff;
    }
</style>
@endsection
