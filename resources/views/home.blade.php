@extends('layouts.plantilla')

@section('title', 'Home')
    
@section('content')
<h1 class="text-center mt-3 mb-3">Pagina principal del director</h1>
    <div class="mt-3 me-3 ms-3">
        <ul class="list-group ">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold mt-1">Bimestres<a href="{{route('bimestres.create')}}" class="ms-4 btn btn-success">Crear Bimestre</a></div>
              </div>
            </li>
          </ul>
    </div>
@endsection