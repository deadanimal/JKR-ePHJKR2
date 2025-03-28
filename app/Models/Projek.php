<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Projek extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    use HasFactory;


    protected $guarded = ['id'];
    
    public function users() {
        return $this->hasMany(ProjekRoleUser::class);
    }  
    
    public function peranan() {
        return $this->hasMany(PenukaranPeranan::class);
    }
}
