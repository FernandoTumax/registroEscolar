@extends('layouts.plantilla')

@section('title', 'Estudiantes')

@section('content')
<div class="card mt-4 ms-4 me-4">
    <h5 class="card-header text-center">Apartado de los estudiantes</h5>
    <div class="card-body">
        <div class="list-group">
            <a href="{{route('students.create')}}" class="btn btn-warning mb-3">Crear Estudiante</a>
            @foreach ($estudiantes as $student)
                <a href="{{route('students.show', $student)}}" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$student->name}}</h5>
                    <small>{{$student->carnet}}</small>
                </div>
                <p class="mb-1">{{$student->year}}</p>
                </a>
            @endforeach
        </div>
    </div>
  </div>
@endsection