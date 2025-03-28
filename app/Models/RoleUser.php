<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;
    protected $table = 'role_user';

    public function pengguna()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function peranan_a()
    {
        return $this->hasOne(Role::class);
    }
}
