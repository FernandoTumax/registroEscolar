@extends('layouts.plantilla')

@section('title', 'Estudiante '.$student->name)
    
@section('content')
<div class="card text-center mt-4 ms-3 me-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
          @foreach ($bimestres as $bimestre)
          <li class="nav-item">
            <a class="nav-link" aria-current="true" href="{{route('bimestre.mostrar', [$bimestre, $student])}}">{{$bimestre->name}}</a>
          </li>
          @endforeach
          <li class="nav-item">
            <a class="nav-link" href="{{route('notas.download', $student)}}">Boletas de Notas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('students.edit', $student)}}">Actualizar Estudiante</a>
          </li>
          <li class="nav-item">
            <form action="{{route('students.destroy', $student)}}" method="POST">
            @csrf
            @method('delete')
            <button class="nav-link">Eliminar Estudiante</button>
            </form>
          </li>
      </ul>
    </div>
    <div class="card-body">
      <h2 class="card-title" >{{$student->name}}</h2>
      <p class="card-text">{{$student->carnet}}</p>
      <p class="btn btn-primary">{{$student->year}}</p>
    </div>
</div>
@endsection