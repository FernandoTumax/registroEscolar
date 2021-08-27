@extends('layouts.plantilla')

@section('title', 'Actualizar estudiante: '. $student->name)

@section('content')
<div class="card mt-4 ms-4 me-4">
    <div class="card-header">
      <h3 class="text-center mt-3">Actualizar Estudiante</h3>
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link" href="{{route('students.show', $student->id)}}">Regresar</a>
        </li>
      </ul>
    </div>
    <form action="{{route('students.update', $student)}}" method="POST">

        @csrf
        @method('put')

        <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="text" name="name" value="{{old('name', $student->name)}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Nombre</label>
            @error('name')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="form-floating mb-3 ms-3 me-3">
            <input type="text" class="form-control" name="carnet" value="{{old('carnet', $student->carnet)}}">
            <label class="floatingTextarea">Carnet</label>
            @error('carnet')
                <small>*{{$message}}</small>
            @enderror
          </div>   
          <div class="form-floating mb-3 ms-3 me-3">
            <input type="date" class="form-control" name="year" value="{{old('year', $student->year)}}">
            <label class="floatingTextarea">Año</label>
            @error('year')
                <small>*{{$message}}</small>
            @enderror
          </div> 
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Guardar estudiante</button>
      </form>
  </div>
@endsection