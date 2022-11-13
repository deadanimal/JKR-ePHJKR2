<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbMesej extends Model
{
    use HasFactory;

    public function maklumbalas(){
        return $this->belongsTo(Maklumbalas::class);
    }
}