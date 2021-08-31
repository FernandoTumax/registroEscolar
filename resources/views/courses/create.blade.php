@extends('layouts.plantilla')

@section('title', 'Crear Curso')

@section('content')
<div class="card mt-4 ms-4 me-4">
  <div class="card-header">
    <h3 class="text-center mt-3">Crear Curso</h3>
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">Regresar</a>
      </li>
    </ul>
  </div>
    <form action="{{route('courses.store')}}" method="POST">

        @csrf

        <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="text" name="name" value="{{old('name')}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Nombre</label>
            @error('name')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="text" name="punteo_neto" value="{{old('punteo_neto')}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Punteo Neto</label>
            @error('punteo_neto')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <select class="form-select" name="student_id">
                @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
            <label class="floatingTextarea">Estudiante</label>
          </div>
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Guardar Curso</button>
      </form>
  </div>
@endsection