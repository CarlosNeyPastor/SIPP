@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Inicio')

@section('content')
@role('upa|uep')
<h4>Pagina de inicio</h4>
<h6>Contadores y metricas de hechos policiales</h6>

<div class="row">
  <div class="col-xl-3 ">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
        <a href="{{route('GenericoPlanimetriaController.searchByTrabajoEvacuate')}}">
          <span class="avatar-initial rounded-circle"><i class="bx bx-edit fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">Trabajos evacuados</span>
        <h2 class="mb-0">{{$trabajos_evacuados}}</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-6 ">
    <div class="card bg-danger text-white">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
        <a href="{{route('GenericoPlanimetriaController.searchByTrabajoPendiente')}}">
          <span class="avatar-initial rounded-circle"><i class="bx bx-task-x fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">Trabajos pendientes</span>
        <h2 class="mb-0 text-white">{{$trabajos_pendiente}}</h2>
      </div>
    </div>
  </div>
  <div class="col-xl-3">
    <div class="card">
      <div class="card-body text-center">
        <div class="avatar avatar-md mx-auto mb-3">
        <a href="{{route('GenericoPlanimetriaController.searchByTrabajoSinEffect')}}">
          <span class="avatar-initial rounded-circle"><i class="bx bx-message-square-detail fs-3"></i></span></a>  
        </div>
        <span class="d-block mb-1 text-nowrap">Trabajos en proceso</span>
        <h2 class="mb-0">{{$trabajos_sinEfecto}}</h2>
      </div>
    </div>
  </div>
</div>
<br><br>
<!------------------------------------------------------------------------------------------------------------------------------------------------------------>
<div class="d-flex flex-wrap" style="justify-content: center; align-items: center;">
  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
  <div class="card-body"> <i class="bx bx-map-alt mb-4"></i>
      <h2 class="mb-0">{{$trabajos_planos}}</h2>
      <p class="icon-name text-capitalize text-truncate mb-0">Planos</p>
    </div>
  </div>

  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="bx bx-video-recording mb-4"></i>
      <h2 class="mb-0">{{$trabajos_multimedias}}</h2>
      <p class="icon-name text-capitalize text-truncate mb-0">Multimedias</p>
    </div>
  </div>

  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="bx bx-award mb-4"></i>
    <h2 class="mb-0">{{$trabajos_joyas}}</h2>
      <p class="icon-name text-capitalize text-truncate mb-0">Joyas</p>
    </div>
  </div>

  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class='bx bx-body mb-4'></i>
    <h2 class="mb-0">{{$trabajos_lesiones}}</h2>
      <p class="icon-name text-capitalize text-truncate mb-0">Formulario de Lesiones</p>
    </div>
  </div>

  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="bx bx-face mb-4"></i>
    <h2 class="mb-0">{{$trabajos_facial}}</h2>
      <p class="icon-name text-capitalize text-truncate mb-0">Faciales</p>
    </div>
  </div>

  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class='bx bx-edit-alt mb-4'></i>
    <h2 class="mb-0">{{$trabajos_relevamiento}}</h2>
      <p class="icon-name text-capitalize text-truncate mb-0">Relevamientos</p>
    </div>
  </div>

  <div class="card icon-card cursor-pointer text-center  mb-4 mx-2">
    <div class="card-body"> <i class="bx bx-customize mb-4"></i>
      <h2 class="mb-0">{{$trabajos_otros}}</h2>
      <p class="icon-name text-capitalize text-truncate mb-0">Otros</p>
    </div>
  </div>
</div>
@endrole
@endsection

