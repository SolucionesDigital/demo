@extends('layouts.master')


@section('content')


<div class="heading">
	<h2>Mi Perfil</h2>
</div>

<div class="row perfil-container">

	<div class="col-xs-3 perfil-image-container">
		<div class="lead">Foto de perfil</div>
		<img src="{{ $currentUser->getAvatarUrl(300) }}" class="img-responsive">
		<button type="submit" class="btn btn-primary btn-waiting btn-block">Cambiar imagen</button>
	</div>


	<div class="col-sm-5">
		<div class="lead">Actualiza tus datos personales</div>

		<div id="contact-form-error" class="bs-callout bs-callout-error">
			<h4><span class="glyphicon glyphicon-remove"></span> Se encontraron errores al procesar el formulario.</h4>
			<p id="contact-form-message">Inputs will only be fully styled if their <code>type</code> is properly declared.</p>
		</div>

		<div id="contact-form-success" class="bs-callout bs-callout-success">
			<h4><span class="glyphicon glyphicon-ok"></span> Gracias por ponerse en contacto con nosotros!</h4>
			<p>Nos ponemos en contacto contigo lo más pronto posible.</p>
		</div>

		{{ Form::model($profile, ['route' => array('profile.update', 1), 'method' => 'PATCH']) }}

		<div class="form-group">
			<label for="username">Usuario</label>
			{{ Form::text('username', null, ['class'=>'form-control', 'id'=>'username', 'placeholder'=>'Usuario']) }}
		</div>

		<div class="form-group">
			<label for="email">Correo Electrónico</label>
			{{ Form::email('email', null, ['class'=>'form-control', 'id'=>'email', 'placeholder'=>'Correo Electrónico']) }}
		</div>

		<div class="form-group">
			<label for="first">Nombre</label>
			{{ Form::text('first', null, ['class'=>'form-control', 'id'=>'first', 'placeholder'=>'Nombre']) }}
		</div>

		<div class="form-group">
			<label for="last">Apellido</label>
			{{ Form::text('last', null, ['class'=>'form-control', 'id'=>'last', 'placeholder'=>'Apellido']) }}
		</div>

		<div class="form-group">
			<label for="nss">Nuero de Seguro Social (NSS)</label>
			{{ Form::text('nss', null, ['class'=>'form-control', 'id'=>'nss', 'placeholder'=>'Nuero de Seguro Social']) }}
		</div>

		<div class="form-group">
			<label for="state">Estado</label>
			@include('layouts.forms.select-state')
		</div>

		<button type="submit" class="btn btn-primary pull-right btn-waiting">Guardar cambios</button>

		</form>

		<div class="clearfix"></div>

	</div><!-- col-sm-7 -->

	<div class="col-sm-3 col-sm-offset-1 password">
		<h3>Cambia tu contraseña</h3>
		<p>Si deseas cambiar de contraseña escribe una nueva. De lo contrario deja en blanco los campos</p>

		<form id="password-form" role="form">

			<div class="form-group">
				<label for="password">Nueva contraseña</label>
				<input type="password" class="form-control" id="password" placeholder="Nueva contraseña">
			</div>

			<div class="form-group">
				<label for="confirm">Confirmar contraseña</label>
				<input type="password" class="form-control" id="confirm" placeholder="Confirmar contraseña">
			</div>

			<p>Tu contraseña debería tener al menos seis caractéres. Usa mayúsculas y minúsculas, números y simbolos para hacerla más segura.</p>

			<button type="submit" class="btn btn-primary pull-right btn-waiting">Cambiar contraseña</button>
			<div class="clearfix"></div>


			{{ Form::close() }}

			<div>

			</div>



	</div><!-- col-sm-4 -->

</div><!-- row -->

@stop