@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="shadow-lg p-3">

        <h2>Start New Work</h2>
        <form action="{{ route('work-starts.store') }}" method="POST" >
            @csrf
    
            <div class="row">
               
           
                 <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="job_card_id" class="form-label">Job Card</label>
                        <select name="job_card_id" class="form-select" required>
                            <option value="">Select Job Card</option>
                            @foreach($jobCards as $jobCard)
                                <option value="{{ $jobCard->id }}">{{ $jobCard->job_card_number }}</option>
                            @endforeach
                        </select>
                    </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="start_date_time" class="form-label">Start Date & Time</label>
                                <input type="datetime-local" name="start_date_time" class="form-control" required>
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="mechanic_assigned" class="form-label">Mechanic Assigned</label>
                                <input type="text" name="mechanic_assigned" class="form-control" required>
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="parts_purchased" class="form-label">Parts Purchased</label>
                                <input type="text" name="parts_purchased" class="form-control">
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="vendor_name" class="form-label">Vendor Name</label>
                                <input type="text" name="vendor_name" class="form-control">
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="invoice_details" class="form-label">Invoice Details</label>
                                <input type="text" name="invoice_details" class="form-control">
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="total_parts_cost" class="form-label">Total Parts Cost</label>
                                <input type="number" step="0.01" name="total_parts_cost" class="form-control">
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="estimated_service_charge" class="form-label">Estimated Service Charge</label>
                                <input type="number" step="0.01" name="estimated_service_charge" class="form-control">
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="margin_calculation" class="form-label">Margin Calculation (Selling Price - Purchase Price)</label>
                                <input type="number" step="0.01" name="margin_calculation" class="form-control">
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </div>
    
            </div>
            <div class="col-md-4 col-sm-12">
                            <div class="mb-3">
                                <label for="customer_notification_sent" class="form-label">Customer Notification Sent?</label>
                                <select name="customer_notification_sent" class="form-select">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
    
            </div>
            </div>
            <button type="submit" class="btn btn-primary">Start Work</button>
            <a href="{{ route('work-starts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
