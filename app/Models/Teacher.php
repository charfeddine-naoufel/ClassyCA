<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom-fr',
        'nom-ar',
        'prenom-fr',
        'prenom-ar',
        'specialite',
        'email',
        'password',
        'adresse',
        'tel',
        'tel2',
        'bio',
    ];
   
    public function matiere()
    {
        return $this->hasOne(Matiere::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
       }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
    public function chapitres()
    {
        return $this->hasManyThrough(Chapitre::class, Course::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'courses', 'teacher_id', 'group_id');
    }

    
}
