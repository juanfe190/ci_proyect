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
  <div class="form-group">
    {!! Form::label('', 'Color', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      <label class="radio-color category-1">
        {!! Form::radio('color_code', '1') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-2">
        {!! Form::radio('color_code', '2') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-3">
        {!! Form::radio('color_code', '3') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-4">
        {!! Form::radio('color_code', '4') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-5">
        {!! Form::radio('color_code', '5') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-6">
        {!! Form::radio('color_code', '6') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-7">
        {!! Form::radio('color_code', '7') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-8">
        {!! Form::radio('color_code', '8') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-9">
        {!! Form::radio('color_code', '9') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-10">
        {!! Form::radio('color_code', '10') !!}
        <div class="radio_indicator"></div>
      </label>
      <label class="radio-color category-11">
        {!! Form::radio('color_code', '11') !!}
        <div class="radio_indicator"></div>
      </label>
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
