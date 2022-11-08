<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    public function markah() {
        return $this->hasMany(Markah::class);
    }
    
    public function eph_bangunan_rayuan_markah() {
        return $this->hasMany(EphBangunanRayuanMarkah::class);
    }
    
}
