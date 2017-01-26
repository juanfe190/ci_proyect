<div class="form-body">
  <div class="form-group {{ $errors->has('rol_name') ? 'has-error' : ''}}">
    {!! Form::label('rol_name', 'Nombre de Rol', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
      {!! Form::text('rol_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Escriba el nombre del rol de usuario', 'maxlength' => '20']) !!}
      @if($errors->has('rol_name'))
        <span class="help-block">*{{ $errors->first('rol_name') }}</span>
      @endif
    </div>
  </div>
</div>
<div class="form-actions">
  <div class="row">
    <div class="col-md-12">
      <a href="{{ route('roles.index') }}" class="btn default">Cancelar</a>
      <button type="submit" class="btn blue" data-toggle="confirmation" data-placement="top" data-original-title="¿ Está seguro ?" data-btn-ok-label="Sí" data-btn-ok-icon="icon-like" data-btn-cancel-label="No" data-btn-cancel-icon="icon-close" data-popout="true">
        <i class="fa fa-check"></i> {{$submitButtonText}}</button>
    </div>
  </div>
</div>