<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function users(){
       return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }
}
