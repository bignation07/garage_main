<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_name', 'employee_id', 'department', 'basic_salary', 
        'attendance', 'overtime_hours', 'deductions', 
        'net_salary', 'payment_status', 'payment_mode'
    ];
}

