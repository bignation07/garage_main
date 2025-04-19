<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name_of_parts',
        'mrp',
        'purchase_price',
        'selling_price',
        'profit',
        'qty',
        
    ];
      // Relationship (better method name for clarity)
    public function customer()
    {
        return $this->belongsTo(VehicleCheckin::class, 'customer_id');
    }
}
