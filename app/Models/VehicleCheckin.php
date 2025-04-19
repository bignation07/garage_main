<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCheckin extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 'contact_number', 'email', 'address',
        'vehicle_registration_number', 'make_model', 'year_of_manufacture',
        'chassis_number', 'engine_number', 'fuel_type', 'odometer_reading',
        'service_type', 'additional_notes', 'car_images', 'arrival_datetime',
        'pickup_dropoff_mode','battery_number', 'car_tire'
    ];

    protected $casts = [
        'car_images' => 'array',
        'arrival_datetime' => 'datetime',
    ];
      public function checklists()
    {
        return $this->hasMany(VehicleChecklist::class);
    }
    // VehicleCheckin Model
    public function profitReports()
    {
        return $this->hasMany(ProfitReport::class);
    }


   public function finalBill()
{
    return $this->hasOne(\App\Models\FinalBill::class);
}

}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class VehicleCheckin extends Model
// {
//     //
// }
