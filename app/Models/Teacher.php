<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
   
    public function matiere()
    {
        return $this->hasOne(Matiere::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    
}
