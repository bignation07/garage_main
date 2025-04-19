<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStart extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_card_id',
        'start_date_time',
        'mechanic_assigned',
        'parts_purchased',
        'vendor_name',
        'invoice_details',
        'total_parts_cost',
        'estimated_service_charge',
        'margin_calculation',
        'status',
        'customer_notification_sent',
    ];

    public function jobCard()
    {
        return $this->belongsTo(JobCard::class);
    }
}
