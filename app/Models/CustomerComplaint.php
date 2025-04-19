<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_checkin_id',
        'description',
        'complaint_type',
        'previous_repairs_done',
        'urgency_level',
    ];

    // Relationship to VehicleCheckin model
    public function vehicleCheckin()
    {
        return $this->belongsTo(VehicleCheckin::class);
    }
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class CustomerComplaint extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'vehicle_checkin_id',
//         'description',
//         'complaint_type',
//         'previous_repairs_done',
//         'urgency_level',
//     ];

//     public function vehicleCheckin()
//     {
//         return $this->belongsTo(VehicleCheckin::class);
//     }
// }
