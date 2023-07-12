<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitab extends Model
{
    use HasFactory;

    public function bab()
    {
        return $this->hasMany(Bab::class);
        // return $this->belongsTo(Bab::class,'kitab_id');
    }
}
