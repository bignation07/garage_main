@extends('layouts.admin')

@section('content')
<div class="container p-4 shadow rounded bg-light">
    <h2 class="pt-4 pb-4 mb-4">Edit Job Card</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('job-cards.update', $jobCard->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Select Vehicle Check-in:</label>
                    <select name="vehicle_checkin_id" class="form-select" required>
                        @foreach($checkins as $checkin)
                            <option value="{{ $checkin->id }}" {{ $jobCard->vehicle_checkin_id == $checkin->id ? 'selected' : '' }}>
                                {{ $checkin->customer_name }} - {{ $checkin->vehicle_registration_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Service Advisor:</label>
                    <input type="text" name="service_advisor" class="form-control" value="{{ $jobCard->service_advisor }}" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Assigned Mechanic:</label>
                    <input type="text" name="mechanic" class="form-control" value="{{ $jobCard->mechanic }}" required>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Expected Delivery Date:</label>
                    <input type="date" name="expected_delivery_date" class="form-control" value="{{ $jobCard->expected_delivery_date }}" required>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Fuel Level:</label>
                    <select name="fuel_level" class="form-select" required>
                        <option value="Empty" {{ $jobCard->fuel_level == 'Empty' ? 'selected' : '' }}>Empty</option>
                        <option value="Low" {{ $jobCard->fuel_level == 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Half" {{ $jobCard->fuel_level == 'Half' ? 'selected' : '' }}>Half</option>
                        <option value="Full" {{ $jobCard->fuel_level == 'Full' ? 'selected' : '' }}>Full</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Vehicle Condition Checklist:</label>
                    <input type="text" name="vehicle_condition" class="form-control" value="{{ $jobCard->vehicle_condition }}">
                </div>
            </div>

            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Additional Work Required:</label>
                    <select name="additional_work" class="form-select">
                        <option value="0" {{ $jobCard->additional_work == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ $jobCard->additional_work == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
            </div>

            <!--<div class="col-md-4 col-sm-12">-->
            <!--    <div class="mb-3">-->
            <!--        <label class="form-label">Estimated Cost:</label>-->
            <!--        <input type="number" name="estimated_cost" class="form-control" value="{{ $jobCard->estimated_cost }}" required>-->
            <!--    </div>-->
            <!--</div>-->
            
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Advance Payment (If Any):</label>
                    <input type="number" name="advance_payment" class="form-control" value="{{ $jobCard->advance_payment }}">
                </div>
            </div>
            
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label class="form-label">Customer Signature (Upload New File to Replace Existing):</label>
                    <input type="file" name="customer_signature" class="form-control">
                    @if($jobCard->customer_signature)
                        <p>Current File: <a href="{{ asset('storage/' . $jobCard->customer_signature) }}" target="_blank">View Signature</a></p>
                    @endif
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-lg">Update Job Card</button>
    </form>
</div>
@endsection
