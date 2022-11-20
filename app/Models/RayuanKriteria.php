<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RayuanKriteria extends Model
{
    use HasFactory;

    public function markah_rayuan() {
        return $this->hasMany(MarkahRayuan::class);
    }
}
