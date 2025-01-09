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
      <div class="card-body"> 
        <form method="POST" action="{{route('FiscaliaController.update')}}" autocomplete="off">
          @csrf
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <input hidden type="text" class="form-control" id="basic-default-fullname" name="fiscalia_id" value="{{$fiscalia->id}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Nombre de la fiscalia</label>
            <input type="text" class="form-control" id="basic-default-company" name="fiscalia" required value="{{$fiscalia->fiscalia}}"/>
          </div>
          <!------------------------------------------------------------------------------------------------------------------------------------------------------------>
          <div class="mb-3">
            <label class="form-label" for="basic-default-phone">Observaciones</label>
            <input type="text" id="basic-default-fullname" class="form-control" name="observaciones" value="{{$fiscalia->observaciones}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <a href="{{route('fiscalias')}}" class="btn btn-danger">Cancelar</a>  
        </form>
      </div>
    </div>
    </div>
  </div>
@endrole
@endsection
