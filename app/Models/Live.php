<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}
