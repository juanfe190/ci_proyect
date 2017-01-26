@extends('layouts.theme')

@section('page-level-plugins-css')
  <link rel="stylesheet" href="{{ elixir('css/bootstrap-select.css') }}">
  <link rel="stylesheet" href="{{ elixir('css/summernote.css') }}">
@stop

@section('page-content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption">
            <i class="icon-equalizer font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">{{$curso->name}} &ndash; {{$etapa->name}} &ndash; Nuevo &Iacute;tem</span>
          </div>
        </div>
        <div class="portlet-body form">
          {!! Form::open(['route' => ['items.store', $curso->url, $etapa->url], 'class' => 'form-horizontal', 'role' => 'form']) !!}
            @include('pages.items.form', ['submitButtonText'=>'Guardar Ítem'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop


<!-- SCRIPTS -->
@section('page-level-plugins-js')
  <script src="{{ elixir('js/bootstrap-select.js') }}" type="text/javascript"></script>
  <script src="{{ elixir('js/summernote.js') }}" type="text/javascript"></script>
@stop

@section('page-level-scripts')
  <script src="{{ elixir('js/components-bootstrap-select.js') }}" type="text/javascript"></script>
  <script src="{{ elixir('js/components-summernote.js') }}" type="text/javascript"></script>
@stop
