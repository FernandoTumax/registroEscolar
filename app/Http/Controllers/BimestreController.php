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

        return redirect()->route('bimestres.show', $bimestre);

    }

    public function show(Bimestre $bimestre){
        //$courses = Course::all()->where('bimestre_id', $bimestre->id);
        // $courses = DB::table('courses')->join('students', 'students.id', '=', '7');
        $courses = DB::select('SELECT * FROM Courses WHERE bimestre_id = ? AND student_id = ?', [$bimestre->id, 7]);

        foreach ($courses as $course) {
            $cursos = $course;
        }

        
        return view('bimestres.show', compact('bimestre', 'courses'));
    }

    public function edit(Bimestre $bimestre){
        return view('bimestres.edit', compact('bimestre'));
    }

    public function update(Request $request, Bimestre $bimestre){
        $request->validate([
            'name' => 'required'
        ]);

        $bimestre->update($request->all());

        return redirect()->route('bimestres.show', $bimestre);

    }

    public function destroy(Bimestre $bimestre){
        $bimestre->delete();

        return redirect()->route('home');
    }

}
