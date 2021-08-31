<?php

namespace App\Http\Controllers;

use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Point;
use App\Models\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function getAllNotas(Student $student){
        $bimestres = Bimestre::all();
        $courses = Course::all();
        $points = Point::all();

        return view('notas.show', compact('student', 'bimestres', 'courses', 'points'));

    }

    public function donwloadPDF(Student $student){
        $bimestres = Bimestre::all();
        $courses = Course::all();
        $points = Point::all();
        $pdf = PDF::loadView('notas.show', compact('student', 'bimestres', 'courses', 'points'));

        return $pdf->download('notas '. $student->name . '.pdf');

    }
}
