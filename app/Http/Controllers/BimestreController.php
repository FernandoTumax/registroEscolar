<?php

namespace App\Http\Controllers;

use App\Models\Bimestre;
use Illuminate\Http\Request;

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
        return view('bimestres.show', compact('bimestre'));
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

        return redirect()->route('bimestres.index');
    }

}
