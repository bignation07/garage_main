<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorPayment extends Model
{
    protected $fillable = [
        'vendor_name', 'invoice_number', 'purchase_date', 
        'parts_list', 'total_cost', 'payment_status', 'payment_method'
    ];
}

