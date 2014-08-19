@extends('Admin::layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-user"></i> Usuarios <small>Crear Nuevo</small>
            </h1>
        </div>
    </div><!-- .row -->

    @include('Admin::layouts.message')

    <div class="row">

        <div class="col-lg-12">

            <div class="list-group">

				{{ Form::open(['route' => 'admin.usuarios.create', 'files' => true]) }}

					<div class="row">

					    <div class="col-md-8">

							<h4>Informacion Personal</h4><hr>

					        <!-- username -->
							<div class="form-group">
								<label for="username" class="col-sm-4 control-label">Username</label>
								<div class="col-sm-8">
									{{ Form::text('username', null, ['id'=>'username', 'class' => 'form-control', 'placeholder' => 'Username']) }}
								</div>
							</div>

							<!-- email -->
							<div class="form-group">
								<label for="email" class="col-sm-4 control-label">Email</label>
								<div class="col-sm-8">
									{{ Form::email('email', null, ['id'=>'email', 'class' => 'form-control', 'placeholder' => 'Email']) }}
								</div>
							</div>

					        <!-- nombre -->
					        <div class="form-group">
					            <label for="first_name" class="col-sm-4 control-label">Nombre</label>
					            <div class="col-sm-8">
					                {{ Form::text('first_name', null, ['id'=>'first_name', 'class' => 'form-control', 'placeholder' => 'Nombre']) }}
					            </div>
					        </div>

					        <!-- apellido -->
					        <div class="form-group">
					            <label for="last_name" class="col-sm-4 control-label">Apellido</label>
					            <div class="col-sm-8">
					                {{ Form::text('last_name', null, ['id'=>'last_name', 'class' => 'form-control', 'placeholder' => 'Apellido']) }}
					            </div>
					        </div>

					        <!-- numero de seguro social -->
					        <div class="form-group">
					            <label for="nss" class="col-sm-4 control-label">Nuero de Seguro Social (NSS)</label>
					            <div class="col-sm-8">
					                {{ Form::text('nss', null, ['id'=>'nss', 'class' => 'form-control', 'placeholder' => 'Nuero de Seguro Social']) }}
					            </div>
					        </div>

							<div class="form-group">
								<label for="state" class="col-sm-4 control-label">Estado</label>
								<div class="col-sm-8">
									@include('layouts.forms.select-state')
								</div>
							</div>


							<h4>Contraseña</h4><hr>

							<div class="form-group">
								<label for="password" class="col-sm-4 control-label">Contraseña</label>
								<div class="col-sm-8">
									{{ Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'Contraseña']) }}
								</div>
							</div>

							<div class="form-group">
								<label for="password_confirmation" class="col-sm-4 control-label">Confirmar Contraseña</label>
					            <div class="col-sm-8">
					                {{ Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'Confirmar Contraseña']) }}
									<p>La contraseña debería tener al menos seis caractéres. Usa mayúsculas y minúsculas, números y simbolos para hacerla más segura.</p>
					            </div>
							</div>


							<div class="form-group">
								<button type="submit" class="btn btn-primary">Crear Usuario</button>
							</div>

					    </div><!-- col-md-8 -->

					    <div class="col-md-4">

					        <!-- Publicar -->
					        <div class="panel panel-default">
					            <div class="panel-heading">
					                <h3 class="panel-title">Guardar</h3>
					            </div>
					            <div class="panel-body">
					                {{ Form::submit('Crear Usuario', ['class' => 'btn btn-primary btn-block']) }}
					            </div>
					        </div>


					        <!-- Imagen Destacada -->
					        <div class="panel panel-default">

					            <div class="panel-heading">
					                <h3 class="panel-title">Imagen de Perfil</h3>
					            </div>

					            <div class="panel-body">
					                <div class="image-container">

					                </div>
					                {{ Form::file('featured_image', null, ['class' => 'form-control']) }}
					            </div><!-- panel-body -->

					        </div><!-- panel -->


					    </div><!-- col-md-4 -->

					</div><!-- row -->

				{{ Form::close() }}

            </div><!-- .list-group-->

        </div><!-- .col-lg-12 -->

    </div><!-- .row -->

@stop