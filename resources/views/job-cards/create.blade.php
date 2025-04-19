@extends('layouts.admin')

@section('content')
<div class="container p-3 shadow rounded bg-light">
    <div class="">
        <h2 class=" pb-4 ">Create Job Card</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('job-cards.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Select Vehicle Check-in:</label>
                        <select name="vehicle_checkin_id" class="form-select" required>
                            <option value="">Select Vehicle</option>
                            @foreach($checkins as $checkin)
                                <option value="{{ $checkin->id }}">{{ $checkin->customer_name }} - {{ $checkin->vehicle_registration_number }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class=" mb-3">
                        <label class="form-label">Service Advisor:</label>
                        <input type="text" name="service_advisor" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class=" mb-3">
                        <label class="form-label">Assigned Mechanic:</label>
                        <input type="text" name="mechanic" class="form-control" required>
                    </div>
                </div>
            

                <div class="col-md-4 col-sm-12">
                    <div class=" mb-3">
                        <label class="form-label">Expected Delivery Date:</label>
                        <input type="date" name="expected_delivery_date" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Fuel Level:</label>
                        <select name="fuel_level" class="form-select" required>
                            <option value="Empty">Empty</option>
                            <option value="Low">Low</option>
                            <option value="Half">Half</option>
                            <option value="Full">Full</option>
                        </select>
                    </div>
                </div>
            
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Vehicle Condition Checklist:</label>
                        <input type="text" name="vehicle_condition" class="form-control" placeholder="Enter vehicle condition">
                    </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Additional Work Required:</label>
                        <select name="additional_work" class="form-select">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>

                <!--<div class="col-md-4 col-sm-12">-->
                <!--    <div class=" mb-3">-->
                <!--        <label class="form-label">Estimated Cost:</label>-->
                <!--        <input type="number" name="estimated_cost" class="form-control" required>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-md-4 col-sm-12">
                    <div class=" mb-3">
                        <label class="form-label">Advance Payment (If Any):</label>
                        <input type="number" name="advance_payment" class="form-control">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label class="form-label">Customer Signature (Upload):</label>
                        <input type="file" name="customer_signature" class="form-control">
                    </div>
                </div>
            </div>

            <div class="">
                <button type="submit" class="btn btn-primary btn-lg">Create Job Card</button>
            </div>
        </form>
    </div>
</div>
@endsection
