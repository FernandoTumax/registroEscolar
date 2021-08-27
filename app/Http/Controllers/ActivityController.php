<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Bimestre;
use App\Models\Course;
use App\Models\Point;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index(){
        $activities = Activity::all();

        return view('activities.index', compact('activities'));
    }

    public function create(){

        $courses = Course::all();
        $bimestres = Bimestre::all();

        return view('activities.create', compact('courses', 'bimestres'));
    }

    public function store(Request $request, Course $course){
        $request->validate([
            'name' => 'required',
            'punteo_neto' => 'required',
            'descripcion' => 'required'
        ]);

        // $activity = Activity::create($request->all());

        $activity = new Activity();

        $activity->name = $request->name;
        $activity->punteo_neto = $request->punteo_neto;
        $activity->descripcion = $request->descripcion;
        $activity->course_id = $request->course_id;

        $activity->save();

        $point = new Point();

        $point->punteo = 0;
        $point->date = date('Y-m-d');
        $point->bimestre_id = $request->bimestre_id;
        $point->activity_id = $activity->id;

        $point->save();

        return redirect()->route('students.index');
    }

    public function show(Activity $activity, Course $course, Bimestre $bimestre, Student $student){

        $points = DB::select('SELECT * FROM Points WHERE activity_id = ? AND bimestre_id = ?', [$activity->id, $bimestre->id]);

        return view('activities.show', compact('activity', 'points', 'course',  'bimestre', 'student'));
    }

    public function edit(Activity $activity){
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity){
        $request->validate([
            'name' => 'required',
            'punteo_neto' => 'required',
            'descripcion' => 'required'
        ]);

        $activity->update($request->all());

        return redirect()->route('students.index');

    }

    public function destroy(Activity $activity){

        //DB::table('points')->where('activity_id')

        $activity->delete();

        return redirect()->route('home');
    }

}
