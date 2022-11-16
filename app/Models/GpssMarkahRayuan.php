<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpssMarkahRayuan extends Model
{
    use HasFactory;

    public function gpsskriteria() {
        return $this->belongsTo(GpssKriteria::class);
    }
}
