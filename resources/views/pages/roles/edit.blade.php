@extends('layouts.theme')

@section('page-content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption">
            <i class="icon-equalizer font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Editar Rol: {{$rol->rol_name}}</span>
          </div>
        </div>
        <div class="portlet-body form">
          {!! Form::model($rol, ['route' => ['roles.update', $rol->id], 'method' => 'PUT']) !!}
            @include('pages.roles.form', ['submitButtonText'=>'Actualizar Rol'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop

<!-- SCRIPTS -->
@section('page-level-plugins-js')
  <script src="{{ elixir('js/bootstrap-confirmation.js') }}" type="text/javascript"></script>
@stop

@section('page-level-scripts')
  <script src="{{ elixir('js/ui-confirmations.js') }}" type="text/javascript"></script>
@stop