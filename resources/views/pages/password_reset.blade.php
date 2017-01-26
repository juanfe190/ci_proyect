Cambio de contrasena a: {{$passResetInfo->email}}<br>
{!! Form::open(['route' => ['passreset.store', $passResetInfo->id],'class' => 'login-form', 'method'=>'PUT']) !!}
Old: {!! Form::text('old_password') !!}
New: {!! Form::text('new_password') !!}
{!! Form::submit('enviar') !!}
{!! Form::close() !!}