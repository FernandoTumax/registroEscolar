@extends('layouts.plantilla')

@section('title', 'Actualizar estudiante: '. $student->name)

@section('content')
<div class="card mt-4 ms-4 me-4">
    <h5 class="card-header text-center">Actualizar Estudiante</h5>
    <form action="{{route('students.update', $student)}}" method="POST">

        @csrf
        @method('put')

        <div class="mb-3 ms-3 me-3 mt-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" value="{{old('name', $student->name)}}" class="form-control" aria-describedby="emailHelp">
            @error('name')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3 ms-3 me-3">
            <label class="form-label">Carnet</label>
            <input type="text" class="form-control" name="carnet" value="{{old('carnet', $student->carnet)}}">
            @error('carnet')
                <small>*{{$message}}</small>
            @enderror
          </div>   
          <div class="mb-3 ms-3 me-3">
            <label class="form-label">Año</label>
            <input type="date" class="form-control" name="year" value="{{old('year', $student->year)}}">
            @error('year')
                <small>*{{$message}}</small>
            @enderror
          </div> 
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Guardar estudiante</button>
      </form>
  </div>
@endsection