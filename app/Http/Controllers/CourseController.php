<?php

namespace App\Http\Controllers;

use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();

        return view('courses.index', compact('courses'));
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request, Bimestre $bimestre, Student $student){

        $request->validate([
            'name' => 'required'
        ]);

        $course = new Course();

        $course->name = $request->name;
        
        return $bimestre->id;

    }

    public function show(Course $course){
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course){
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course){
        $request->validate([
            'name' => 'required'
        ]);

        $course->update($request->all());

        return redirect()->route('courses.show', $course);

    }

    public function destroy(Course $course){
        $course->delete();

        return redirect()->route('courses.index');
    }

}
