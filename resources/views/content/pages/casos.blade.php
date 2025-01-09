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

<h4>Listado de casos {{date('Y')}}</h4>
        @role('ujq|ujp')
        <!-- Boton que lleva al formulario para crear nuevo evento. LLama al create del controlador de EventController -->
        <a href="{{route('EventController.create')}}" class="btn rounded-pill btn-primary">Nuevo</a>
        <br></br>
        @endrole
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <div class="col-md-12 col-12 mb-4">
          <form class="d-flex" action="{{route('EventController.search')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Nro. Caso" aria-label="Search" autocomplete="off" name="busqueda">
            <input type="text" class="form-control me-2" placeholder="Rango de fechas" id="flatpickr-range"/>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="busqueda">
              <option selected disabled value="">Dependencia policial</option>
                @foreach(\App\Models\DependenciaPolicial::pluck('unidad_policial', 'id') as $id => $unidad_policial)
              <option value="{{ $unidad_policial }}">{{ $unidad_policial }}</option>
                @endforeach
            </select>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="busqueda">
               <option selected disabled value="">Tipo de hecho</option>
                  @foreach(\App\Models\TipoHecho::pluck('tipo_hecho', 'id') as $id => $tipo_hecho)
                <option value="{{ $tipo_hecho }}">{{ $tipo_hecho }}</option>
                 @endforeach
            </select>
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
          <th>Estado</th>
          <th>Tipo de Hecho</th>
          <th>Lugar</th>
          <th>Actuantes</th>
          <th>Acciones</th>
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
                  @if(($event->estadoCaso)==2)
                    <span class="badge bg-primary">S/E</span>
                  @elseif(($event->estadoCaso)==1)
                    <span class="badge bg-danger">Pendiente</span>
                    @elseif(($event->estadoCaso)==3)
                    <span class="badge bg-warning">Pedida</span>
                    @elseif(($event->estadoCaso)==4)
                    <span class="badge bg-dark">Archivada</span>
                  @else
                    <span class="badge bg-success">Evacuada</span>
                  @endif
              </td>
                <td>{{ $event->tipo_hecho}}</td>
                <!--Str::limit limita la cantidad de caracters a mostrar en este caso muestra del 0 al 30-->
                <td>{{Str::limit($event->lugar, 15)  }}</td>
                <td>{{ Str::limit($event->perito, 15)}}</td>
                <td>                  
                    <a href="{{route('EventController.showNoEdit', $event->id)}}" class="btn btn-sm btn-icon"><i class="bx bx-show-alt"></i></a>
                    @role('ujq|ujp')  
                    <a href="{{route('EventController.show', $event->id)}}">
                          <button class="btn btn-sm btn-icon me-2"><i class="bx bx-edit"></i></button>
                    </a>
                    @endrole 
                </td>
            </tr>
            <!--Aca finalizza el foreach -->
            @endforeach
      </tbody>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
    </table>
    <!--------------------------------PERMITE EL PAGINADO------------------------------------------------------------------------------------------------------------>
    {{$events->links()}}
  </div>
</div>
<!--Fin de la tabla -->
@endsection
