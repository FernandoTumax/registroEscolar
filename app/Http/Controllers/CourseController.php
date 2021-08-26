<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    public function create(){

        $bimestres = Bimestre::all();
        $students = Student::all();

        return view('courses.create', compact('bimestres', 'students'));
    }

    public function store(Request $request, Bimestre $bimestre, Student $student){

        $request->validate([
            'name' => 'required'
        ]);

        $course = new Course();

        $course->name = $request->name;
        $course->punteo_final = 0;
        $course->bimestre_id = $request->bimestre_id;
        $course->student_id = $request->student_id;

        $course->save();

        return redirect()->route('courses.show', $course);

    }

    public function show(Course $course){

        $actividades = DB::select('SELECT * FROM Activities WHERE course_id = ?', [$course->id]);

        return view('courses.show', compact('course', 'actividades'));
    }

    public function edit(Course $course){
        $bimestres = Bimestre::all();
        $students = Student::all();

        return view('courses.edit', compact('course', 'bimestres', 'students'));
    }

    public function update(Request $request, Course $course){
        $request->validate([
            'name' => 'required',
            'punteo_final' => 'required'
        ]);

        $course->update($request->all());

        return redirect()->route('courses.show', $course);

    }

    public function destroy(Course $course){
        $course->delete();

        return redirect()->route('home');
    }

}
