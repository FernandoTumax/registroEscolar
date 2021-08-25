<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion de uno a muchos inversa

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function bimestre(){
        return $this->belongsTo(Bimestre::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }

    //Relacion de uno  a muchos

    public function points(){
        return $this->hasMany(Point::class);
    }

}
