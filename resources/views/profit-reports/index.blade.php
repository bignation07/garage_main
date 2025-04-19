@extends('layouts.admin')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center p-3 bg-dark shadow-md">
        <div>
            <h2 class="text-light font-weight-bold">Profit Reports</h2>
        </div>

        <form method="GET" action="{{ route('profit-reports.index') }}" class="d-flex align-items-center">
            <div class="input-group">
               <input type="text" name="search" class="form-control" placeholder="Search " value="{{ request('search') }}" style="max-width: 300px;">
                <button type="submit" class="btn btn-outline-primary">Search</button>
               <!--<input type="text" name="search" value="{{ request()->input('search') }}" placeholder="Search..." />-->
               <!-- <button type="submit" class="btn btn-outline-primary">Search</button>-->
            </div>
        </form>
       
    </div>

    <!-- Display reports -->
    @foreach($profitReports as $group => $reports)
        
        <div class="mt-3 ps-3 mb-0 pb-0" style="background-color:#e7e4e4;">
          <h6 class="mb-0 pt-2 pb-2 text-dark fw-bold text-secondary"> {{ $reports->first()->vehicleCheckin->customer_name ?? 'N/A' }}  -  {{ $reports->first()->vehicleCheckin->vehicle_registration_number ?? 'N/A' }}</h6>
            
        </div>

        <div class="table-responsive pt-0 mb-0">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        <th>Selling Price</th>
                        <th>QTY</th>
                        <th>Profit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $index => $report)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $report->name_of_parts }}</td>
                        <td>{{ $report->selling_price}}</td>
                        <td>{{ (int) $report->qty}}</td>
                        <td>{{ number_format($report->profit, 2) }}</td>
                    </tr>
                    @endforeach
                    <!-- Total Profit Row for this vehicle registration -->
                    <tr class="table-light">
                        <td colspan="4" class="text-left font-weight-bold">Total</td>
                        <td class="font-weight-bold">{{ number_format($reports->sum('profit'), 4) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    @endforeach


       

  

</div>
@endsection
