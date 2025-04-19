@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="pb-5">

        <div class="d-flex justify-content-between align-items-center flex-wrap ps-3 pe-3  bg-dark shadow-md">
            <h2 class="pt-4 pb-3 text-light">Vehicle Arrival at Garage</h2>
            <div>
                
             <a href="{{ route('job-cards.create') }}" class="btn btn-primary ">Add Job Cards</a>
             <a href="{{ route('vehicle-checkin.index') }}" class="btn btn-primary ">View Vehicle</a>
            </div>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            @endif

            <form action="{{ route('vehicle-checkin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-4  shadow-md bg-light">
                    <h4 class="text-primary pb-3 pt-3">Customer Details</h4>
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label for="customer_name" class="form-label">Customer Name <span class="text-danger">*</span></label>
                            <input type="text" name="customer_name" placeholder="Enter Customer Name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="contact_number" class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="text" name="contact_number" placeholder="Enter Contact Number" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="form-label">Email (optional)</label>
                            <input type="email" name="email" placeholder="Email (optional)" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="address" class="form-label"> Enter Address <span class="text-danger">*</span></label>
                            <textarea name="address" placeholder="Address" class="form-control" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="p-4  shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Vehicle Details</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="vehicle_registration_number" class="form-label">Vehicle Registration Number <span class="text-danger">*</span></label>
                            <input type="text" name="vehicle_registration_number" placeholder=" Enter Vehicle Registration Number" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="make_model" class="form-label">Make & Model <span class="text-danger">*</span></label>
                            <input type="text" name="make_model" placeholder=" Enter Make & Model" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="year_of_manufacture" class="form-label">Year of Manufacture <span class="text-danger">*</span></label>
                            <input type="number" name="year_of_manufacture" placeholder=" Enter Year of Manufacture" class="form-control" required>
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
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="CNG">CNG</option>
                                <option value="Electric">Electric</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="odometer_reading" class="form-label">Odometer Reading <span class="text-danger">*</span></label>
                            <input type="number" name="odometer_reading" placeholder="Enter Odometer Reading" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="p-4  shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Service Information</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="service_type" class="form-label">Service Type <span class="text-danger">*</span></label>
                            <select name="service_type" class="form-select" required>
                                <option value="General Service">General Service</option>
                                <option value="Accidental Repair">Accidental Repair</option>
                                <option value="Periodic Maintenance">Periodic Maintenance</option>
                                <option value="Custom Work">Custom Work</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="additional_notes" class="form-label">Additional Notes</label>
                            <textarea name="additional_notes" placeholder="Enter Additional Notes" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="p-4 shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Car Images</h4>
                    <label for="car_images" class="form-label">Upload Car Images</label>
                    <input type="file" name="car_images[]" multiple class="form-control" id="car_images">
                    
                    <div id="imagePreview" class="d-flex flex-wrap gap-2 mt-3"></div>
                </div>

                <div class="p-4  shadow-md bg-light mt-2">
                    <h4 class="text-primary mt-4 pb-3">Arrival Information</h4>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="arrival_datetime" class="form-label">Arrival Date & Time <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="arrival_datetime" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="pickup_dropoff_mode" class="form-label">Pickup/Drop-off Mode <span class="text-danger">*</span></label>
                            <select name="pickup_dropoff_mode" class="form-select" required>
                                <option value="Self-drop">Self-drop</option>
                                <option value="Pickup Service">Pickup Service</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Image preview JavaScript -->


<script>
    document.getElementById('car_images').addEventListener('change', function (event) {
        let preview = document.getElementById('imagePreview');
        
        // Loop through each file selected
        for (let i = 0; i < event.target.files.length; i++) {
            let file = event.target.files[i];
            let reader = new FileReader();

            // Event when the file is read
            reader.onload = function (e) {
                let img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('rounded');
                img.style.width = '100px';
                img.style.height = '100px';
                img.style.objectFit = 'cover';
                
                // Append the image to the preview div
                preview.appendChild(img);
            }

            reader.readAsDataURL(file);  // Read the file as a data URL
        }
    });
</script>


</div>
@endsection
