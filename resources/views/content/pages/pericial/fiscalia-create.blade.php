@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Fiscalia')

@section('content')
@role('ujp')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Crear nueva fiscalia</h5> <small class="text-muted float-end">Fiscalia creada por: <strong>{{Auth::user()->name}}</strong> </small>
      </div>
      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="POST" action="{{route('FiscaliaController.store')}}" onsubmit="return submitForm(this)" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nombre de la fiscalia</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ejemplo: Flagrancia 1er turno" name="fiscalia" required/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Observaciones</label>
            <input type="text" class="form-control" id="basic-default-company" placeholder="Observaciones en relación a la fiscalia" name="observaciones"/>
          </div>
          <!-------------------------------------------------------------------RECEPTOR HIDDEN------------------------------------------------------------------------->
          <div class="mb-3">
            <input hidden type="text" id="basic-default-fullname" class="form-control" name="receptor" value="{{Auth::user()->name}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
          <a href="{{route('fiscalias')}}" class="btn btn-danger">Cancelar</a>  

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
