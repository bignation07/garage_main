@extends('layouts.admin')

@section('content')
    <div class="container mb-4">
        <h1 class="mb-4">Add Vehicle Checklist for Customer</h1>

        <form action="{{ route('vehicle-checklist.store') }}" method="POST">
            @csrf
            <div class="shadow-lg">
                <div class="mb-3v col-md-3 col-sm-12 p-4">
                    <label for="vehicle_checkin_id" class="form-label">Vehicle Check-in</label>
                    <select class="form-control" name="vehicle_checkin_id" required>
                        @foreach($checkins as $checkin)
                            <option value="{{ $checkin->id }}">{{ $checkin->customer_name }}</option>
                        @endforeach
                    </select>
                </div>

            
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Part Name</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td class="align-middle">{{ $index + 1 }}</td>
                                <td class="align-middle">{{ $category }}</td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" name="checklist[{{ $category }}][part_name]" class="form-control" id="part_name_{{ $category }}" value="{{ old('checklist.' . $category . '.part_name') }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="checklist[{{ $category }}][qty]" class="form-control" id="qty_{{ $category }}" value="{{ old('checklist.' . $category . '.qty') }}">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="number" name="checklist[{{ $category }}][rate]" class="form-control" id="rate_{{ $category }}" value="{{ old('checklist.' . $category . '.rate') }}" step="0.01">
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Submit Button -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-lg mb-4 me-4">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </div>
        </form>
    </div>

    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .form-group input {
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
