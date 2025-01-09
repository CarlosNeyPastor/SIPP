@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
@section('page-script')
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>

@section('title', 'Tipos')

@section('content')
@role('ujp')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="POST" action="{{route('TipoHechoController.update')}}" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf

          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <input hidden type="text" class="form-control" id="basic-default-fullname" name="tipo_hecho_id" value="{{$tipo_hecho->id}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Nombre del tipo de hecho</label>
            <input type="text" class="form-control" id="basic-default-company" name="tipo_hecho" required value="{{$tipo_hecho->tipo_hecho}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Observaciones</label>
            <input type="text" id="basic-default-fullname" class="form-control" name="observaciones" value="{{$tipo_hecho->observaciones}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
          
          <a href="{{route('tiposdehecho')}}" class="btn btn-danger">Cancelar</a>  

        </form>
      </div>
    </div>
    </div>
  </div>
@endrole
@endsection
