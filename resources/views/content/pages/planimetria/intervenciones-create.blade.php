@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Intervenciones')
@section('content')

@role('upa')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Crear nueva intervención</h5> <small class="text-muted float-end">Creada por: <strong>{{Auth::user()->name}}</strong> </small>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('GenericoPlanimetriaController.store')}}" onsubmit="return submitForm(this)" autocomplete="off">
          @csrf
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">SGSP</label>
            <input disable type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="Ingrese de la forma 12345678" name="sgsp" required/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Dependencia</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="unidadPolicial">
                <option selected disabled value="">Seleccione una opción</option>
                  @foreach(\App\Models\DependenciaPolicial::pluck('unidad_policial', 'id') as $id => $unidad_policial)
                    <option value="{{ $unidad_policial }}">{{ $unidad_policial }}</option>
                  @endforeach
              </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Origen</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="origen">
              <option selected="" disabled="" value="">Seleccione una opción</option>
                  <option value="DATA">DATA</option>
                  <option value="Dirección de criminalística">Dirección de criminalística</option>
                  <option value="Secretaría General">Secretaría General</option>
                  <option value="Otros">Otros</option>
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Tipo de trabajo</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="tipoTrabajo" required>
              <option selected="" disabled="" value="">Seleccione una opción</option>
                  <option value="Facial">Facial</option>
                  <option value="Formulario de lesiones">Formulario de lesiones</option>
                  <option value="Joyas">Joyas</option>
                  <option value="Multimedia">Multimedia</option>
                  <option value="Planos">Planos</option>
                  <option value="Relevamiento">Relevamiento</option>
                  <option value="Vehiculos">Vehiculos</option>
                  <option value="Otros">Otros</option>
            </select>
          </div>
<br>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div>
            <label>
                <input type="checkbox" id="mostrar-asunto"> Asunto
            </label>
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-oficio"> Oficio
            </label>
          
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-novedad"> Novedad
            </label>
          
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-IUE"> IUE
            </label>
        
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-expediente-electronico"> Exp. Electrónico
            </label>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divAsunto" style="display: none;" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Asunto</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ingrese de la forma 12345678" name="asunto"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divOficio" style="display: none;" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Oficio</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ingrese de la forma 1234/23" name="oficio"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divNovedad" style="display: none;" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Novedad</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ingrese de la forma 0123/23" name="novedad"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divIUE" style="display: none;" class="mb-3">
            <label class="form-label" for="basic-default-fullname">IUE</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ingrese de la forma 123478-4568-0114" name="iue"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divExpElectronico" style="display: none;" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Expediente electrónico</label>
            <input type="text" class="form-control" id="basic-default-fullname" placeholder="Ingrese de la forma 123478" name="expEle"/>
          </div>
