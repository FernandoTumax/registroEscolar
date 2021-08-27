@extends('layouts.plantilla')

@section('title', 'Crear Curso')

@section('content')
<div class="card mt-4 ms-4 me-4">
  <div class="card-header">
    <h3 class="text-center mt-3">Actualizar Curso</h3>
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" href="{{route('students.index')}}">Regresar</a>
      </li>
    </ul>
  </div>
    <form action="{{route('curso.update', [$course, $bimestre->id, $student->id])}}" method="POST">

        @csrf
        @method('put')

            <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="text" name="name" value="{{old('name', $course->name)}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Nombre</label>
            @error('name')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="text" name="punteo_final" value="{{old('punteo_final', $course->punto_final)}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Punteo Final</label>
            @error('punteo_final')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="text" name="punteo_neto" value="{{old('punteo_neto', $course->punto_neto)}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Punteo Neto</label>
            @error('punteo_neto')
                <small>*{{$message}}</small>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Guardar Bimestre</button>
      </form>
  </div>
@endsection