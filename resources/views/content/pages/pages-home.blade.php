@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Inicio')

@section('content')
<h4>Pagina de inicio</h4>
<h6>Contadores y metricas de hechos policiales</h6>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
@role('upl')
<div class="col-md-6 col-xl-12">
    <div class="card shadow-none bg-transparent border border-info mb-1">
      <div class="card-body">
        <h5 class="card-title">PANEL INFORMATIVO</h5>
        <p class="card-text">
        ¡Bienvenido al sistema! Estamos encantados de tenerte aquí. Para comenzar con las primeras diligencias, te invitamos a ponerte en contacto con el area de Informática. Juntos, definiremos el grupo al que te unirás y te sumergirás en un emocionante trabajo colaborativo. ¡Esperamos ansiosos trabajar contigo y alcanzar grandes logros juntos!. Recuerda que las formas de contacto son a través del teléfono <strong>2030 3333</strong> o por correo electrónico a <strong>cientifica-informatica@minterior.gub.uy.</strong>
        </p>
      </div>
    </div>
  </div>
@endrole
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
@role('ujq|ufa|dta|ujp')
<div class="row">
<div class="col-xl-6 ">
    <div class="card bg-danger text-white">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
        <a href="{{route('EventController.searchByPendiente')}}">
          <span class="avatar-initial rounded-circle"><i class="bx bx-task-x fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">PENDIENTES</span>
        <h2 class="mb-0 text-white">{{$novedad_pendiente}}</h2>
      </div>
    </div>
  </div>

  <div class="col-xl-6 ">
    <div class="card bg-warning text-white">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
        <a href="{{route('EventController.searchByPedida')}}">
          <span class="avatar-initial rounded-circle"><i class="bx bx-task-x fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">PEDIDAS</span>
        <h2 class="mb-0 text-white">{{$novedad_pedida}}</h2>
      </div>
    </div>
  </div>
</div>
<br><br>
@endrole
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
@role('ujq|dta|ujp')
<div class="row">
<div class="col-xl-3 ">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
        <a href="{{route('EventController.searchByEvacuate')}}">
          <span class="avatar-initial rounded-circle"><i class="bx bx-edit fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">EVACUADAS</span>
        <h2 class="mb-0">{{$novedad_evacuada}}</h2>
      </div>
    </div>
  </div>

  <div class="col-xl-6 ">
    <div class="card bg-dark text-white">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
          <span class="avatar-initial rounded-circle"><i class="bx bx-task-x fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">ARCHIVADAS</span>
        <h2 class="mb-0 text-white">{{$novedad_archivada}}</h2>
      </div>
    </div>
  </div>

  <div class="col-xl-3 ">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
        <a href="{{route('EventController.searchBySinEffect')}}">
          <span class="avatar-initial rounded-circle"><i class="bx bx-message-square-detail fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">SIN EFECTO</span>
        <h2 class="mb-0">{{$novedad_sin_efecto}}</h2>
      </div>
    </div>
  </div>
</div>
<br><br>
@endrole
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
@endsection

