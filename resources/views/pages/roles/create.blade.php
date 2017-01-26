@extends('layouts.theme')

@section('page-content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption">
            <i class="icon-equalizer font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Agregar Nuevo Rol de Usuario</span>
          </div>
        </div>
        <div class="portlet-body form">
          {!! Form::open(['route' => 'roles.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            @include('pages.roles.form', ['submitButtonText'=>'Guardar Rol'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop