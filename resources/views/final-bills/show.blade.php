@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Final Bill Details</h2>
    <div class="card shadow rounded-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <span>Bill ID: {{ $finalBill->id }}</span>
            <a href="{{ route('final-bills.index') }}" class="btn btn-light btn-sm">Back to List</a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Customer Name:</strong> {{ $finalBill->customer_name }}</p>
                    <p><strong>Contact Number:</strong> {{ $finalBill->contact_number }}</p>
                    <p><strong>Vehicle Registration Number:</strong> {{ $finalBill->vehicle_registration_number }}</p>
                    <p><strong>Service Details:</strong> {{ $finalBill->service_details }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Parts Cost:</strong> ₹{{ number_format($finalBill->parts_cost, 2) }}</p>
                    <p><strong>Labor Charge:</strong> ₹{{ number_format($finalBill->labor_charge, 2) }}</p>
                    <p><strong>Total Cost:</strong> ₹{{ number_format($finalBill->total_cost, 2) }}</p>
                    <p><strong>Advance Payment:</strong> ₹{{ number_format($finalBill->advance_payment, 2) }}</p>
                    <p><strong>Remaining Amount:</strong> ₹{{ number_format($finalBill->remaining_amount, 2) }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Created At:</strong> {{ $finalBill->created_at->format('d-m-Y H:i:s') }}</p>
                </div>
                <div class="col-md-6 text-end">
                    <p><strong>Updated At:</strong> {{ $finalBill->updated_at->format('d-m-Y H:i:s') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-header {
        font-size: 1.2rem;
        font-weight: bold;
    }
    p {
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }
    .text-end {
        text-align: end;
    }
</style>
@endsection
