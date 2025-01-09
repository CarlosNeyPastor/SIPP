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
@role('ujq|ujp|dta')
  <div class="row">
    <div class="col-lg-12">
    <div class="card mb-4">
   

      <div class="card-body">
        <!-- Llama a la funcion store del controlador y lo pasa por POST -->
        <form method="GET" action="{{route('Event23Controller.showNoEdit')}}" autocomplete="off">
          <!-- @csrf es un token aniade una capa de seguroidad a laravel para que no hagan inyeccion de codigo -->
          @csrf

           <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
           <div class="mb-3">
           <label class="form-label" for="basic-default-fullname">Nro. de caso</label>
            <input readonly type="text" class="form-control" id="basic-default-fullname" name="event_id" value="{{$event23->id}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Fecha y hora</label>
            <input readonly type="text" id="basic-default-fullname" class="form-control" name="receptor" required value="{{$event->created_at}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Unidad Policial</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="unidadPolicial" disabled>          
                <option value="{{($event->unidad_policial)}}">{{$event->unidad_policial}}</option>
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Fiscalía interviniente</label>
            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="fiscalia" disabled>          
                <option readonly value="{{($event->fiscalia)}}">{{$event->fiscalia}}</option>
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label for="exampleFormControlSelect1" class="form-label">Tipo de hecho</label>
            <select readonly class="form-select" id="exampleFormControlSelect1" aria-label="Default select example" name="tipoHecho" disabled>
               <option value="{{($event->tipo_hecho)}}">{{$event->tipo_hecho}}</option>
            </select>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Lugar del hecho</label>
            <input readonly type="text" class="form-control" id="basic-default-company" name="lugar" required value="{{$event->lugar}}"/>
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
            <label class="form-label" for="basic-default-phone">Receptor</label>
            <input readonly type="text" id="basic-default-fullname" class="form-control" name="receptor" required value="{{$event->receptor}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Observaciones</label>
            <input readonly type="text" id="basic-default-fullname" class="form-control" name="observaciones" value="{{$event->observaciones}}"/>
          </div>
          @endrole
          @role('dta')
          <?php if ($event->estadoCaso == 0): ?>
            <button type="submit" name="button" value="solicitar" class="btn btn-primary">asA</button>
            <button type="submit" name="button" value="archivar" class="btn btn-warning">Archivar</button>
          <?php endif; ?>
          <?php if ($event->estadoCaso == 3): ?>
            <button type="submit" name="button" value="archivar" class="btn btn-warning">Archivar</button>
            <?php endif; ?>
          <a href="{{route('casos')}}" class="btn btn-danger">Cancelar</a>  
          @endrole
          @role('ujq|ujp')
          <a href="{{route('casos')}}" class="btn btn-success">Volver</a>  
          @endrole
        </form>
      </div>
    </div>
    </div>
  </div>
@endsection