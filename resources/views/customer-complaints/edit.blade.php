@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="shadow-lg p-3">
        <h2 class="pt-4 pb-4">Edit Customer Complaint</h2>

        <!-- Edit Complaint Form -->
        <form action="{{ route('customer-complaints.update', $complaint->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Vehicle Check-in select -->
            <div class="col-md-3 pb-3">
                <label for="vehicle_checkin_id">Vehicle Check-in</label>
                <select class="form-control" name="vehicle_checkin_id" required>
                    <option value="" disabled>Select Customer & Vehicle</option>
                    @foreach($checkins as $checkin)
                        <option value="{{ $checkin->id }}" {{ $complaint->vehicle_checkin_id == $checkin->id ? 'selected' : '' }}>
                            {{ $checkin->customer_name }} - {{ $checkin->vehicle_registration_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Complaint Description</th>
                        <th>Complaint Type</th>
                        <th>Previous Repairs Done?</th>
                        <th>Urgency Level</th>
                    </tr>
                </thead>
                <tbody id="complaint-rows">
                    <tr>
                        <td></td>
                        <td>
                            <textarea class="form-control" name="description" required>{{ $complaint->description }}</textarea>
                        </td>
                        <td>
                            <select class="form-control" name="complaint_type">
                                <option value="Mechanical" {{ $complaint->complaint_type == 'Mechanical' ? 'selected' : '' }}>Mechanical</option>
                                <option value="Electrical" {{ $complaint->complaint_type == 'Electrical' ? 'selected' : '' }}>Electrical</option>
                                <option value="Body" {{ $complaint->complaint_type == 'Body' ? 'selected' : '' }}>Body</option>
                                <option value="AC" {{ $complaint->complaint_type == 'AC' ? 'selected' : '' }}>AC</option>
                                <option value="Performance" {{ $complaint->complaint_type == 'Performance' ? 'selected' : '' }}>Performance</option>
                                <option value="Others" {{ $complaint->complaint_type == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="previous_repairs_done">
                                <option value="1" {{ $complaint->previous_repairs_done == 1 ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ $complaint->previous_repairs_done == 0 ? 'selected' : '' }}>No</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="urgency_level">
                                <option value="High" {{ $complaint->urgency_level == 'High' ? 'selected' : '' }}>High</option>
                                <option value="Medium" {{ $complaint->urgency_level == 'Medium' ? 'selected' : '' }}>Medium</option>
                                <option value="Low" {{ $complaint->urgency_level == 'Low' ? 'selected' : '' }}>Low</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Update Complaint</button>
        </form>
    </div>
</div>

<style>
     @media (max-width: 468px) {
       .sidebar{
           height:200vh;
       }
      }
</style>
@endsection
