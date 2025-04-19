@extends('layouts.admin')

@section('content')

<div class="container">
    <!-- In the <head> tag for CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Before the closing </body> tag for JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <h2>Vehicle Arrivals at Garage</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between">
        
        <a href="{{ route('vehicle-checkin.create') }}" class="btn btn-primary mb-3">Add New Vehicle</a>
        <!-- Search Form -->
        <form action="{{ route('vehicle-checkin.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Search by Customer, Vehicle, or Model">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <div style="overflow-x: auto;">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Customer Name</th>
                    <th>Vehicle</th>
                    <th>Service Type</th>
                    <th>Arrival Date & Time</th>
                    <th>Pickup/Drop Mode</th>
                    <th>Battery Number</th>
                    <th>Car Tire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checkins as $index => $checkin)
                <tr>
                    <td>{{ $checkins->firstItem() + $index }}</td>
                    <td>
                        @if($checkin->car_images)
                            @php
                                $images = explode(',', $checkin->car_images);
                            @endphp
                            <!-- View Button to Trigger Modal -->
                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#imageModal" data-images="{{ json_encode($images) }}">View Images</button>
                        @endif
                    </td>
                    <td>{{ $checkin->customer_name }}</td>
                    <td>{{ $checkin->make_model }} ({{ $checkin->vehicle_registration_number }})</td>
                    <td>{{ $checkin->service_type }}</td>
                    <td>{{ date('d M Y, h:i A', strtotime($checkin->arrival_datetime)) }}</td>
                    <td>{{ $checkin->pickup_dropoff_mode }}</td>
                    <td>{{ $checkin->battery_number ? $checkin->battery_number : 'Null' }}</td>
                    <td>{{ $checkin->car_tire ? $checkin->car_tire : 'Null' }}</td>

                    <td>
                        <a href="{{ route('vehicle-checkin.edit', $checkin->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <!--<form action="{{ route('vehicle-checkin.destroy', $checkin->id) }}" method="POST" class="d-inline">-->
                        <!--    @csrf-->
                        <!--    @method('DELETE')-->
                        <!--    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash-alt"></i></button>-->
                        <!--</form>-->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-between">
        <div>
            Showing {{ $checkins->firstItem() }} to {{ $checkins->lastItem() }} of {{ $checkins->total() }} entries.
        </div>
        <div>
            {{ $checkins->links('pagination::bootstrap-4') }} <!-- Pagination links -->
        </div>
    </div>
</div>

<!-- Modal for Image View -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 75%; margin: auto;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Car Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Images will be dynamically loaded here -->
            </div>
        </div>
    </div>
</div>

<!-- Script to handle dynamic image loading -->
<script>
    $('#imageModal').on('show.bs.modal', function (e) {
        var images = $(e.relatedTarget).data('images'); // Get images from the button
        var modalBody = $('#modalBody');
        modalBody.empty(); // Clear previous content

        // Loop through the images and append to modal
        images.forEach(function(image) {
            var imgElement = '<img src="{{ url('public') }}/' + image + '" alt="Car Image" class="img-fluid mb-3" style="max-width: 100%;">';
            modalBody.append(imgElement);
        });
    });
</script>

<style>
    table td {
        white-space: nowrap;
    }
</style>

@endsection
