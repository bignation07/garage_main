@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="pb-5">

        <div class="d-flex justify-content-between align-items-center flex-wrap ps-3 pe-3 bg-dark shadow-md">
            <h2 class="pt-4 pb-3 text-light">Edit Vehicle Check-in</h2>
            <div>
                <a href="{{ route('vehicle-checkin.index') }}" class="btn btn-primary">Back to Check-ins</a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('vehicle-checkin.update', $checkin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="p-4 shadow-md bg-light">
                    <h4 class="text-primary pb-3 pt-3">Customer Details</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="customer_name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                            <input type="text" name="customer_name" value="{{ old('customer_name', $checkin->customer_name) }}" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="contact_number" class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="text" name="contact_number" value="{{ old('contact_number', $checkin->contact_number) }}" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email (optional)</label>
                            <input type="email" name="email" value="{{ old('email', $checkin->email) }}" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label">Enter Address <span class="text-danger">*</span></label>
                            <textarea name="address" class="form-control" required>{{ old('address', $checkin->address) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="p-4 shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Vehicle Details</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="vehicle_registration_number" class="form-label">Vehicle Registration Number <span class="text-danger">*</span></label>
                            <input type="text" name="vehicle_registration_number" value="{{ old('vehicle_registration_number', $checkin->vehicle_registration_number) }}" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="make_model" class="form-label">Make & Model <span class="text-danger">*</span></label>
                            <input type="text" name="make_model" value="{{ old('make_model', $checkin->make_model) }}" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="year_of_manufacture" class="form-label">Year of Manufacture <span class="text-danger">*</span></label>
                            <input type="number" name="year_of_manufacture" value="{{ old('year_of_manufacture', $checkin->year_of_manufacture) }}" class="form-control" required>
                        </div>
                         <div class="col-md-4">
                            <label for="battery_number">Battery Number</label>
                            <input type="text" name="battery_number" id="battery_number" placeholder=" Enter battery Number"  class="form-control" value="{{ old('battery_number', $checkin->battery_number ?? '') }}">
                        </div>
                        
                        <div class="col-md-4">
                            <label for="car_tire">Car Tire</label>
                            <input type="text" name="car_tire" id="car_tire" class="form-control" placeholder=" Enter Car tire"  value="{{ old('car_tire', $checkin->car_tire ?? '') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="fuel_type" class="form-label">Fuel Type <span class="text-danger">*</span></label>
                            <select name="fuel_type" class="form-select" required>
                                <option value="Petrol" {{ $checkin->fuel_type == 'Petrol' ? 'selected' : '' }}>Petrol</option>
                                <option value="Diesel" {{ $checkin->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                <option value="CNG" {{ $checkin->fuel_type == 'CNG' ? 'selected' : '' }}>CNG</option>
                                <option value="Electric" {{ $checkin->fuel_type == 'Electric' ? 'selected' : '' }}>Electric</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="odometer_reading" class="form-label">Odometer Reading <span class="text-danger">*</span></label>
                            <input type="number" name="odometer_reading" value="{{ old('odometer_reading', $checkin->odometer_reading) }}" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="p-4 shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Service Information</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="service_type" class="form-label">Service Type <span class="text-danger">*</span></label>
                            <select name="service_type" class="form-select" required>
                                <option value="General Service" {{ $checkin->service_type == 'General Service' ? 'selected' : '' }}>General Service</option>
                                <option value="Accidental Repair" {{ $checkin->service_type == 'Accidental Repair' ? 'selected' : '' }}>Accidental Repair</option>
                                <option value="Periodic Maintenance" {{ $checkin->service_type == 'Periodic Maintenance' ? 'selected' : '' }}>Periodic Maintenance</option>
                                <option value="Custom Work" {{ $checkin->service_type == 'Custom Work' ? 'selected' : '' }}>Custom Work</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="additional_notes" class="form-label">Additional Notes</label>
                            <textarea name="additional_notes" class="form-control">{{ old('additional_notes', $checkin->additional_notes) }}</textarea>
                        </div>
                    </div>
                </div>

              <div class="p-4 shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Car Images</h4>
                    <label for="car_images" class="form-label">Upload Car Images (optional)</label>
                    <input type="file" name="car_images[]" multiple class="form-control">
                    
                    @if($checkin->car_images)
                        <div class="mt-3">
                            <h5>Existing Images:</h5>
                            @foreach(explode(',', $checkin->car_images) as $image)
                                <div class="image-container mb-2">
                                    <img src="{{ url('public/' . $image) }}" alt="Car Image" width="80" height="60">
                                    <input type="hidden" name="existing_car_images[]" value="{{ $image }}">

                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>


                <div class="p-4 shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Arrival Information</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="arrival_datetime" class="form-label">Arrival Date & Time <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="arrival_datetime" value="{{ old('arrival_datetime', $checkin->arrival_datetime) }}" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="pickup_dropoff_mode" class="form-label">Pickup/Drop-off Mode <span class="text-danger">*</span></label>
                            <select name="pickup_dropoff_mode" class="form-select" required>
                                <option value="Self-drop" {{ $checkin->pickup_dropoff_mode == 'Self-drop' ? 'selected' : '' }}>Self-drop</option>
                                <option value="Pickup Service" {{ $checkin->pickup_dropoff_mode == 'Pickup Service' ? 'selected' : '' }}>Pickup Service</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
