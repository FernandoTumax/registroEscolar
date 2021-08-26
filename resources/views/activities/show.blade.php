@extends('layouts.plantilla')

@section('title', 'Curso '.$activity->name)
    
@section('content')
<div class="card mt-4 ms-3 me-3">
    <div class="card-header">
        <h3 class="text-center mt-2">{{$activity->name}}</h3>
        <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link" aria-current="true" href="#">Actualizar Actividad</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Eliminar Actividad</a>
            </li>
          </ul>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">
                    <label>Descripcion: </label>
                    <br>
                    {{$activity->descripcion}}
                </div>
              </div>
              @foreach ($points as $point)
              <span class="badge bg-primary rounded-pill">{{$point->punteo}}/{{$activity->punteo_neto}}</span>
              @endforeach
            </li>
          </ul>
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
    </div>
</div>
@endsection