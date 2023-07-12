<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    use HasFactory;

    public function kitab()
    {
        return $this->belongsTo(Kitab::class,'kitab_id');
        // return $this->hasMany(Kitab::class);
    }
}
