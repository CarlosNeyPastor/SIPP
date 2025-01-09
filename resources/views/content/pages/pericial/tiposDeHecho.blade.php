@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Tipos de hecho')

@section('content')
@role('ujp')
<h4>Listado de tipos de hecho</h4>

        <!-- Boton que lleva al formulario para crear nuevo evento. LLama al create del controlador de EventController -->
        <a href="{{route('TipoHechoController.create')}}" class="btn rounded-pill btn-primary">Nuevo</a>
        <br></br>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>


<!-- Inicio de la tabla -->
<div class="card">
  
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <tr>
          <th>Fecha de creación</th>
          <th>Tipo de hecho</th>
          <th>Creador</th>
          <th>Observaciones</th>
          <th>Acciones</th>
        </tr>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      </thead>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      <tbody class="table-border-bottom-0">
            @foreach($tipo_hechos as $tipo_hecho)
            <tr>
                <td>{{ $tipo_hecho->created_at}}</td>
                <td>{{ $tipo_hecho->tipo_hecho}}</td>
                <td>{{ $tipo_hecho->createdByUsrHecho->name }}</td>
                <td>{{Str::limit($tipo_hecho->observaciones, 40)  }}</td>
                <td>
                    <a href="{{route('TipoHechoController.show', $tipo_hecho->id)}}">
                          <button class="btn btn-sm btn-icon me-2"><i class="bx bx-edit"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{$tipo_hechos->links()}}
  </div>
</div>
<!--Fin de la tabla -->
@endrole
@endsection
