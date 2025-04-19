@extends('layouts.admin')

@section('content')
<div class="container p-4 shadow rounded bg-light">
    <h2 class="mb-4">Edit Final Bill</h2>
    
    <form action="{{ route('final-bills.update', $finalBill->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-4 col-sm-12 pb-3">
                <div class="form-group">
                    <label for="vehicle_checkin_id">Customer Name</label>
                    <select id="vehicle_checkin_id" class="form-control" name="vehicle_checkin_id" required>
                        <option value="">Select Customer Name</option>
                        @foreach($checkins as $checkin)
                            <option value="{{ $checkin->id }}" 
                                data-customer="{{ $checkin->customer_name }}" 
                                data-contact="{{ $checkin->contact_number }}" 
                                data-registration="{{ $checkin->vehicle_registration_number }}"
                                @if($finalBill->vehicle_checkin_id == $checkin->id) selected @endif>
                                {{ $checkin->customer_name }} - {{ $checkin->vehicle_registration_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4 col-sm-12 pb-3">
                <div class="form-group">
                    <label>Service Details</label>
                    <textarea name="service_details" class="form-control" placeholder="Enter Service Details" required>{{ $finalBill->service_details }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success btn-lg mt-4">Update Bill</button>
    </form>
</div>

@push('scripts')
<script>
    document.getElementById('vehicle_checkin_id').addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('customer_name').value = selectedOption.getAttribute('data-customer');
        document.getElementById('contact_number').value = selectedOption.getAttribute('data-contact');
        document.getElementById('vehicle_registration_number').value = selectedOption.getAttribute('data-registration');
    });
</script>
@endpush

@endsection
