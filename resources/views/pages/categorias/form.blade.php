<div class="form-body">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::text('name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Escriba el nombre de la categoría', 'maxlength' => '35']) !!}
      @if($errors->has('name'))
        <span class="help-block">*{{ $errors->first('name') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('color_code') ? 'has-error' : ''}}">
    {!! Form::label('color_code', 'Color (HEX)', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::text('color_code', null, ['class' => 'form-control demo', 'autocomplete' => 'off', 'maxlength' => '7', 'data-control' => 'hue']) !!}
      @if($errors->has('color_code'))
        <span class="help-block">*{{ $errors->first('color_code') }}</span>
      @endif
    </div>
  </div>
</div>

<div class="form-actions left">
  <a href="{{ route('categories.index') }}" class="btn default">Cancelar</a>
  <button type="submit" class="btn blue" data-toggle="confirmation" data-placement="top" data-original-title="¿ Está seguro ?" data-btn-ok-label="Sí" data-btn-ok-icon="icon-like" data-btn-cancel-label="No" data-btn-cancel-icon="icon-close" data-popout="true">
      <i class="fa fa-check"></i> {{$submitButtonText}}</button>
</div>