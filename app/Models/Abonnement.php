<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
