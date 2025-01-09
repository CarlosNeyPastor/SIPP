@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Casos')

@section('content')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection
@role('ufa')
<h4>Listado de casos {{date('Y')}}</h4>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <div class="col-md-4 col-4 mb-4">
          <form class="d-flex" action="{{route('FotografiaController.searchFot')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Nro. Caso" aria-label="Search" autocomplete="off" name="busqueda" required>
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </form> 
          </div>
<!-- Inicio de la tabla -->
<div class="card">
  
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <tr>
          <th>Caso</th>
          <th>Hora</th>
          <th>Fecha</th>
          <th>Dep.</th>
          <th>Cont/Hojas</th>
          <th>Tipo de Hecho</th>
          <th>Lugar</th>
          <th>Fotógrafo</th>
          <th>Ver</th>
        </tr>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      </thead>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      <tbody class="table-border-bottom-0">
        <!--Aca inicia el foreach que recore evento por evento para mostrarlo luego dentro del <tr> -->
            @foreach($events as $event)
            <tr>
                <td>{{ $event->id}}</td>
                <!--Aca se setea el formato del create_at H->Hora, i->minuto-->
                <td><strong>{{date('H:i', strtotime($event->created_at))}}</strong></td>
                <td>{{date('d - M', strtotime($event->created_at))}}</td>
                <td>{{ $event->unidad_policial}}</td>
                <!--Esto permite poner las estiquetas de pendiente, evacuada y sin efecto-->
                <td>
                    <span class="badge bg-label-info">{{$event->contactos}}</span>
                    <span>/</span>
                    <span class="badge bg-label-danger">{{$event->hojas}}</span>
              </td>
                <td>{{ $event->tipo_hecho}}</td>
                <!--Str::limit limita la cantidad de caracters a mostrar en este caso muestra del 0 al 30-->
                <td>{{Str::limit($event->lugar, 20)  }}</td>
                <td>{{ Str::limit($event->fotografo, 20)}}</td>
                <td>  
                    <a href="{{route('FotografiaController.show', $event->id)}}" class="btn btn-sm btn-icon"><i class="bx bx-show-alt"></i></a>
                </td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {{$events->links()}}
  </div>
</div>
@endrole
@endsection
