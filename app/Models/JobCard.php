<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_card_number',
        'vehicle_checkin_id',
        'service_advisor',
        'mechanic',
        'expected_delivery_date',
        'fuel_level',
        'vehicle_condition',
        'additional_work',
        // 'estimated_cost',
        'advance_payment',
        'customer_signature',
    ];

    protected $casts = [
        'vehicle_condition' => 'array',
    ];

    public function vehicleCheckin()
    {
        return $this->belongsTo(VehicleCheckin::class);
    }
    
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class JobCard extends Model
// {
//     //
// }
