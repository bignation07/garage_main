@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Work Start Entry</h2>
    <form action="{{ route('work-starts.update', $workStart->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="job_card_id" class="form-label">Job Card</label>
            <select name="job_card_id" class="form-select" required>
                <option value="">Select Job Card</option>
                @foreach($jobCards as $jobCard)
                    <option value="{{ $jobCard->id }}" {{ $jobCard->id == $workStart->job_card_id ? 'selected' : '' }}>
                        {{ $jobCard->job_card_number }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="start_date_time" class="form-label">Start Date & Time</label>
            <input type="datetime-local" name="start_date_time" class="form-control" value="{{ $workStart->start_date_time }}" required>
        </div>

        <div class="mb-3">
            <label for="mechanic_assigned" class="form-label">Mechanic Assigned</label>
            <input type="text" name="mechanic_assigned" class="form-control" value="{{ $workStart->mechanic_assigned }}" required>
        </div>

        <div class="mb-3">
            <label for="parts_purchased" class="form-label">Parts Purchased</label>
            <input type="text" name="parts_purchased" class="form-control" value="{{ $workStart->parts_purchased }}">
        </div>

        <div class="mb-3">
            <label for="vendor_name" class="form-label">Vendor Name</label>
            <input type="text" name="vendor_name" class="form-control" value="{{ $workStart->vendor_name }}">
        </div>

        <div class="mb-3">
            <label for="invoice_details" class="form-label">Invoice Details</label>
            <input type="text" name="invoice_details" class="form-control" value="{{ $workStart->invoice_details }}">
        </div>

        <div class="mb-3">
            <label for="total_parts_cost" class="form-label">Total Parts Cost</label>
            <input type="number" step="0.01" name="total_parts_cost" class="form-control" value="{{ $workStart->total_parts_cost }}">
        </div>

        <div class="mb-3">
            <label for="estimated_service_charge" class="form-label">Estimated Service Charge</label>
            <input type="number" step="0.01" name="estimated_service_charge" class="form-control" value="{{ $workStart->estimated_service_charge }}">
        </div>

        <div class="mb-3">
            <label for="margin_calculation" class="form-label">Margin Calculation (Selling Price - Purchase Price)</label>
            <input type="number" step="0.01" name="margin_calculation" class="form-control" value="{{ $workStart->margin_calculation }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="In Progress" {{ $workStart->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $workStart->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Delivered" {{ $workStart->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="customer_notification_sent" class="form-label">Customer Notification Sent?</label>
            <select name="customer_notification_sent" class="form-select">
                <option value="0" {{ !$workStart->customer_notification_sent ? 'selected' : '' }}>No</option>
                <option value="1" {{ $workStart->customer_notification_sent ? 'selected' : '' }}>Yes</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Work Start</button>
        <a href="{{ route('work-starts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
