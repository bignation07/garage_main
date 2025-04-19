@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="shadow-lg p-3">
        <h2 class="pt-4 pb-4">Add Customer Complaints</h2>



        <!-- Complaint Form -->
        <form action="{{ route('customer-complaints.store') }}" method="POST">
            @csrf
                 <!-- Vehicle Check-in select (only one vehicle check-in ID for all complaints) -->
        <div class="col-md-3 pb-3">
            <label for="vehicle_checkin_id">Vehicle Check-in</label>
            <select class="form-control" name="vehicle_checkin_id" required>
                <option value="" disabled selected>Select Customer & Vehicle</option>
                @foreach($checkins as $checkin)
                    <option value="{{ $checkin->id }}">
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="complaint-rows">
                    <tr>
                        <td>
                           
                        </td>
                        <td>
                            <textarea class="form-control" name="description[]" required></textarea>
                        </td>
                        <td>
                            <select class="form-control" name="complaint_type[]">
                                <option>Mechanical</option>
                                <option>Electrical</option>
                                <option>Body</option>
                                <option>AC</option>
                                <option>Performance</option>
                                <option>Others</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="previous_repairs_done[]">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="urgency_level[]">
                                <option>High</option>
                                <option>Medium</option>
                                <option>Low</option>
                            </select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-complaint">Remove</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Add More Complaint Button -->
            <button type="button" id="add-complaint" class="btn btn-secondary">Add Another Complaint</button>
            <button type="submit" class="btn btn-success">Save</button>
            <!--<form action="{{ route('customer-complaints.store') }}" method="POST">-->
            <!--    @csrf-->
                <!-- Your dynamic table and complaint form rows here -->
            <!--    <button type="submit" class="btn btn-success">Save</button>-->
            <!--</form>-->

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
<script>
    // Add more complaint rows dynamically
    document.getElementById('add-complaint').addEventListener('click', function() {
        var complaintHtml = `
            <tr>
                <td>
                 </td>
                <td>
                    <textarea class="form-control" name="description[]" required></textarea>
                </td>
                <td>
                    <select class="form-control" name="complaint_type[]">
                        <option>Mechanical</option>
                        <option>Electrical</option>
                        <option>Body</option>
                        <option>AC</option>
                        <option>Performance</option>
                        <option>Others</option>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="previous_repairs_done[]">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </td>
                <td>
                    <select class="form-control" name="urgency_level[]">
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-danger remove-complaint">Remove</button>
                </td>
            </tr>`;

        document.getElementById('complaint-rows').insertAdjacentHTML('beforeend', complaintHtml);
    });

    // Event delegation to remove complaint row
    document.getElementById('complaint-rows').addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-complaint')) {
            e.target.closest('tr').remove();
        }
    });
</script>
@endsection
