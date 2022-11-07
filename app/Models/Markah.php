<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Markah extends Model
{
    use HasFactory;

    public function kriteria() {
        return $this->belongsTo(Kriteria::class);
    }

    // public function gpss_kriteria() {
    //     return $this->belongsTo(GpssKriteria::class);
    // }
    
    

}
