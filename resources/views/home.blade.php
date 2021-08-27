@extends('layouts.plantilla')

@section('title', 'Home')
    
@section('content')
<div class="card me-3 ms-3 mt-3">
  <div class="card-header">
    <h3 class="text-center mt-3 mb-3">Pagina principal del director</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped table-hover">
      <thead>
        <tr>
          <th scope="col" class="text-center">Elementos del colegio</th>
          <th scope="col" class="text-center">Opciones</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Bimestres</th>
          <td class="text-center"><a href="{{route('bimestres.create')}}" class="btn btn-success">Crear Bimestre</a></td>
        </tr>
        <tr>
          <th scope="row">Cursos</th>
          <td class="text-center"><a href="{{route('courses.create')}}" class="btn btn-success">Crear Bimestre</a></td>
        </tr>
        <tr>
          <th scope="row">Actividades</th>
          <td colspan="2" class="text-center"><a href="{{route('activities.create')}}" class="btn btn-success">Crear Bimestre</a></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection