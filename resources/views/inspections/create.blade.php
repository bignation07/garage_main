@extends('layouts.admin')

@section('content')
<div class="container mb-4">
    <h1 class="mb-4">Add Inspection Details</h1>

    <form action="{{ route('inspections.store') }}" method="POST">
        @csrf

        <!-- Vehicle Check-in select -->
        <div class="col-md-3 pb-3">
            <label for="vehicle_checkin_id">Customer Name</label>
            <select class="form-control" name="vehicle_checkin_id" required>
                <option value="" disabled selected>Select Customer & Vehicle</option>
                @foreach($checkins as $checkin)
                    <option value="{{ $checkin->id }}">{{ $checkin->customer_name }} - {{ $checkin->vehicle_registration_number }}</option>
                @endforeach
            </select>
        </div>

        <div class="shadow-lg">
            <table class="table table-bordered" id="inspection-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Inspection Item</th>
                        <th>Check</th>
                        <th>Deficiencies</th>
                        <th>Estimated Price</th>
                    </tr>
                </thead>
                <tbody id="inspection-body">
                    @foreach ($inspectionItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <input type="text" name="inspection_item[{{ $index }}]" class="form-control" value="{{ $item }}" readonly>
                        </td>
                        <td>
                            <input type="radio" name="check[{{ $index }}]" value="1" id="correct_{{ $index }}">
                            <label for="correct_{{ $index }}">✔️</label>
                            <input type="radio" name="check[{{ $index }}]" value="0" id="incorrect_{{ $index }}">
                            <label for="incorrect_{{ $index }}">❌</label>
                        </td>
                        <td>
                            <textarea name="deficiencies[{{ $index }}]" class="form-control"></textarea>
                        </td>
                        <td>
                            <textarea name="services_performed[{{ $index }}]" class="form-control"></textarea>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between mb-4">
                <button type="button" id="addRow" class="btn btn-primary btn-lg mb-4 me-4">
                    <i class="fas fa-plus"></i> Add Row
                </button>
                <button type="submit" class="btn btn-success btn-lg mb-4 me-4">
                    <i class="fas fa-save"></i> Save
                </button>
            </div>
        </div>
    </form>
</div>

<script>
// Add a new row to the table when the button is clicked
document.getElementById('addRow').addEventListener('click', function() {
    var tableBody = document.getElementById('inspection-body');
    var rowCount = tableBody.rows.length + 1;

    // Create a new row element
    var newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${rowCount}</td>
        <td><input type="text" name="inspection_item[${rowCount}]" class="form-control" placeholder="Inspection Item"></td>
        <td>
            <input type="radio" name="check[${rowCount}]" value="1" id="correct_${rowCount}">
            <label for="correct_${rowCount}">✔️</label>
            <input type="radio" name="check[${rowCount}]" value="0" id="incorrect_${rowCount}">
            <label for="incorrect_${rowCount}">❌</label>
        </td>
        <td><textarea name="deficiencies[${rowCount}]" class="form-control" placeholder="Deficiencies"></textarea></td>
        <td><textarea name="services_performed[${rowCount}]" class="form-control" placeholder="Estimated Price"></textarea></td>
    `;

    // Append the new row to the table body
    tableBody.appendChild(newRow);
});
</script>


<style>
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table th {
        background-color: #f8f9fa;
    }

    .form-group input, .form-group textarea {
        width: 100%;
        border-radius: 5px;
        padding: 8px;
    }

    .btn {
        border-radius: 5px;
        padding: 10px 20px;
    }

    .container {
        max-width: 1200px;
    }

    h1 {
        font-size: 24px;
        color: #343a40;
    }
</style>
@endsection
