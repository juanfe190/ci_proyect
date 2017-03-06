@extends('layouts.theme')

@section('page-content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption">
            <i class="icon-equalizer font-blue-sharp"></i>
            <span class="caption-subject font-blue-sharp bold uppercase">Agregar Nueva Categor&iacute;a</span>
          </div>
        </div>
        <div class="portlet-body form">
          {!! Form::open(['route' => 'categories.store', 'class' => 'form-horizontal', 'role' => 'form']) !!}
            @include('pages.categorias.form', ['submitButtonText'=>'Guardar Categoría'])
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@stop
