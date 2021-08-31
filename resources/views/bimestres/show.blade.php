@extends('layouts.plantilla')

@section('title', $bimestres->name)
    
@section('content')
<div class="card text-center mt-4 ms-3 me-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
          <li>
              <a class="nav-link" href="{{route('students.show', $student)}}">Regresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('bimestres.edit', $bimestres)}}">Actualizar Bimestre</a>
          </li>
          <li class="nav-item">
            <form action="{{route('bimestres.destroy', $bimestres)}}" method="POST">
            @csrf
            @method('delete')
            <button class="nav-link">Eliminar Bimestre</button>
            </form>
          </li>
      </ul>
    </div>
    <div class="card-body">
      @foreach ($courses as $course)
          @foreach ($bimestres->points as $point)
              @if ($point->bimestre_id == $bimestres->id && $point->course_id == $course->id && $point->activity_id == null)
              <a href="{{route('curso.mostrar', [$course->id, $bimestres->id, $student->id])}}" class="list-group-item list-group-item-action" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$course->name}}</h5>
                    @if ($point->punteo < 60)
                      <small class="badge bg-danger rounded-pill"> {{$point->punteo}}/{{$course->punteo_neto}}</small>
                      
                    @endif
                    @if ($point->punteo < 70 && $point->punteo >= 60)
                    <small class="badge bg-primary rounded-pill"> {{$point->punteo}}/{{$course->punteo_neto}}</small>
                    @endif
                    @if ($point->punteo <= 100 && $point->punteo >= 70)
                    <small class="badge bg-success rounded-pill"> {{$point->punteo}}/{{$course->punteo_neto}}</small>
                    @endif
                </div>
                </a>
              @endif
          @endforeach
      @endforeach
    </div>
</div>
@endsection