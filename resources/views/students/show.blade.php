@extends('layouts.plantilla')

@section('title', 'Estudiante '.$student)
    
@section('content')
<div class="card text-center mt-4 ms-3 me-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
          @foreach ($bimestres as $bimestre)
          <li class="nav-item">
            <a class="nav-link" aria-current="true" href="#">{{$bimestre->name}}</a>
          </li>
          @endforeach
      </ul>
    </div>
    <div class="card-body">
      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
@endsection