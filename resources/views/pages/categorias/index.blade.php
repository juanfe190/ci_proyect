@extends('layouts.theme')

<!-- STYLES -->
@section('page-level-plugins-css')
  <link rel="stylesheet" href="{{ elixir('css/datatables.css') }}">
@stop

@section('error-content')
  @if($errors->any())
  <div class="row">
    <div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-2" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><i class="fa fa-ban fa-lg"></i></strong> {!! $errors->first('message') !!}
    </div>
  </div>
  @endif
@stop

@section('page-content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption font-dark">
            <i class="icon-notebook font-dark"></i>
            <span class="caption-subject bold uppercase">Categor&iacute;as</span>
          </div>
          <div class="actions">
            <div class="btn-group btn-group-devided">
                <a href="{{ route('categories.create') }}" class="btn btn-circle red btn-outline"><i class="fa fa-plus"></i> Categor&iacute;a Nueva</a>
            </div>
            <div class="btn-group">
                <a class="btn blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown">
                    <i class="fa fa-share"></i>
                    <span class="hidden-xs"> Exportar </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu pull-right" id="categories_index_tools">
                    <li>
                        <a href="javascript:;" data-action="0" class="tool-action">
                            <i class="icon-printer"></i> Imprimir</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-action="1" class="tool-action">
                            <i class="icon-check"></i> Copiar</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-action="2" class="tool-action">
                            <i class="icon-doc"></i> PDF</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-action="3" class="tool-action">
                            <i class="icon-paper-clip"></i> Excel</a>
                    </li>
                </ul>
            </div>
          </div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="categories_index_table">
            <thead>
              <th class="all">Id</th>
              <th class="all">Nombre</th>
              <th class="all">Opciones</th>
            </thead>
            <tbody>

              @foreach($categorias as $categoria)
                <tr>
                  <td>{{$categoria->id}}</td>
                  <td>{{$categoria->name}}</td>
                  <td>
                    <a href="{{route('categories.edit', ['name'=>$categoria->url])}}" class="btn btn-sm blue">Editar</a>
                    {{Form::open(array('route' => array('categories.destroy', $categoria->id), 'method' => 'delete', 'class' => 'deleteForm'))}}
                      <button type="submit" class="btn btn-sm red" data-toggle="confirmation" data-placement="top" data-original-title="¿ Está seguro ?" data-btn-ok-label="Sí" data-btn-ok-icon="icon-like" data-btn-cancel-label="No" data-btn-cancel-icon="icon-close" data-popout="true">Eliminar</button>
                    {{Form::close()}}
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop

<!-- SCRIPTS -->
@section('page-level-plugins-js')
  <script src="{{ elixir('js/datatables.js') }}" type="text/javascript"></script>
  <script src="{{ elixir('js/bootstrap-confirmation.js') }}" type="text/javascript"></script>
@stop

@section('page-level-scripts')
  <script src="{{ elixir('js/table-datatables-buttons.js') }}" type="text/javascript"></script>
  <script src="{{ elixir('js/ui-confirmations.js') }}" type="text/javascript"></script>
@stop
