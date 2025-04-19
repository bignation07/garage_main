@extends('layouts.admin')

@section('content')
<div class="container p-4 shadow rounded bg-light">

    <h2  class="pt-4 pb-4">Edit Estimated Inspection</h2>
    <form action="{{ route('estimated-inspections.update', $inspection->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="vehicle_checkin_id" class="form-label">Vehicle Check-in</label>
                <select name="vehicle_checkin_id" id="vehicle_checkin_id" class="form-control" required>
                    <option value="">Select Vehicle</option>
                    @foreach($checkins as $checkin)
                        <option value="{{ $checkin->id }}" {{ $inspection->vehicle_checkin_id == $checkin->id ? 'selected' : '' }}>
                            {{ $checkin->customer_name }} - {{ $checkin->vehicle_registration_number }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="inspection_report" class="form-label">Inspection Report</label>
                    <textarea name="inspection_report" id="inspection_report" class="form-control" rows="3" required>{{ $inspection->inspection_report }}</textarea>
                </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="issues_identified" class="form-label">Issues Identified</label>
                <select name="issues_identified[]" id="issues_identified" class="form-control" multiple required>
                    <option value="Engine" {{ in_array('Engine', json_decode($inspection->issues_identified, true)) ? 'selected' : '' }}>Engine</option>
                    <option value="Brakes" {{ in_array('Brakes', json_decode($inspection->issues_identified, true)) ? 'selected' : '' }}>Brakes</option>
                    <option value="Suspension" {{ in_array('Suspension', json_decode($inspection->issues_identified, true)) ? 'selected' : '' }}>Suspension</option>
                    <option value="Electrical" {{ in_array('Electrical', json_decode($inspection->issues_identified, true)) ? 'selected' : '' }}>Electrical</option>
                    <option value="AC" {{ in_array('AC', json_decode($inspection->issues_identified, true)) ? 'selected' : '' }}>AC</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="parts_required" class="form-label">Parts Required for Repair</label>
                <textarea name="parts_required" id="parts_required" class="form-control" rows="1" required>{{ $inspection->parts_required }}</textarea>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="estimated_cost" class="form-label">Estimated Cost of Repairs</label>
                <input type="number" name="estimated_cost" id="estimated_cost" class="form-control" step="0.01" value="{{ $inspection->estimated_cost }}" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="approval_status" class="form-label">Approval Status</label>
                <select name="approval_status" id="approval_status" class="form-control" required>
                    <option value="Pending" {{ $inspection->approval_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Approved" {{ $inspection->approval_status == 'Approved' ? 'selected' : '' }}>Approved</option>
                    <option value="Rejected" {{ $inspection->approval_status == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
                
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="customer_approval_method" class="form-label">Customer Approval Method</label>
                <select name="customer_approval_method" id="customer_approval_method" class="form-control" required>
                    <option value="WhatsApp" {{ $inspection->customer_approval_method == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
                    <option value="Call" {{ $inspection->customer_approval_method == 'Call' ? 'selected' : '' }}>Call</option>
                    <option value="Email" {{ $inspection->customer_approval_method == 'Email' ? 'selected' : '' }}>Email</option>
                </select>
            </div>
        </div>
        </div>

        <button type="submit" class="btn btn-success">Update Inspection</button>
        <a href="{{ route('estimated-inspections.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
