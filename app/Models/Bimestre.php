<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimestre extends Model
{
    use HasFactory;

    public function courses(){
        return $this->hasMany(Course::class);
    }

    //Relacion de uno a muchos inversa

    public function point(){
        return $this->belongsTo(Point::class);
    }

}
