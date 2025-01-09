@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
@section('page-script')
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>

@section('title', 'Casos')

@section('content')
@role('ufa')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Mostrar caso</h5> 
        <medium class="text-muted float-end">Editar el caso número <strong>{{$event->id}}</strong></medium>
      </div>

      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="POST" action="{{route('FotografiaController.update')}}" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf

           <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
           <div class="mb-3">
           <label class="form-label" for="basic-default-fullname">Nro. de caso</label>
            <input readonly type="text" class="form-control" id="basic-default-fullname" name="event_id" value="{{$event->id}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Unidad Policial</label>
            <input readonly type="text" class="form-control" id="basic-default-company" name="unidadPolicial" value="{{$event->unidad_policial}}"/>
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Fiscalía interviniente</label>
            <input readonly type="text" class="form-control" id="basic-default-company" name="fiscalia" value="{{$event->fiscalia}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Tipo hecho</label>
            <input readonly type="text" class="form-control" id="basic-default-company" name="tipoHecho" value="{{$event->tipo_hecho}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Lugar del hecho</label>
            <input readonly type="text" class="form-control" id="basic-default-company" name="lugar" value="{{$event->lugar}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">SGSP</label>
            <input readonly type="text" id="basic-default-phone" class="form-control phone-mask" value="{{$event->ampliacion}}" name="ampliacion"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Intervinientes</label>
            <input readonly type="text" id="basic-default-fullname" class="form-control" name="intervinientes" value="{{$event->perito}}"/>
          </div>
        <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
             <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Fotógrafo</label>
            <input type="text" id="basic-default-fullname" class="form-control" name="fotografo" value="{{$event->fotografo}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="col-form-label">Cantidad de contactos</label>
              <input class="form-control" type="number" name="contactos" value="{{$event->contactos}}">
            </div>
            <div class="col-md-6 mb-3">
              <label class="col-form-label">Cantidad de hojas</label>
              <input class="form-control" type="number" name="hojas" value="{{$event->hojas}}">
            </div>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Observaciones</label>
            <input readonly type="text" id="basic-default-fullname" class="form-control" name="observaciones" value="{{$event->observaciones}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <button type="submit" name="button" value="actualizar" class="btn btn-primary">Actualizar</button>
          <a href="{{route('fotografia')}}" class="btn btn-danger">Cancelar</a>  
        </form>
      </div>
    </div>
    </div>
  </div>
@endrole
@endsection
