<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Course;
use App\Models\Point;
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

        return view('activities.create', compact('courses'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'punteo_neto' => 'required',
            'descripcion' => 'required'
        ]);

        $activity = Activity::create($request->all());

        $point = new Point();

        $point->punteo = 0;
        $point->date = date('Y-m-d');
        $point->bimestre_id = null;
        $point->activity_id = $activity->id;

        $point->save();

        return redirect()->route('activities.show', $activity);
    }

    public function show(Activity $activity){

        $points = DB::select('SELECT * FROM Points WHERE activity_id = ?', [$activity->id]);

        
        return view('activities.show', compact('activity', 'points'));
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

        return redirect()->route('activities.show', $activity);

    }

    public function destroy(Activity $activity){
        $activity->delete();

        return redirect()->route('activities.index');
    }

}
