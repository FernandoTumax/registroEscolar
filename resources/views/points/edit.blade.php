@extends('layouts.plantilla')
@section('title', 'Actualizar Punteos de la actividad')
@section('content')
<div class="card mt-4 ms-4 me-4">
    <h5 class="card-header text-center">Actualizar Punteo</h5>
    <form action="{{route('points.update', $point)}}" method="POST">
        @csrf
        @method('put')

        <div class="mb-3 ms-3 me-3 mt-3">
            <label class="form-label">Puntos</label>
            <input type="text" name="punteo" value="{{old('punteo', $point->punteo)}}" class="form-control" aria-describedby="emailHelp">
            @error('punteo')
                <small>*{{$message}}</small>
            @enderror
          </div>
        <button type="submit" class="btn btn-primary mb-3 ms-4 me-4">Actualizar Punteo</button>
      </form>
  </div>
@endsection