@extends('layouts.theme')

@section('page-level-plugins-css')
  <link rel="stylesheet" href="{{ elixir('css/bootstrap-select.css') }}">
@stop

@section('page-content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption">
            <i class="icon-equalizer font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Editar Usuario: {{ $user->first_name }} {{ $user->last_name }}</span>
          </div>
        </div>
        <div class="portlet-body form">
          {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
            @include('pages.usuarios.form', ['submitButtonText'=>'Actualizar Usuario'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop

<!-- SCRIPTS -->
@section('page-level-plugins-js')
  <script src="{{ elixir('js/bootstrap-select.js') }}" type="text/javascript"></script>
  <script src="{{ elixir('js/bootstrap-confirmation.js') }}" type="text/javascript"></script>
@stop

@section('page-level-scripts')
  <script src="{{ elixir('js/components-bootstrap-select.js') }}" type="text/javascript"></script>
  <script src="{{ elixir('js/ui-confirmations.js') }}" type="text/javascript"></script>
@stop
