@extends('layouts.plantilla')

@section('title', 'Crear Bimestre')

@section('content')
<div class="card mt-4 ms-4 me-4">
    <h5 class="card-header text-center">Crear Bimestre</h5>
    <form action="{{route('bimestres.store')}}" method="POST">

        @csrf

        <div class="mb-3 ms-3 me-3 mt-3">
            <label class="form-label">Nombre</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control" aria-describedby="emailHelp">
            @error('name')
                <small>*{{$message}}</small>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Guardar Bimestre</button>
      </form>
  </div>
@endsection