<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DrawbackPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'drawback_list_id',
        'issue_name',
        'spare_part_needed',
        'part_number',
        'estimated_cost',
        'parts_availability',
    ];

    public function drawbackList()
    {
        return $this->belongsTo(DrawbackList::class);
    }
}
