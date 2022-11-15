<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpssKriteria extends Model
{
    use HasFactory;

    
    // Mai tambah
    public function gpssmarkah() {
        return $this->hasMany(GpssMarkah::class);
    }
    
    public function gpss_markah_rayuan() {
        return $this->hasMany(GpssMarkahRayuan::class);
    }
}
