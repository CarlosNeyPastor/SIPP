@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'SIP')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
    <div id="texto" class="mx-auto">
        <h1 id="subtitulo">Área TIC - Policía Científica</h1>
        <h3 id="titulo"></h3>
            <script>
              var texto = "Transformando ideas en realidad...";
              var index = 0;
              var speed = 60;
              var elementoTitulo = document.getElementById("titulo");

              function escribir() {
                if (index < texto.length) {
                  elementoTitulo.innerHTML += texto.charAt(index);
                  index++;
                  setTimeout(escribir, speed);
                }
              }
              escribir();
            </script>
      </div>
    </div>
    <!-- /Left Text -->

    <!-- Register Card -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
        <!-- Logo -->
        <div class="app-brand justify-content-center mb-4" style="display: flex; flex-direction: column; align-items: center;">
          <img src="{{ asset('assets/img/pages/img.png') }}" style="width: 150px; height: 150px;" alt="Descripción de la imagen">
          <br>
          <h4 class="mb-2" style="text-align: center;">Sistema Integral de Pericias Policiales</h4>
      </div>
        <!-- /Logo -->

        <!-- Register Card -->
        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Nombre completo</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="username" name="name" placeholder="Nombre1 Nombre2 APELLIDO1 APELLIDO2" autofocus value="{{ old('name') }}" />
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="nombre.apellido@minterior.gub.uy" value="{{ old('email') }}" />
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password">Contraseña</label>
            <div class="input-group input-group-merge @error('password') is-invalid @enderror">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer">
                <i class="bx bx-hide"></i>
              </span>
            </div>
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password-confirm">Confirmar contraseña</label>
            <div class="input-group input-group-merge">
              <input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer">
                <i class="bx bx-hide"></i>
              </span>
            </div>
          </div>
          @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
          <div class="mb-1">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="terms" name="terms" />
              <label class="form-check-label" for="terms">
                I agree to the
                <a href="{{ route('terms.show') }}" target="_blank">
                  terms_of_service
                </a> and
                <a href="{{ route('policy.show') }}" target="_blank">
                  privacy_policy
                </a>
              </label>
            </div>
          </div>
          @endif
          <button type="submit" class="btn btn-primary d-grid w-100">Crear e ingresar</button>
        </form>

        <div class="divider my-4">
          <div class="divider-text">v3.0</div>
        </div>
      </div>
    </div>
    <!-- Register Card -->
  </div>
</div>
@endsection