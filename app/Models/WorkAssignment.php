<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkAssignment extends Model {
    use HasFactory;

    protected $fillable = ['vehicle_checkin_id', 'name_of_work', 'completed', 'result', 'mechanic'];

    public function vehicleCheckin() {
        return $this->belongsTo(VehicleCheckin::class);
    }
}
