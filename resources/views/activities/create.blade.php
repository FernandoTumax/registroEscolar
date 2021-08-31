@extends('layouts.plantilla')

@section('title', 'Crear Actividades')
    
@section('content')
    <div class="card mt-4 ms-4 me-4">
        <div class="card-header">
            <h3 class="text-center mt-3">Crear Actividad</h3>
            <ul class="nav nav-tabs card-header-tabs">
              <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">Regresar</a>
              </li>
            </ul>
          </div>
    <form action="{{route('activities.store')}}" method="POST">

        @csrf

        <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="text" name="name" value="{{old('name')}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Nombre</label>
            @error('name')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <input type="number" name="punteo_neto" value="{{old('punteo_neto')}}" class="form-control" aria-describedby="emailHelp">
            <label class="floatingTextarea">Punteo Neto</label>
            @error('punteo_neto')
                <small>*{{$message}}</small>
            @enderror
        </div>
        <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <textarea class="form-control" name="descripcion">{{old('descripcion')}}</textarea>
            <label for="floatingTextarea">Descripcion</label>
            @error('descripcion')
                <small>*{{$message}}</small>
            @enderror
          </div>
          <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <select class="form-select" name="course_id">
                @foreach ($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
            <label class="floatingTextarea">Curso</label>
          </div>
          <div class="form-floating mb-3 ms-3 me-3 mt-3">
            <select class="form-select" name="bimestre_id">
                @foreach ($bimestres as $bimestre)
                    <option value="{{$bimestre->id}}">{{$bimestre->name}}</option>
                @endforeach
            </select>
            <label class="floatingTextarea">Bimestre</label>
          </div>
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Guardar Bimestre</button>
      </form>
    </div>
    
@endsection