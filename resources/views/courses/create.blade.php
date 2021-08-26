@extends('layouts.plantilla')

@section('title', 'Crear Curso')

@section('content')
<div class="card mt-4 ms-4 me-4">
    <h5 class="card-header text-center">Crear Curso</h5>
    <form action="{{route('courses.store')}}" method="POST">

        @csrf

        <div class="mb-3 ms-3 me-3 mt-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" aria-describedby="emailHelp">
            @error('name')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="mb-3 ms-3 me-3 mt-3">
            <label class="form-label">Estudiante</label>
            <select name="student_id">
                @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
          </div>
          <div class="mb-3 ms-3 me-3 mt-3">
              <label class="form-label">Bimestre</label>
            <select name="bimestre_id">
                @foreach ($bimestres as $bimestre)
                    <option value="{{$bimestre->id}}">{{$bimestre->name}}</option>
                @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Guardar Bimestre</button>
      </form>
  </div>
@endsection