<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
