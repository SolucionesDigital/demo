@extends('layouts.master')

@section('content')

</div><!-- container -->

	<div class="gif-beneficios">

			<div class="container">

				<div class="row">

					<div class="col-sm-6">
						<div class="text-center">
							<img class="img-responsive" src="{{ asset('images/beneficios_animate.gif') }}" alt="">
						</div>
					</div>

					<div class="col-sm-6">
						<h4>Utilizar tus beneficios es muy fácil:</h4>
						<ul>
							<li><span class="glyphicon glyphicon-ok"></span> Ingresa a tu cuenta</li>
							<li><span class="glyphicon glyphicon-ok"></span> Busca y selecciona tus beneficios</li>
							<li><span class="glyphicon glyphicon-ok"></span> Guarda e imprime tu cupón</li>
							<li><span class="glyphicon glyphicon-ok"></span> Canjea y disfruta</li>
						</ul>
					</div>
				</div>

			</div>
	</div>

<div class="container">

<div class="row">

	<div class="col-sm-4">
		<img class="img-responsive" src="images/beneficios.png" alt="Beneficios">
		<h2>Beneficios</h2>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin auctor quam ac tempor. Cras a ante sed libero mollis sodales. Praesent fringilla, neque ut ultrices faucibus, dolor eros ultrices neque, nec bibendum arcu ipsum eget justo.</p>
		<a class="btn btn-default" href="{{ route('benefits.index') }}">Ver +</a>
	</div><!-- col-sm-4 -->

	<div class="col-sm-4">
		<img class="img-responsive" src="images/consultas.png" alt="Consultas">
		<h2>Experiencias</h2>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin auctor quam ac tempor. Cras a ante sed libero mollis sodales. Praesent fringilla, neque ut ultrices faucibus, dolor eros ultrices neque, nec bibendum arcu ipsum eget justo.</p>
		<a class="btn btn-default" href="{{ route('experiences.index') }}">Ver +</a>
	</div><!-- col-sm-4 -->

	<div class="col-sm-4">
		<img class="img-responsive" src="images/revistadig.png" alt="Revista">
		<h2>Mi Perfil</h2>
		<hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sollicitudin auctor quam ac tempor. Cras a ante sed libero mollis sodales. Praesent fringilla, neque ut ultrices faucibus, dolor eros ultrices neque, nec bibendum arcu ipsum eget justo.</p>
		<a class="btn btn-default" href="{{ route('profile.edit') }}">Ver +</a>
	</div><!-- col-sm-4 -->

</div><!-- row -->


@stop