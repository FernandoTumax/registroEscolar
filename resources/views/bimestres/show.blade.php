@extends('layouts.plantilla')

@section('title', $bimestre->name)
    
@section('content')
<div class="card text-center mt-4 ms-3 me-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
          <li>
              <a class="nav-link" href="{{route('students.show', $student)}}">Regresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('bimestres.edit', $bimestre)}}">Actualizar Bimestre</a>
          </li>
          <li class="nav-item">
            <form action="{{route('bimestres.destroy', $bimestre)}}" method="POST">
            @csrf
            @method('delete')
            <button class="nav-link">Eliminar Bimestre</button>
            </form>
          </li>
      </ul>
    </div>
    <div class="card-body">
        @foreach($courses as $course)
        <a href="{{route('curso.mostrar', [$course->id, $bimestre->id, $student->id])}}" class="list-group-item list-group-item-action" aria-current="true">
          <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1">{{$course->name}}</h5>
              @if ($course->punteo_final < 60)
                <small class="badge bg-danger rounded-pill"> {{$course->punteo_final}}/{{$course->punteo_neto}}</small>
              @endif
              @if ($course->punteo_final < 70 && $course->punteo_final >= 60)
              <small class="badge bg-primary rounded-pill"> {{$course->punteo_final}}/{{$course->punteo_neto}}</small>
              @endif
              @if ($course->punteo_final <= 100 && $course->punteo_final >= 70)
              <small class="badge bg-success rounded-pill"> {{$course->punteo_final}}/{{$course->punteo_neto}}</small>
              @endif
          </div>
          </a>
        @endforeach
    </div>
</div>
@endsection