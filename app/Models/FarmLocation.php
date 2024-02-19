<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmLocation extends Model
{
    use HasFactory;
    protected $fillable = [
        'farm_id',
        'farm_location',
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class, 'farm_id', 'id');
    }


}
