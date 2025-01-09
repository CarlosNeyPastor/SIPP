@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
@section('page-script')
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>

@section('title', 'Tipos de hecho')

@section('content')
@role('ujp')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Crear nuevo tipo de hecho</h5> <small class="text-muted float-end">Tipo de hecho creado por: <strong>{{Auth::user()->name}}</strong> </small>
      </div>
      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="POST" action="{{route('TipoHechoController.store')}}" onsubmit="return submitForm(this)" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre del tipo de hecho</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ejemplo: Hurto" name="tipo_hecho" required/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Observaciones</label>
            <input type="text" class="form-control" id="basic-default-company" placeholder="Observaciones en relación al tipo de hehco a ingresar" name="observaciones"/>
          </div>
          <!-------------------------------------------------------------------RECEPTOR HIDDEN------------------------------------------------------------------------->
          <div class="mb-3">
            <input hidden type="text" id="basic-default-fullname" class="form-control" name="receptor" value="{{Auth::user()->name}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>

          <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
          
          <a href="{{route('tiposdehecho')}}" class="btn btn-danger">Cancelar</a>  

        </form>
      </div>
    </div>
    </div>
  </div>

  <script>
    function submitForm(form) {
      document.getElementById('submitButton').innerText = '...';
      submitButton.classList.add('btn btn-secondary');
       return true;
          }
  </script>
  
@endrole
@endsection
