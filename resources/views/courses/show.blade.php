@extends('layouts.plantilla')

@section('title', 'Curso : '. $course->name)
    
@section('content')

<div class="card text-center mt-4 ms-3 me-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
          <li>
              <a class="nav-link" href="{{route('bimestre.mostrar', [$bimestre->id, $student->id])}}">Regresar</a>         
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('curso.edit', [$course, $bimestre->id, $student->id])}}">Actualizar Curso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('curso.editar', [$course, $bimestre->id, $student->id])}}">Actualizar nota</a>
          </li>
          <li class="nav-item">
            <form action="{{route('courses.destroy', $course)}}" method="POST">
            @csrf
            @method('delete')
            <button class="nav-link">Eliminar Curso</button>
            </form>
          </li>
      </ul>
    </div>
    <div class="card-body">
      @foreach ($actividades as $activity)
       <div class="list-group">
            <a href="{{route('actividad.mostrar', [$activity->id, $course, $bimestre->id, $student->id])}}" class="list-group-item list-group-item-action mb-3" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{$activity->name}}</h5>
                <small>{{$activity->descripcion}}</small>
            </div>
            </a>
          </div>
       @endforeach
    </div>
</div>

@endsection