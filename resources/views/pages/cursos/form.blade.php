<div class="form-body">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::text('name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Escriba el nombre del curso', 'maxlength' => '150']) !!}
      @if($errors->has('name'))
        <span class="help-block">*{{ $errors->first('name') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Descripción', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::textarea('description', null, ['id' => 'summernote', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Aquí va la descripción del curso', 'maxlength' => '500']) !!}
      @if($errors->has('description'))
        <span class="help-block">*{{ $errors->first('description') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('category_id', 'Categoría', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::select('category_id', $categorias, null, ['class' => 'bs-select form-control', 'placeholder' => 'Seleccione la categoría del curso', 'autocomplete' => 'off', 'data-live-search' => 'true', 'data-size' => '8']) !!}
      @if($errors->has('category_id'))
        <span class="help-block">*{{ $errors->first('category_id') }}</span>
      @endif
    </div>
  </div>
</div>
<div class="form-actions left">
  <a href="{{ route('courses.index') }}" class="btn default">Cancelar</a>
  <button type="submit" class="btn blue" data-toggle="confirmation" data-placement="top" data-original-title="¿ Está seguro ?" data-btn-ok-label="Sí" data-btn-ok-icon="icon-like" data-btn-cancel-label="No" data-btn-cancel-icon="icon-close" data-popout="true">
      <i class="fa fa-check"></i> {{$submitButtonText}}</button>
</div>