@extends('layouts.app')


<!-- STYLES -->
@section('page-level-styles')
  <link rel="stylesheet" href="{{ elixir('css/login.css') }}">
@stop

<!-- BODY CLASS -->
@section('body-class')
  login
@stop
<!-- CONTENT -->
@section('content')
  <!-- BEGIN LOGO -->
  <div class="logo">
      <a href="{{ route('home') }}">
          <img src="{{ asset('img/logo.svg') }}" alt="" /> </a>
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content">
      <!-- BEGIN LOGIN FORM -->
      {!! Form::open(['route' => 'login', 'class' => 'login-form']) !!}
          <h3 class="form-title font-green">Ingresar</h3>
          @if($errors->any())
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span> Escribe una direcci&oacute;n de correo electr&oacute;nico y una contrase&ntilde;a v&aacute;lida. </span>
            </div>
          @endif
          <div class="form-group">
              {!! Form::label('email', 'E-Mail', ['class' => 'control-label visible-ie8 visible-ie9']) !!}
              {!! Form::text('email', null, ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Correo Electrónico', 'maxlength' => '75']) !!}
          </div>
          <div class="form-group">
              {!! Form::label('password', 'Contraseña', ['class' => 'control-label visible-ie8 visible-ie9']) !!}
              {!! Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Contraseña', 'maxlength' => '100']) !!}
          </div>
          <div class="form-actions">
              {!! Form::submit('Iniciar Sesión', ['class' => 'btn green uppercase']) !!}
              <a href="javascript:;" id="forget-password" class="forget-password">¿Olvidó la Contrase&ntilde;a?</a>
          </div>
          <div class="go-to-ci">
              <p>
                  <a href="javascript:;" id="register-btn" class="uppercase">Ir a Club-Innova.com</a>
              </p>
          </div>
      {!! Form::close() !!}
      <!-- END LOGIN FORM -->
      <!-- BEGIN FORGOT PASSWORD FORM -->
      {!! Form::open(['route' => 'forgotPassword', 'class' => 'forget-form']) !!}
          <h3 class="font-green">¿ Olvidó la Contrase&ntilde;a ?</h3>
          <p> Ingrese su dirección de correo electrónico a continuación para restablecer la contrase&ntilde;a. </p>
          <div class="form-group">
              {!! Form::text('email', null, ['class' => 'form-control form-control-solid placeholder-no-fix', 'autocomplete' => 'off', 'placeholder' => 'Correo Electrónico']) !!}
          </div>
          <div class="form-actions">
              <button type="button" id="back-btn" class="btn btn-default">Regresar</button>
              {!! Form::submit('Enviar', ['class' => 'btn btn-success uppercase pull-right']) !!}
          </div>
      {!! Form::close() !!}
      <!-- END FORGOT PASSWORD FORM -->
  </div>
  <div class="copyright"> {{ date('Y') }} © Administración Club Innova. </div>
@stop

@section('page-level-scripts')
  <script src="{{ elixir('js/login.js') }}" type="text/javascript"></script>
@stop