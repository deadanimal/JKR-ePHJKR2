<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkahRayuan extends Model
{
    use HasFactory;
    
    public function kriteria() {
        return $this->belongsTo(Kriteria::class);
    }

    public function rayuan_kriteria() {
        return $this->belongsTo(RayuanKriteria::class);
    }
}
