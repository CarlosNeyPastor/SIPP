@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Dependencia policial')
@role('ujp')
@section('content')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="POST" action="{{route('DependenciaPolicialController.update')}}" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf

          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <input hidden type="text" class="form-control" id="basic-default-fullname" name="unidad_policial_id" value="{{$unidad_policial->id}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Nombre de la unidad/dependenica policial</label>
            <input type="text" class="form-control" id="basic-default-company" name="unidad_policial" required value="{{$unidad_policial->unidad_policial}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Observaciones</label>
            <input type="text" id="basic-default-fullname" class="form-control" name="observaciones" value="{{$unidad_policial->observaciones}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
          
          <a href="{{route('unidadespoliciales')}}" class="btn btn-danger">Cancelar</a>  

        </form>
      </div>
    </div>
    </div>
  </div>
@endrole  
@endsection
