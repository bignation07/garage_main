<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'employee_name', 'employee_id', 'leave_type', 'leave_start_date', 
        'leave_end_date', 'total_days_requested', 'leave_approval_status'
    ];
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Leave extends Model
// {
//     //
// }
