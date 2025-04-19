<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatedInspection extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_checkin_id',
        'inspection_report',
        'issues_identified',
        'parts_required',
        'estimated_cost',
        'approval_status',
        'customer_approval_method',
        'approval_date_time',
        'customer_signature',
    ];

    protected $casts = [
        'issues_identified' => 'array',
    ];

    public function vehicleCheckin()
    {
        return $this->belongsTo(VehicleCheckin::class);
    }
}
