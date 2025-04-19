@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Create Work Assignment</h2>
    <form action="{{ route('work_assignments.store') }}" method="POST">
        @csrf

        <div class="mb-3 col-md-4 pb-3">
            <label for="vehicle_checkin_id" class="form-label">Customer Name</label>
            <select name="vehicle_checkin_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->customer_name }} ({{ $customer->make_model }} - {{ $customer->vehicle_registration_number }})</option>
                @endforeach
            </select>
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
                    <tr class="work-assignment">
                        <td><input type="text" name="name_of_work[]" class="form-control" required></td>
                        <td><input type="text" name="mechanic[]" class="form-control" required></td>
                        <td>
                            <select name="completed[]" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </td>
                        <td><input type="text" name="result[]" class="form-control"></td>
                        <td><button type="button" class="btn btn-danger remove-work">Remove</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" id="add-work" class="btn btn-secondary">Add Another Work</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<script>
document.getElementById('add-work').addEventListener('click', function () {
    let tableBody = document.querySelector('#work-assignments tbody');
    let newRow = tableBody.firstElementChild.cloneNode(true);
    newRow.querySelectorAll('input, select').forEach(input => input.value = '');
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
