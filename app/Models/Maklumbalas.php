<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maklumbalas extends Model
{
    use HasFactory;

    public function mbmesej(){
        return $this->hasOne(MbMesej::class);
    }
}
