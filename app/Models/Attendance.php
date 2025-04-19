<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_name', 'employee_id', 'date', 'check_in_time', 'check_out_time', 
        'total_working_hours', 'breaks_taken', 'leave_status'
    ];
}

