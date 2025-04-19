<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_checkin_id',
        'inspection_item',
        'check',
        'deficiencies',
        'services_performed',
    ];
     // Relationship with VehicleCheckin
    public function vehicleCheckin()
    {
        return $this->belongsTo(VehicleCheckin::class, 'vehicle_checkin_id');
    }
}
