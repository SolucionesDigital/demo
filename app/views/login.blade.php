@extends('layouts.basic')


@section('content')

<div class="row">

	<div class="col-md-5 center-block login-container">

		@include('layouts.partials.messages')

		<!-- login -->
		<div class="login">

			<h2>Accede a tu cuenta</h2>

			{{ Form::open(['route'=>'session.store', 'class'=>'login-form']) }}
			<!-- <form id="login-form" action="" method="POST" role="form"> -->
			<div class="form-group">
				<label for="loginEmail">Nombre de usuario</label>
				{{ Form::text('username', null, ['class'=>'form-control', 'id'=>'username', 'placeholder'=>'Nombre de usuario']) }}
			</div>

			<div class="form-group">
				<label for="loginPassword">Contraseña</label>
				{{ Form::password('password', ['class'=>'form-control', 'id'=>'password', 'placeholder'=>'Contraseña']) }}
			</div>

			<div class="checkbox">
				{{ Form::checkbox('remember', true, null, ['id'=>'remember']) }}
				&nbsp;<label for="remember">Recuérdame</label>
			</div>

			<div class="form-group">
				<button class="btn btn-primary btn-block" type="submit">Ingresar <span class="glyphicon glyphicon-log-in"></span></button>
			</div>
			{{ Form::close() }}

			<div class="register-options">
				<ul>
					<li><i class="icon-unlock"></i>
						<a href="/lostpassword" title="Lost Password">¿Has perdido tu contraseña?</a></li>
					<li>
						<i class="icon-circle-arrow-right"></i>
						<a href="/">« Volver a SolucionesDigital</a>
					</li>
				</ul>
			</div><!-- register-options -->

		</div><!-- login -->

	</div><!-- col-md-5 -->

</div><!-- row -->

@stop