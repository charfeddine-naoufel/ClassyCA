<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    public function chapitres()
    {
        return $this->hasMany(Chapitre::class);
    }
    // public function groups()
    // {
    //     return $this->hasMany(Group::class);
    // }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

}
