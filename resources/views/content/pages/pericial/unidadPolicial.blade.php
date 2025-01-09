@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dependencias')

@section('content')
@role('ujp')
<h4>Listado de dependencias policiales</h4>

        <!-- Boton que lleva al formulario para crear nueva dependencia -->
        <a href="{{route('DependenciaPolicialController.create')}}" class="btn rounded-pill btn-primary">Nuevo</a>
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
          <th>Dependencia</th>
          <th>Creador</th>
          <th>Observaciones</th>
          <th>Acciones</th>
        </tr>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      </thead>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      <tbody class="table-border-bottom-0">
            @foreach($dependencia_policials as $unidad_policial)
            <tr>
                <td>{{ $unidad_policial->created_at}}</td>
                <td>{{ $unidad_policial->unidad_policial}}</td>
                <td>{{ $unidad_policial->createdByUserDependencia->name }}</td>
                <td>{{Str::limit($unidad_policial->observaciones, 40)  }}</td>
                <td>
                    <a href="{{route('DependenciaPolicialController.show', $unidad_policial->id)}}">
                        <button class="btn btn-sm btn-icon me-2"><i class="bx bx-edit"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{$dependencia_policials->links()}}
  </div>
</div>
<!--Fin de la tabla -->
@endrole
@endsection
