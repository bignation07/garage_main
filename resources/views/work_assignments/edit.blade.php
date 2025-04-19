@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Work Assignments</h2>
    <form action="{{ route('work_assignments.update', $workAssignments->first()->vehicle_checkin_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="vehicle_checkin_id" class="form-label">Customer Name</label>
            <select name="vehicle_checkin_id" class="form-control" required disabled>
                <option value="{{ $workAssignments->first()->vehicle_checkin_id }}" selected>
                    {{ $workAssignments->first()->vehicleCheckin->customer_name }} 
                    ({{ $workAssignments->first()->vehicleCheckin->make_model }} - {{ $workAssignments->first()->vehicleCheckin->vehicle_registration_number }})
                </option>
            </select>
            <input type="hidden" name="vehicle_checkin_id" value="{{ $workAssignments->first()->vehicle_checkin_id }}">
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="work-assignments">
                <thead>
                    <tr>
                        <th>Name of Work</th>
                        <th>Mechanic</th>
                        <th>Completed</th>
                        <th>Result</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workAssignments as $assignment)
                    <tr class="work-assignment">
                        <td>
                            <input type="hidden" name="work_assignment_ids[]" value="{{ $assignment->id }}">
                            <input type="text" name="name_of_work[]" class="form-control" value="{{ $assignment->name_of_work }}" required>
                        </td>
                        <td><input type="text" name="mechanic[]" class="form-control" value="{{ $assignment->mechanic }}" required></td>
                        <td>
                            <select name="completed[]" class="form-control">
                                <option value="0" {{ $assignment->completed ? '' : 'selected' }}>No</option>
                                <option value="1" {{ $assignment->completed ? 'selected' : '' }}>Yes</option>
                            </select>
                        </td>
                        <td><input type="text" name="result[]" class="form-control" value="{{ $assignment->result }}"></td>
                        <td>
                            <button type="button" class="btn btn-danger remove-work">Remove</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="button" id="add-work" class="btn btn-secondary">Add Another Work</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
document.getElementById('add-work').addEventListener('click', function () {
    let tableBody = document.querySelector('#work-assignments tbody');
    let newRow = tableBody.firstElementChild.cloneNode(true);
    newRow.querySelectorAll('input, select').forEach(input => input.value = '');
    newRow.querySelector('input[name="work_assignment_ids[]"]').value = '';
    tableBody.appendChild(newRow);
});

document.getElementById('work-assignments').addEventListener('click', function (e) {
    if (e.target.classList.contains('remove-work')) {
        let rowCount = document.querySelectorAll('#work-assignments tbody tr').length;
        if (rowCount > 1) {
            e.target.closest('tr').remove();
        } else {
            alert('At least one work assignment is required.');
        }
    }
});
</script>
@endsection
