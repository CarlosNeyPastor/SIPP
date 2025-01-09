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
        <h5 class="mb-0">Mostrar caso</h5> 
        <medium class="text-muted float-end">Editar el caso número <strong>{{$event->id}}</strong></medium>
      </div>

      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="POST" action="{{route('EventController.update')}}" autocomplete="off">
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
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="unidadPolicial" required>          
                <option value="{{($event->unidad_policial)}}">{{$event->unidad_policial}}</option>
                @foreach(\App\Models\DependenciaPolicial::pluck('unidad_policial', 'id') as $id => $unidad_policial)
                    <option value="{{ $unidad_policial }}">{{ $unidad_policial }}</option>
                  @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Fiscalía interviniente</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="fiscalia" required>          
                <option value="{{($event->fiscalia)}}">{{$event->fiscalia}}</option>
                  @foreach(\App\Models\fiscalia::pluck('fiscalia', 'id') as $id => $fiscalia)
                    <option value="{{ $fiscalia }}">{{ $fiscalia }}</option>
                  @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Tipo de hecho</label>
            <select class="form-select" id="exampleFormControlSelect2" aria-label="Default select example" name="tipoHecho" required>
               <option value="{{($event->tipo_hecho)}}">{{$event->tipo_hecho}}</option>
               @foreach(\App\Models\TipoHecho::pluck('tipo_hecho', 'id') as $id => $tipo_hecho)
                  <option value="{{ $tipo_hecho }}">{{ $tipo_hecho }}</option>
                @endforeach
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Solicitante</label>
            <input type="text" class="form-control" id="basic-default-fullname" name="solicitante" required value="{{$event->solicitante}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Lugar del hecho</label>
            <input type="text" class="form-control" id="basic-default-company" name="lugar" required value="{{$event->lugar}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">SGSP</label>
            <input type="text" id="basic-default-phone" class="form-control phone-mask" value="{{$event->ampliacion}}" name="ampliacion"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Intervinientes</label>
            <input type="text" id="basic-default-fullname" class="form-control" name="intervinientes" value="{{$event->perito}}" @if($event->estadoCaso == 3 || $event->estadoCaso == 4) disabled @endif/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Receptor</label>
            <input readonly type="text" id="basic-default-fullname" class="form-control" name="receptor" required value="{{$event->receptor}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Observaciones</label>
            <input type="text" id="basic-default-fullname" class="form-control" name="observaciones" value="{{$event->observaciones}}"/>
          </div>

          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div style="float: right;" class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" name="sinEfectoChekBox" {{$event->estadoCaso==2 ? 'checked' : '' }} @if($event->estadoCaso == 3 || $event->estadoCaso == 4) disabled @endif>
            <label class="form-check-label">Aplicar estado sin efecto.</label>
         </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <button type="submit" name="button" id="adelanto" value="descargar" class="btn btn-info">Generar adelanto</button><br><br>
          <button type="submit" name="button" value="actualizar" class="btn btn-primary">Actualizar</button>
          <a href="{{route('casos')}}" class="btn btn-danger">Cancelar</a>  
        </form>
      </div>
    </div>
    </div>
  </div>
@endrole

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>
<script>
    document.getElementById('adelanto').addEventListener('click', function(event) {
        var tipoHechoSelect = document.getElementById('exampleFormControlSelect2');
        var selectedOption = tipoHechoSelect.options[tipoHechoSelect.selectedIndex].value;

        if (selectedOption === "Hurto" || selectedOption === "Autopsia" || selectedOption === "Fallecido sin asistencia" || selectedOption === "Accidente de tránsito") {
            return true;
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Atención',
                text: 'Recuerda que los adelantos actualmente se generan para los tipos de hecho: Hurto, Accidente de tránsito, Fallecido sin asistencia y Autopsia',
                confirmButtonText: 'Aceptar'
            });
            event.preventDefault();
            return false;
        }
    });
</script>

@endsection
