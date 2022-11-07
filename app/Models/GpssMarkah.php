<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpssMarkah extends Model
{
    use HasFactory;

    public function gpsskriteria() {
        return $this->belongsTo(GpssKriteria::class);
    }
}
