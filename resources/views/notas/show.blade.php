<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    

    <title>Notas del Estudiante: {{$student->name}}</title>
    <style>
      #titulo{
        text-align: center;
      }
      #notas{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }
      #notas td, #notas th {
        border: 1px solid #ddd;
        padding: 8px;
      }
      #notas th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: #fff;
      }
      #perdida{
        color: red;
        font-weight: bold;
      }
      #ganadaMinisterio{
        color: green;
        font-weight: bold;
      }
      #ganada{
        color: black;
        font-weight: bold;
      }
    </style>
  </head>
  <body>

    <div id="titulo">
      <h2>Notas del alumno:</h2>
      <h1>{{$student->name}}</h1>
    </div>
    <div>
      <table id="notas">
        <thead>
          <tr>
            <th scope="col">Cursos</th>
            @foreach ($bimestres as $bimestre)
                <th scope="col">{{$bimestre->name}}</th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          
                @foreach ($courses as $course)
                @if ($course->student_id == $student->id)
                <tr>
                <th scope="row">{{$course->name}}</th>
                @foreach ($points as $point)
                  @foreach ($bimestres as $bimestre)
                      @if ($point->bimestre_id == $bimestre->id && $point->course_id == $course->id && $point->activity_id == null)
                        @if ($point->punteo >=0 && $point->punteo < 60)
                          <td id="perdida">{{$point->punteo}}</td> 
                        @endif
                        @if ($point->punteo >=60 && $point->punteo < 70)
                          <td id="ganadaMinisterio">{{$point->punteo}}</td> 
                        @endif
                        @if ($point->punteo >=70 && $point->punteo <= 100)
                          <td id="ganada">{{$point->punteo}}</td> 
                        @endif
                      @endif
                  @endforeach
                @endforeach
                  
                </tr>
                @endif 
                @endforeach
        </tbody>
      </table>
    </div>

    
    

    
  </body>
</html>