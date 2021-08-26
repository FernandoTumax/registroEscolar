<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    public function index(){
        return view('points.index');
    }

    public function create(){
        return view('points.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'punteo' => 'required',
            'date' => 'required'
        ]);

        $point = new Point();

        $point->punteo = $request->punteo;
        $point->date = $request->date;

        $point->save();

        return redirect()->route('points.show', $point);
    }


    public function show(Point $point){
        return view('points.show', compact('point'));
    }

    public function edit(Point $point){
        return view('points.edit', compact('point'));
    }

    public function update(Request $request, Point $point){
        $request->validate([
            'punteo' => 'required'
        ]);

        $point->update($request->all());

        return redirect()->route('home');
    }

    public function destroy(Point $point){
        $point->delete();

        return redirect()->route('home');
    }

}
