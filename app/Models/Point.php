<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $guarded = [];

    //Relacion de uno a muchos

    public function bimestre(){
        return $this->belongsTo(Bimestre::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function activity(){
        return $this->belongsTo(Activity::class);
    }


}
