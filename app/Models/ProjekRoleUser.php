<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjekRoleUser extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }    

    public function role() {
        return $this->belongsTo(Role::class);
    }        
    public function projek() {
        return $this->belongsTo(Projek::class);
    }        


}

