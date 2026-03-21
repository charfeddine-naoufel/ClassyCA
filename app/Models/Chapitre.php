<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;

    public function supports()
    {
        return $this->hasMany(Support::class);
    }
    public function seances()
    {
        return $this->hasMany(Seance::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function group()
    {
        return $this->hasOneThrough(Group::class, Course::class, 'id', 'id', 'course_id', 'group_id');
    }
}
