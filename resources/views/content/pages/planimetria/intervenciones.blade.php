@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Planimetria')

@section('content')
@role('upa|uep')
<h4>Listado de intervenciones del departamento</h4>

        <a href="{{route('GenericoPlanimetriaController.create')}}" class="btn rounded-pill btn-primary">Nuevo</a>
        <br></br>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
         <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
         <div class="col-md-3 col-3 mb-4">
          <form class="d-flex" action="{{route('GenericoPlanimetriaController.searchSGSP')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="SGSP, Novedad" aria-label="Search" autocomplete="off" name="busqueda" required>
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form> 
          </div>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
<!-- Inicio de la tabla -->
<div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <tr>
          <th>HORA</th>
          <th>FECHA</th>
          <th>SGSP</th>
          <th>TIPO DE TRABAJO</th>
          <th>DIBUJANTE</th>
          <th>ESTADO</th>
          <th>Acciones</th>
        </tr>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      </thead>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      <tbody class="table-border-bottom-0">
            @foreach($eventPlanimetrias as $eventPlanimetria)
            <tr>
                <td><strong>{{date('H:i', strtotime($eventPlanimetria->created_at))}}</strong></td>
                <td>{{date('d - M', strtotime($eventPlanimetria->created_at))}}</td>
                <td>{{ $eventPlanimetria->sgsp}}</td>
                <td>
                  @if(($eventPlanimetria->tipo_trabajo)=='Joyas')
                    <span class="badge bg-label-success">JOYAS</span>
                  @elseif(($eventPlanimetria->tipo_trabajo)=='Facial')
                    <span class="badge bg-label-danger">FACIAL</span>
                  @elseif(($eventPlanimetria->tipo_trabajo)=='Multimedia')
                    <span class="badge bg-label-warning">MULTIMEDIA</span>
                  @elseif(($eventPlanimetria->tipo_trabajo)=='Planos')
                    <span class="badge bg-label-info">PLANOS</span>
                  @elseif(($eventPlanimetria->tipo_trabajo)=='Relevamiento')
                    <span class="badge bg-label-secondary">RELEVAMIENTO</span>
                  @elseif(($eventPlanimetria->tipo_trabajo)=='Formulario de lesiones')
                    <span class="badge bg-label-secondary">F. LESIONES</span>
                  @elseif(($eventPlanimetria->tipo_trabajo)=='Otros')
                    <span class="badge bg-label-dark">OTROS</span>
                  @endif
              </td>
                <td>{{ $eventPlanimetria->dibujante}}</td>
                <td>
                  @if(($eventPlanimetria->estado)==1)
                    <span class="badge bg-primary">Trabajando...</span>
                  @elseif(($eventPlanimetria->estado)==0)
                    <span class="badge bg-danger">Pendiente</span>
                  @else
                    <span class="badge bg-success">Evacuada</span>
                  @endif
              </td>
                <td>
                    <a href="{{route('GenericoPlanimetriaController.show', $eventPlanimetria->id)}}">
                          <button class="btn btn-sm btn-icon me-2"><i class="bx bx-edit"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{$eventPlanimetrias->links()}}
  </div>
</div>
<!--Fin de la tabla -->
@endrole
@endsection
