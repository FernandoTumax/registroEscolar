<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstudent;
use App\Models\Bimestre;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $estudiantes = Student::all();

        return view('students.index', compact('estudiantes')); 
    }

    public function create(){
        return view('students.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'carnet' => 'required',
            'year' => 'required'
        ]);

        $student = new Student();

        $student->name = $request->name;
        $student->carnet = $request->carnet;
        $student->year = $request->year;


        $student = Student::create($request->all());

        return redirect()->route('students.show', $student);
    }

    public function show(Student $student){
        $bimestres = Bimestre::all();


        return view('students.show', compact('student', 'bimestres'));
    }

    public function edit(Student $student){
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student){
        $request->validate([
            'name' => 'required',
            'carnet' => 'required',
            'year' => 'required'
        ]); 

        $student->update($request->all());

        return redirect()->route('students.show', $student);

    }

    public function destroy(Student $student){
        $student->delete();

        return redirect()->route('students.index');
    }

}
