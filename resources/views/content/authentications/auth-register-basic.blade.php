@php
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Register Basic - Pages')

@section('vendor-style')
<!-- Vendor -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css')}}" />
@endsection

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-auth.js')}}"></script>
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Register Card -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                @include('_partials.macros')
              </span>
              <span class="app-brand-text demo h3 mb-0 fw-bold">SIP</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Sistema Integral de Pericias</h4>
          <p class="mb-4">Registro de nuevo usuario</p>

          <form id="formAuthentication" class="mb-3" action="{{url('/')}}" method="GET">
            <div class="mb-3">
              <label for="username" class="form-label">Nombre de usuario</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Ejemplo: nombre APELLIDO" autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Ingrese su email">
            </div>
            <div class="mb-3 form-password-toggle">
              <label class="form-label" for="password">Contraseña</label>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms">
                <label class="form-check-label" for="terms-conditions">
                  I agree to
                  <a href="javascript:void(0);">privacy policy & terms</a>
                </label>
              </div>
            </div>
            <button class="btn btn-primary d-grid w-100">
              Crear
            </button>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{url('auth/login-basic')}}">
              <span>Sign in instead</span>
            </a>
          </p>
          <div class="divider my-4">
            <div class="divider-text">or</div>
          </div>

        </div>
      </div>
      <!-- Register Card -->
    </div>
  </div>
</div>
@endsection
