@extends('layouts.admin')

@section('content')
<div class="container p-4 shadow rounded bg-light">
    <h2 class="pt-2 pb-2">Edit Drawback Issue</h2>

    <form action="{{ route('drawbacks.update', $drawback->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="vehicle_checkin_id" class="form-label">Vehicle Check-in</label>
                    <select name="vehicle_checkin_id" id="vehicle_checkin_id" class="form-control" required>
                        <option value="">Select a vehicle check-in</option>
                        @foreach($checkins as $checkin)
                            <option value="{{ $checkin->id }}" {{ $drawback->vehicle_checkin_id == $checkin->id ? 'selected' : '' }}>
                                {{ $checkin->customer_name }} - {{ $checkin->vehicle_registration_number }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="issue_name" class="form-label">Issue Name</label>
                    <input type="text" name="issue_name" id="issue_name" class="form-control" value="{{ $drawback->issue_name }}" required>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="issue_severity" class="form-label">Issue Severity</label>
                    <select name="issue_severity" id="issue_severity" class="form-control" required>
                        <option value="Minor" {{ $drawback->issue_severity == 'Minor' ? 'selected' : '' }}>Minor</option>
                        <option value="Major" {{ $drawback->issue_severity == 'Major' ? 'selected' : '' }}>Major</option>
                        <option value="Critical" {{ $drawback->issue_severity == 'Critical' ? 'selected' : '' }}>Critical</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="additional_repairs" class="form-label">Additional Repairs Suggested</label>
                    <textarea name="additional_repairs" id="additional_repairs" class="form-control">{{ $drawback->additional_repairs }}</textarea>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="mb-3">
                    <label for="mechanic_notes" class="form-label">Mechanic Notes</label>
                    <textarea name="mechanic_notes" id="mechanic_notes" class="form-control">{{ $drawback->mechanic_notes }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('drawbacks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
