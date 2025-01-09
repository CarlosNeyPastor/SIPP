@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Planimetria')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/flatpickr/flatpickr.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/flatpickr/flatpickr.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-pickers.js')}}"></script>
@endsection

@section('content')




@role('upa|uep')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
      <div class="card-body"> 
        <form method="POST" action="{{route('GenericoPlanimetriaController.update')}}" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf
          <div class="mb-3">
            <input hidden type="text" class="form-control" id="basic-default-fullname" name="eventPlanimetria_id" value="{{$eventPlanimetria->id}}"/>
          </div>
           <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
        
           @role('uep')
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">SGSP</label>
            <input type="text" id="basic-default-phone" class="form-control phone-mask" name="sgsp" value="{{$eventPlanimetria->sgsp}}" required/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          @endrole

          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">Intervención creada por:</label>
            <input readonly id="basic-default-message" class="form-control" name="receptor" value="{{$eventPlanimetria->receptor}}"></input>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Unidad Policial</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="unidadPolicial" required>          
                <option value="{{($eventPlanimetria->unidad_policial)}}">{{$eventPlanimetria->unidad_policial}}</option>
                @foreach(\App\Models\DependenciaPolicial::pluck('unidad_policial', 'id') as $id => $unidad_policial)
                    <option value="{{ $unidad_policial }}">{{ $unidad_policial }}</option>
                  @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Origen</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="origen">
            <option selected value="{{($eventPlanimetria->origen)}}">{{$eventPlanimetria->origen}}</option>
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
            <option selected value="{{($eventPlanimetria->tipo_trabajo)}}">{{$eventPlanimetria->tipo_trabajo}}</option>
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
                <input type="checkbox" id="mostrar-asunto" {{$eventPlanimetria->asunto!=null ? 'checked' : '' }}> Asunto
            </label>
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-oficio" {{$eventPlanimetria->oficio!=null ? 'checked' : '' }}> Oficio
            </label>
          
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-novedad" {{$eventPlanimetria->novedad!=null ? 'checked' : '' }}> Novedad
            </label>
          
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-IUE" {{$eventPlanimetria->iue!=null ? 'checked' : '' }}> IUE
            </label>
        
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-expediente-electronico" {{$eventPlanimetria->exp_electronico!=null ? 'checked' : '' }}> Exp. Electrónico
            </label>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divAsunto" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Asunto</label>
            <input type="text" class="form-control" id="basic-default-fullname" name="asunto" value="{{$eventPlanimetria->asunto}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divOficio" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Oficio</label>
            <input type="text" class="form-control" id="basic-default-fullname" value="{{$eventPlanimetria->oficio}}" name="oficio"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divNovedad" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Novedad</label>
            <input type="text" class="form-control" id="basic-default-fullname" name="novedad" value="{{$eventPlanimetria->novedad}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divIUE" class="mb-3">
            <label class="form-label" for="basic-default-fullname">IUE</label>
            <input type="text" class="form-control" id="basic-default-fullname" name="iue" value="{{$eventPlanimetria->iue}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div id="divExpElectronico" class="mb-3">
            <label class="form-label" for="basic-default-fullname">Expediente electrónico</label>
            <input type="text" class="form-control" id="basic-default-fullname" name="expEle" value="{{$eventPlanimetria->exp_electronico}}"/>
          </div>
<br>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Fiscalía interviniente</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="fiscalia" required>          
                <option value="{{($eventPlanimetria->fiscaliaInt)}}">{{$eventPlanimetria->fiscaliaInt}}</option>
                  @foreach(\App\Models\fiscalia::pluck('fiscalia', 'id') as $id => $fiscalia)
                    <option value="{{ $fiscalia }}">{{ $fiscalia }}</option>
                  @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Tipo de hecho</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="tipoHecho" required>
               <option value="{{($eventPlanimetria->tipo_hecho)}}">{{$eventPlanimetria->tipo_hecho}}</option>
               @foreach(\App\Models\TipoHecho::pluck('tipo_hecho', 'id') as $id => $tipo_hecho)
                  <option value="{{ $tipo_hecho }}">{{ $tipo_hecho }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">LUGAR DEL HECHO</label>
            <input type="text" id="basic-default-phone" class="form-control phone-mask" name="lugar" value="{{$eventPlanimetria->lugar}}"/>
          </div>       
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="divider divider-primary">
            <div class="divider-text">ADMINISTRATIVA</div>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">CARACTERÍSTICA</label>
            <input type="text" id="basic-default-phone" class="form-control phone-mask" name="caracteristica" value="{{$eventPlanimetria->caracteristica}}"/>
          </div>       
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Dibujante</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="dibujante">
            <option value="{{($eventPlanimetria->dibujante)}}">{{$eventPlanimetria->dibujante}}</option>
                @foreach (\App\Models\User::where('departamento_id', '=', 4)->pluck('name', 'id') as $id => $name)
                  <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
          <label class="form-label" for="basic-default-company">Fecha de salida</label>
              <input type="text" class="form-control flatpickr-input" placeholder="YYYY-MM-DD" id="flatpickr-date" name="fechaSalida" value="{{$eventPlanimetria->salida}}">
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-message">Observaciones</label>
            <input id="basic-default-message" class="form-control" name="observaciones" value="{{$eventPlanimetria->observaciones}}"></input>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="divider divider-primary">
              <div class="divider-text">VISTO BUENO</div>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div>
            <label>
                <input type="checkbox" id="mostrar-VBplanimetria" {{$eventPlanimetria->visto_Bueno_planimetria!=null ? 'checked' : '' }}> PLANIMETRÍA
            </label>
            &nbsp
            <label>
                <input type="checkbox" id="mostrar-VBpericial" {{$eventPlanimetria->visto_Bueno_pericial!=null ? 'checked' : '' }}> PERICIAL
            </label>
            &nbsp
          </div>
           <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
           <div id="divVBplanimetria" class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Visto bueno planimetría</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="VBplanimetria">
            <option value="{{($eventPlanimetria->visto_Bueno_planimetria)}}">{{$eventPlanimetria->visto_Bueno_planimetria}}</option>
                @foreach (\App\Models\User::where('departamento_id', '=', 4)->pluck('name', 'id') as $id => $name)
                  <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
          </div>
           <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
           <div id="divVBpericial" class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Visto bueno pericial</label>
            <select class="form-select me-2" id="exampleFormControlSelect1" aria-label="Default select example" name="VBpericial">
            <option value="{{($eventPlanimetria->visto_Bueno_pericial)}}">{{$eventPlanimetria->visto_Bueno_pericial}}</option>
                @foreach(\App\Models\User::where('grado_id', '>', 4)->pluck('name', 'id') as $id => $name)
                  <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <button type="submit" name="buttonUpdate" value="actualizarPlanimetria" class="btn btn-primary">Actualizar</button>
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
          </script>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>          
      </div>
    </div>
    </div>
  </div>
@endrole
@endsection
