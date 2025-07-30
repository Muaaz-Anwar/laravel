<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    public function contact () {
        return $this->hasOne(Contact::class);
    }
    public function book () {
        return $this->hasMany(Library::class);
    }
}
