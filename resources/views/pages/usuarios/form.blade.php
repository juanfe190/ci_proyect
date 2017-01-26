@inject('countries', 'App\Http\Utilities\Country')

<div class="form-body">
  <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    {!! Form::label('first_name', 'Primer Nombre', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::text('first_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Escriba el primer nombre del usuario', 'maxlength' => '35']) !!}
      @if($errors->has('first_name'))
        <span class="help-block">*{{ $errors->first('first_name') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    {!! Form::label('last_name', 'Primer Apellido', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::text('last_name', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Escriba el primer apellido del usuario', 'maxlength' => '35']) !!}
      @if($errors->has('last_name'))
        <span class="help-block">*{{ $errors->first('last_name') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('rol_id') ? 'has-error' : ''}}">
    {!! Form::label('rol_id', 'Rol', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::select('rol_id', $rols, null, ['class' => 'bs-select form-control', 'placeholder' => 'Seleccione el rol del usuario', 'autocomplete' => 'off', 'data-live-search' => 'true', 'data-size' => '8']) !!}
      @if($errors->has('rol_id'))
        <span class="help-block">*{{ $errors->first('rol_id') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Correo Electrónico', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      <div class="input-group">
        {!! Form::email('email', null, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Escriba el correo electrónico del usuario', 'maxlength' => '35']) !!}
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
      </div>
      @if($errors->has('email'))
        <span class="help-block">*{{ $errors->first('email') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('country') ? 'has-error' : ''}}">
    {!! Form::label('country', 'País de Residencia', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::select('country', $countries::all(), null, ['class' => 'bs-select form-control', 'placeholder' => 'Seleccione el país de residencia del usuario', 'autocomplete' => 'off', 'data-live-search' => 'true', 'data-size' => '8']) !!}
      @if($errors->has('country'))
        <span class="help-block">*{{ $errors->first('country') }}</span>
      @endif
    </div>
  </div>
  <div class="form-group {{ $errors->has('country_birth') ? 'has-error' : ''}}">
    {!! Form::label('country_birth', 'País de Nacimiento', ['class' => 'control-label col-md-3']) !!}
    <div class="col-md-9">
      {!! Form::select('country_birth', $countries::all(), null, ['class' => 'bs-select form-control', 'placeholder' => 'Seleccione el país de residencia del usuario', 'autocomplete' => 'off', 'data-live-search' => 'true', 'data-size' => '8']) !!}
      @if($errors->has('country_birth'))
        <span class="help-block">*{{ $errors->first('country_birth') }}</span>
      @endif
    </div>
  </div>
</div>
  
<div class="form-actions left">
  <a href="{{ route('users.index') }}" class="btn default">Cancelar</a>
  <button type="submit" class="btn blue" data-toggle="confirmation" data-placement="top" data-original-title="¿ Está seguro ?" data-btn-ok-label="Sí" data-btn-ok-icon="icon-like" data-btn-cancel-label="No" data-btn-cancel-icon="icon-close" data-popout="true">
      <i class="fa fa-check"></i> {{$submitButtonText}}</button>
</div>