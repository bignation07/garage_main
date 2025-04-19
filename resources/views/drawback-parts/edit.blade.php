@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="shadow-lg p-3">
        <h2 class="pb-4 pt-4">Edit Drawback Part</h2>
        <form action="{{ route('drawback-parts.update', $drawbackPart->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="drawback_list_id" class="form-label">Select Drawback</label>
                        <select name="drawback_list_id" id="drawback_list_id" class="form-control" required>
                            <option value="">Select a drawback</option>
                            @foreach($drawbacks as $drawback)
                                <option value="{{ $drawback->id }}" {{ $drawbackPart->drawback_list_id == $drawback->id ? 'selected' : '' }}>
                                    {{ $drawback->issue_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="issue_name" class="form-label">Issue Name</label>
                        <input type="text" name="issue_name" id="issue_name" class="form-control" value="{{ $drawbackPart->issue_name }}" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="spare_part_needed" class="form-label">Spare Part Needed</label>
                        <input type="text" name="spare_part_needed" id="spare_part_needed" class="form-control" value="{{ $drawbackPart->spare_part_needed }}" required>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="part_number" class="form-label">Part Number (Optional)</label>
                        <input type="text" name="part_number" id="part_number" class="form-control" value="{{ $drawbackPart->part_number }}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="estimated_cost" class="form-label">Estimated Cost</label>
                        <input type="number" step="0.01" name="estimated_cost" id="estimated_cost" class="form-control" value="{{ $drawbackPart->estimated_cost }}">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="mb-3">
                        <label for="parts_availability" class="form-label">Parts Availability</label>
                        <select name="parts_availability" id="parts_availability" class="form-control" required>
                            <option value="In Stock" {{ $drawbackPart->parts_availability == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                            <option value="Ordered" {{ $drawbackPart->parts_availability == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                            <option value="Not Available" {{ $drawbackPart->parts_availability == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Part</button>
            <a href="{{ route('drawback-parts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
