<?php

namespace App\Http\Controllers;

use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BimestreController extends Controller
{
    public function index(){
        $bimestres = Bimestre::all();

        return view('bimestres.index', compact('bimestres'));
    }


    public function create(){
        return view('bimestres.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $bimestre = Bimestre::create($request->all());

        return redirect()->route('home');

    }

    public function show(Bimestre $bimestre, Student $student){
        //$courses = Course::all()->where('bimestre_id', $bimestre->id);
        // $courses = DB::table('courses')->join('students', 'students.id', '=', '7');
        // $courses = DB::select('SELECT * FROM Courses WHERE bimestre_id = ? AND student_id = ?', [$bimestre->id, $student->id]);

        $coleccionCursos = [];

        $bimestres = Bimestre::with('points')->find($bimestre->id);

        $courses = Course::all()->where('student_id', $student->id);

        // foreach ($courses as $course) {
        //     foreach ($bimestre->points as $point) {
        //         if($point->bimestre_id == $bimestre->id && $point->course_id == $course->id) {
        //             array_push($coleccionCursos, $course, $point);
        //         }
        //     }
            
        // }

        // return $coleccionCursos;

        return view('bimestres.show', compact('bimestres', 'courses', 'student'));
    }

    public function edit(Bimestre $bimestre, Student $student){
        return view('bimestres.edit', compact('bimestre', 'student'));
    }

    public function update(Request $request, Bimestre $bimestre){
        $request->validate([
            'name' => 'required'
        ]);

        $bimestre->update($request->all());

        return redirect()->route('students.index');

    }

    public function destroy(Bimestre $bimestre){
        $bimestre->delete();

        return redirect()->route('home');
    }

}
