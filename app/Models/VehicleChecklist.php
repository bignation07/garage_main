<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleChecklist extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'part_name', 'qty', 'rate', 'vehicle_checkin_id'];

    public function checkin()
    {
        return $this->belongsTo(VehicleCheckin::class, 'vehicle_checkin_id');
    }
}

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class VehicleChecklist extends Model
// {
//     use HasFactory;

//     // Define the fillable fields for mass assignment
//     protected $fillable = [
//         'category',
//         'part_name',
//         'qty',
//         'rate',
//     ];

//     // Optionally define custom timestamps
//     const CREATED_AT = 'created_at';
//     const UPDATED_AT = 'updated_at';
// }
