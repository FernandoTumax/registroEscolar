<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    //Relacion de uno a muchos

    public function bimestres(){
        return $this->hasMany(Bimestre::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

}
