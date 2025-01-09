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
@role('ujq|ujp')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Crear nuevo caso</h5> <small class="text-muted float-end">Caso generado por: <strong>{{Auth::user()->name}}</strong> </small>
      </div>
      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="POST" action="{{route('EventController.store')}}" onsubmit="return submitForm(this)" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Unidad Policial</label>
            <select required class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="unidadPolicial">
                <option selected disabled value="">Seleccione una opción</option>
                  @foreach(\App\Models\DependenciaPolicial::pluck('unidad_policial', 'id') as $id => $unidad_policial)
                    <option value="{{ $unidad_policial }}">{{ $unidad_policial }}</option>
                  @endforeach
              </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Fiscalía interviniente</label>
              <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="fiscalia" required="">
                <option selected disabled value="">Seleccione una opción</option>
                  @foreach(\App\Models\fiscalia::pluck('fiscalia', 'id') as $id => $fiscalia)
                    <option value="{{ $fiscalia }}">{{ $fiscalia }}</option>
                  @endforeach
              </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Tipo de hecho</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="tipoHecho" required="">
              <option selected disabled value="">Seleccione una opción</option>
                @foreach(\App\Models\TipoHecho::pluck('tipo_hecho', 'id') as $id => $tipo_hecho)
                  <option value="{{ $tipo_hecho }}">{{ $tipo_hecho }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Solicitante</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ingrese de la forma Grdo./GRADO APELLIDO" name="solicitante" pattern="[\p{L}0-9\s.,;]*" required=""/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Lugar del hecho</label>
            <input type="text" class="form-control" id="basic-default-company" placeholder="Ingrese de la forma Calle 1 Nro. 0000 y Calle 2" name="lugar" pattern="[\p{L}0-9\s.,;]*" required/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">SGSP</label>
            <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="Ingrese de la forma 12345678" name="ampliacion"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Intervinientes</label>
            <input type="text" id="basic-default-fullname" class="form-control" name="intervinientes" pattern="[\p{L}0-9\s.,;]*"/>
          </div>
          <!-------------------------------------------------------------------RECEPTOR HIDDEN------------------------------------------------------------------------->
          <div class="mb-3">
            <input hidden type="text" id="basic-default-fullname" class="form-control" name="receptor" value="{{Auth::user()->name}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">Observaciones</label>
            <textarea id="basic-default-message" class="form-control" name="observaciones"></textarea>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
          <a href="{{route('casos')}}" class="btn btn-danger">Cancelar</a>  
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
