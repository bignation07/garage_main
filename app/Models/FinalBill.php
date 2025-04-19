<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalBill extends Model {
    use HasFactory;

    protected $fillable = [
        'vehicle_checkin_id',
        'job_card_id',
        'customer_name',
        'contact_number',
        'vehicle_registration_number',
        'service_details',
       
    ];

    public function vehicleCheckin() {
        return $this->belongsTo(VehicleCheckin::class);
    }

    public function jobCard() {
        return $this->belongsTo(JobCard::class);
    }
}


