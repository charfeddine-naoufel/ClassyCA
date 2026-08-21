<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Support;
use App\Models\Chapitre;

class Seance extends Model
{
    use HasFactory;

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }

    public function support()
    {
        return $this->belongsTo(Support::class);
    }


}
