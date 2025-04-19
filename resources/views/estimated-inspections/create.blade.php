@extends('layouts.admin')

@section('content')

<div class="container p-4 shadow rounded bg-light">
    <h2 class="pt-4 pb-4">Add Estimated Inspection</h2>
    <form action="{{ route('estimated-inspections.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="vehicle_checkin_id" class="form-label">Vehicle Check-in</label>
                <select name="vehicle_checkin_id" id="vehicle_checkin_id" class="form-control" required>
                    <option value="">Select Vehicle</option>
                    @foreach($checkins as $checkin)
                        <option value="{{ $checkin->id }}">{{ $checkin->customer_name}} - {{ $checkin->vehicle_registration_number }}</option>
                    @endforeach
                </select>
            </div>
        </div>
      
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="inspection_report" class="form-label">Inspection Report</label>
                <textarea name="inspection_report" id="inspection_report" class="form-control" rows="3" required></textarea>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="issues_identified" class="form-label">Issues Identified</label>
                <select name="issues_identified[]" id="issues_identified" class="form-control" multiple required>
                    <option value="Engine">Engine</option>
                    <option value="Brakes">Brakes</option>
                    <option value="Suspension">Suspension</option>
                    <option value="Electrical">Electrical</option>
                    <option value="AC">AC</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="parts_required" class="form-label">Parts Required for Repair</label>
                <textarea name="parts_required" id="parts_required" class="form-control" rows="1" required></textarea>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="estimated_cost" class="form-label">Estimated Cost of Repairs</label>
                <input type="number" name="estimated_cost" id="estimated_cost" class="form-control" step="0.01" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="approval_status" class="form-label">Approval Status</label>
                <select name="approval_status" id="approval_status" class="form-control" required>
                    <option value="Pending">Pending</option>
                    <option value="Approved">Approved</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="customer_approval_method" class="form-label">Customer Approval Method</label>
                <select name="customer_approval_method" id="customer_approval_method" class="form-control" required>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Call">Call</option>
                    <option value="Email">Email</option>
                </select>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="approval_date_time" class="form-label">Date & Time of Approval</label>
                <input type="datetime-local" name="approval_date_time" id="approval_date_time" class="form-control">
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="mb-3">
                <label for="customer_signature" class="form-label">Customer Signature (Upload Image)</label>
                <input type="file" name="customer_signature" id="customer_signature" class="form-control">
            </div>
        </div>
        </div>

        <button type="submit" class="btn btn-primary">Save Inspection</button>
        <a href="{{ route('estimated-inspections.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
