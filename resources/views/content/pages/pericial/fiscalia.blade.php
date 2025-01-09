@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Fiscalias')

@section('content')
@role('ujp')
<h4>Listado de fiscalias</h4>

        <a href="{{route('FiscaliaController.create')}}" class="btn rounded-pill btn-primary">Nuevo</a>
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
          <th>Fiscalía</th>
          <th>Creador</th>
          <th>Observaciones</th>
          <th>Acciones</th>
        </tr>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      </thead>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      <tbody class="table-border-bottom-0">
            @foreach($fiscalias as $fiscalia)
            <tr>
                <td>{{ $fiscalia->created_at}}</td>
                <td>{{ $fiscalia->fiscalia}}</td>
                <td>{{ $fiscalia->createdByUser->name }}</td>
                <td>{{Str::limit($fiscalia->observaciones, 40)  }}</td>
                <td>
                    <a href="{{route('FiscaliaController.show', $fiscalia->id)}}">
                          <button class="btn btn-sm btn-icon me-2"><i class="bx bx-edit"></i></button>
                    </a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{$fiscalias->links()}}
  </div>
</div>
<!--Fin de la tabla -->
@endrole
@endsection
