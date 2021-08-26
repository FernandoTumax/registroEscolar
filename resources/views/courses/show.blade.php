@extends('layouts.plantilla')

@section('title', 'Curso : '. $course->name)
    
@section('content')

<div class="card text-center mt-4 ms-3 me-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
          <li>
              <a class="nav-link" href="#">Regresar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('courses.edit', $course)}}">Actualizar Curso</a>
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
       
    </div>
</div>

@endsection