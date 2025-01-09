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

<h4>Listado de 2024</h4>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
        <div class="col-md-12 col-12 mb-4">
          <form class="d-flex" action="{{route('Event23Controller.search')}}" method="GET">
            <input class="form-control me-2" type="search" placeholder="Nro. Caso y/o Lugar" aria-label="Search" autocomplete="off" name="busqueda">
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
          <th>Dependencia</th>
          <th>Tipo de Hecho</th>
          <th>Lugar</th>
          <th>Ver</th>
        </tr>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      </thead>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
      <tbody class="table-border-bottom-0">
        <!--Aca inicia el foreach que recore evento por evento para mostrarlo luego dentro del <tr> -->
            @foreach($event23s as $event23)
            <tr>
                <td>{{ $event23->id}}</td>
                <!--Aca se setea el formato del create_at H->Hora, i->minuto-->
                <td><strong>{{date('H:i', strtotime($event23->created_at))}}</strong></td>
                <td>{{date('d - M', strtotime($event23->created_at))}}</td>
                <td>{{ $event23->unidad_policial}}</td>
                <td>{{ $event23->tipo_hecho}}</td>
                <!--Str::limit limita la cantidad de caracters a mostrar en este caso muestra del 0 al 30-->
                <td>{{Str::limit($event23->lugar, 30)  }}</td>
                <td>                  
                <a href="{{route('Event23Controller.showNoEdit', $event23->id)}}" class="btn btn-sm btn-icon"><i class="bx bx-show-alt"></i></a>
                </td>
            </tr>
            <!--Aca finaliza el foreach -->
            @endforeach
      </tbody>
      <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
    </table>
    <!--------------------------------PERMITE EL PAGINADO------------------------------------------------------------------------------------------------------------>
    {{$event23s->links()}}
  </div>
</div>
<!--Fin de la tabla -->
@endsection
