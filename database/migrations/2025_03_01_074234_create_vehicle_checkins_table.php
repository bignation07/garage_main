<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 
    public function up()
    {
        Schema::create('vehicle_checkins', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('vehicle_registration_number');
            $table->string('make_model');
            $table->integer('year_of_manufacture');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->enum('fuel_type', ['Petrol', 'Diesel', 'CNG', 'Electric']);
            $table->integer('odometer_reading');
            $table->enum('service_type', ['General Service', 'Accidental Repair', 'Periodic Maintenance', 'Custom Work']);
            $table->text('additional_notes')->nullable();
            $table->json('car_images')->nullable();
            $table->timestamp('arrival_datetime');
            $table->enum('pickup_dropoff_mode', ['Self-drop', 'Pickup Service']);
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_checkins');
    }
};
