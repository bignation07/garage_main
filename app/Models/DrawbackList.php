<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawbackList extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_checkin_id',
        'issue_name',
        'issue_severity',
        'additional_repairs',
        'mechanic_notes',
    ];

    public function vehicleCheckin()
    {
        return $this->belongsTo(VehicleCheckin::class);
    }
}
