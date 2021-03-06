<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Point;
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

        $bimestres = Bimestre::all();

        

        $course = new Course();

        $course->name = $request->name;
        $course->punteo_neto = $request->punteo_neto;
        $course->student_id = $request->student_id;

        $course->save();

        foreach ($bimestres as $bimestre) {
            $point = new Point();
            $point->punteo = 0;
            $point->date = date('Y-m-d');
            $point->bimestre_id = $bimestre->id;
            $point->course_id = $course->id;
            $point->save();
        }

        return redirect()->route('students.index');

    }

    public function show(Course $course, Bimestre $bimestre, Student $student){

        $actividades = Activity::all()->where('course_id', $course->id);

        $points = $course->points;

        $puntos = null;

        foreach ($points as $point) {
            if ($point->bimestre_id == $bimestre->id && $point->course_id == $course->id && $point->activity_id == null) {
                $puntos = $point;
            }
        }

        

        // $cursos = DB::select('SELECT * FROM Courses WHERE id = ?', [$course->id]);

        // foreach ($cursos as $curso) {
        //     $students = DB::select('SELECT * FROM Students WHERE id = ?', [$curso->student_id]);
        // }

        // $actividades = DB::select('SELECT * FROM Activities INNER JOIN Points ON Activities.course_id = ? WHERE Points.bimestre_id = ?', [$course->id, $bimestre->id]);

        return view('courses.show', compact('course', 'actividades', 'bimestre', 'student', 'puntos', 'points'));
    }

    public function edit(Course $course, Bimestre $bimestre, Student $student){
        $bimestres = Bimestre::all();
        $students = Student::all();

        return view('courses.edit', compact('course', 'bimestres', 'students', 'bimestre', 'student'));
    }

    public function editar(Course $course, Bimestre $bimestre, Student $student){
        return view('courses.editar', compact('course', 'bimestre', 'student'));
    }


    public function update(Request $request, Course $course, Bimestre $bimestre, Student $student){
        $request->validate([
            'name' => 'required',
            'punteo_final' => 'required'
        ]);

        $course->name = $request->name;
        $course->punteo_final = $request->punteo_final;
        $course->punteo_neto = $request->punteo_neto;
        $course->bimestre_id = $bimestre->id;
        $course->student_id = $student->id;

        $course->save();

        return redirect()->route('students.index');

    }

    public function actualizar(Request $request, Course $course){
        $request->validate([
            'punteo_final' => 'required'
        ]);

        $course->name = $course->name;
        $course->punteo_final = $request->punteo_final;
        $course->punteo_neto = $course->punteo_neto;
        $course->bimestre_id = $course->bimestre_id;
        $course->student_id = $course->student_id;

        $course->save();

        return redirect()->route('student.index');

    }

    public function destroy(Course $course){
        $course->delete();

        return redirect()->route('home');
    }

}
