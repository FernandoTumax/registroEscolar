@extends('layouts.plantilla')

@section('title', 'Curso '.$activity->name)
    
@section('content')
<div class="card mt-4 ms-3 me-3">
    <div class="card-header">
        <h3 class="text-center mt-2">{{$activity->name}}</h3>
        <ul class="nav nav-tabs card-header-tabs">
          <li class="nav-item">
            <a class="nav-link" aria-current="true" href="{{route('curso.mostrar', [$course->id, $bimestre, $student])}}">Regresar</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="true" href="{{route('activities.edit', $activity)}}">Actualizar Actividad</a>
            </li>
            <li class="nav-item">
              <form action="{{route('activities.destroy', $activity)}}" method="POST">
                @csrf
                @method('delete')
                <button class="nav-link">Eliminar Actividades</button>
              </form>
            </li>
          </ul>
    </div>
    <div class="card-body">
      @foreach($points as $point)
        <ul class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">
                  <label>Descripcion: </label>
                  <br>
                  {{$activity->descripcion}} <span class="badge bg-primary rounded-pill">{{$point->punteo}}/{{$activity->punteo_neto}}</span>
                </div>
                
              </div>
            </li>
            @if ($point->punteo == 0)
          <div class="text-center">
              <a href="{{route('points.edit', $point->id)}}" class="btn btn-secondary mt-3">Agregar nota</a>
          </div>
          @endif
          @if($point->punteo > 0)
          <div class="text-center">
              <a href="{{route('points.edit', $point->id)}}" class="btn btn-secondary mt-3">Actualizar nota</a>
          </div>
          @endif  
          </ul>
          @endforeach           
    </div>
</div>
@endsection