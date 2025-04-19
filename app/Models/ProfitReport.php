<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfitReport extends Model
{
    protected $fillable = [
        'vehicle_checkin_id',
        'name_of_parts',
        'selling_price',
        'qty',
        'profit'
    ];

    // Relationship with VehicleCheckin
    public function vehicleCheckin()
    {
        return $this->belongsTo(VehicleCheckin::class, 'vehicle_checkin_id');
    }
}
