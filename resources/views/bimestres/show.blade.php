@extends('layouts.plantilla')

@section('title', $bimestre->name)
    
@section('content')
<div class="card text-center mt-4 ms-3 me-3">
    <div class="card-header">
      <ul class="nav nav-tabs card-header-tabs">
          <li>
              <a href="#">Regresar</a>
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
      {{$courses}}
    </div>
</div>
@endsection