<br>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Fiscalía interviniente</label>
              <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="fiscalia">
                <option selected disabled value="">Seleccione una opción</option>
                  @foreach(\App\Models\fiscalia::pluck('fiscalia', 'id') as $id => $fiscalia)
                    <option value="{{ $fiscalia }}">{{ $fiscalia }}</option>
                  @endforeach
              </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Tipo de hecho</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="tipoHecho">
              <option selected disabled value="">Seleccione una opción</option>
                @foreach(\App\Models\TipoHecho::pluck('tipo_hecho', 'id') as $id => $tipo_hecho)
                  <option value="{{ $tipo_hecho }}">{{ $tipo_hecho }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Lugar del hecho</label>
            <input type="text" class="form-control" id="basic-default-company" placeholder="Ingrese de la forma Calle 1 Nro. 0000 y Calle 2" name="lugar" required/>
          </div>        
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="divider divider-primary">
            <div class="divider-text">ADMINISTRATIVA</div>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Característica</label>
            <input type="text" class="form-control" id="basic-default-company" name="caracteristica"/>
          </div>        
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Dibujante</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="dibujante">
              <option selected disabled value="">Seleccione una opción</option>
                @foreach (\App\Models\User::where('departamento_id', '=', 4)->pluck('name', 'id') as $id => $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
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
          <div class="divider divider-primary">
              <div class="divider-text">VISTO BUENO</div>
          </div>
          <div>
            <label>
                <input type="checkbox" id="mostrar-VBplanimetria"> PLANIMETRÍA
            </label>
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-VBpericial"> PERICIAL
            </label>
            &nbsp
          </div>
           <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
           <div id="divVBplanimetria" style="display: none;" class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Visto bueno planimetría</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="VBplanimetria">
              <option selected disabled value="">Seleccione una opción</option>
                @foreach (\App\Models\User::where('departamento_id', '=', 4)->pluck('name', 'id') as $id => $name)
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divVBpericial" style="display: none;" class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Visto bueno pericial</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="VBpericial">
              <option selected disabled value="">Seleccione una opción</option>
                @foreach (\App\Models\User::where('grado_id', '>', 4)->pluck('name', 'id') as $id => $name)
                  <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
<br>      
        <button type="submit" class="btn btn-primary" id="submitButton">Crear</button>
          <a href="{{route('planimetria')}}" class="btn btn-danger">Cancelar</a>  
        </form>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
   <script>
              var checkboxAsunto = document.getElementById("mostrar-asunto");
              var campoAsunto = document.getElementById("divAsunto");
              var checkboxOficio = document.getElementById("mostrar-oficio");
              var campoOficio = document.getElementById("divOficio"); 
              var checkboxNovedad = document.getElementById("mostrar-novedad");
              var campoNovedad = document.getElementById("divNovedad"); 
              var checkboxIUE = document.getElementById("mostrar-IUE");
              var campoIUE = document.getElementById("divIUE"); 
              var checkboxExpEle = document.getElementById("mostrar-expediente-electronico");
              var campoExpEle = document.getElementById("divExpElectronico"); 
              var checkboxVBplanimetria = document.getElementById("mostrar-VBplanimetria"); 
              var campoVBplanimetria = document.getElementById("divVBplanimetria"); 
              var checkboxVBpericial = document.getElementById("mostrar-VBpericial"); 
              var campoVBpericial = document.getElementById("divVBpericial"); 

              checkboxAsunto.addEventListener('change', function() {
                if (this.checked) {
                  campoAsunto.style.display = "block";
                } else {
                  campoAsunto.style.display = "none";
                }
              });

              checkboxOficio.addEventListener('change', function() {
                if (this.checked) {
                  campoOficio.style.display = "block";
                } else {
                  campoOficio.style.display = "none";
                }
              });

              checkboxNovedad.addEventListener('change', function() {
                if (this.checked) {
                  campoNovedad.style.display = "block";
                } else {
                  campoNovedad.style.display = "none";
                }
              });

              checkboxIUE.addEventListener('change', function() {
                if (this.checked) {
                  campoIUE.style.display = "block";
                } else {
                  campoIUE.style.display = "none";
                }
              });

              checkboxExpEle.addEventListener('change', function() {
                if (this.checked) {
                  campoExpEle.style.display = "block";
                } else {
                  campoExpEle.style.display = "none";
                }
              });

              checkboxVBplanimetria.addEventListener('change', function() {
                if (this.checked) {
                  campoVBplanimetria.style.display = "block";
                } else {
                  campoVBplanimetria.style.display = "none";
                }
              });

              checkboxVBpericial.addEventListener('change', function() {
                if (this.checked) {
                  campoVBpericial.style.display = "block";
                } else {
                  campoVBpericial.style.display = "none";
                }
              });

                function submitForm(form) {
                  document.getElementById('submitButton').innerText = '...';
                  submitButton.classList.add('btn btn-secondary');
                  return true;
                }
          </script>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>          
      </div>
    </div>
    </div>
  </div>
@endrole
@endsection
