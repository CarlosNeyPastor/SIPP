@php
$configData = Helper::appClasses();
$customizerHidden = 'customizer-hide';
@endphp

@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset(mix('assets/vendor/css/pages/page-auth.css')) }}">
@endsection

@section('content')
<div class="authentication-wrapper authentication-cover">
  <div class="authentication-inner row m-0">
    <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
      <div class="flex-row text-center mx-auto">
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
    </div>

    <!-- Login -->
    <div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
      <div class="w-px-400 mx-auto">
      <div class="app-brand justify-content-center mb-4" style="display: flex; flex-direction: column; align-items: center;">
          <img src="{{ asset('assets/img/pages/img.png') }}" style="width: 150px; height: 150px;" alt="Descripción de la imagen">
          <br>
          <h4 class="mb-2" style="text-align: center;">Sistema Integral de Pericias Policiales</h4>
      </div>
        @if (session('status'))
        <div class="alert alert-success mb-1 rounded-0" role="alert">
          <div class="alert-body">
            {{ session('status') }}
          </div>
        </div>
        @endif

        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="login-email" class="form-label">Correo electrónico</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="nombre.apellido@minterior.gub.uy" autofocus value="{{ old('email') }}">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
              <label class="form-label" for="login-password">Contraseña</label>
              @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}">
                <small>Olvidó de contraseña?</small>
              </a>
              @endif
            </div>
            <div class="input-group input-group-merge">
              <input type="password" id="login-password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="form-check-label" for="remember-me">
                Recordar
              </label>
            </div>
          </div>
          <button class="btn btn-primary d-grid w-100" type="submit">Ingresar</button>
        </form>

        <p class="text-center">
          <span>Para crear una nueva contraseña click</span>
          @if (Route::has('register'))
          <a href="{{ route('register') }}">
            <span>AQUÍ</span>
          </a>
          @endif
        </p>
        <div class="divider my-4">
          <div class="divider-text">v3.0</div>
        </div>

      </div>
    </div>
    <!-- /Login -->
  </div>
</div>
@endsection