<?php

namespace App\Http\Controllers;

use App\Models\Course;
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

    public function store(Request $request){

        $request->validate([
            'name' => 'required'
        ]);

    }

    public function show(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }

}
