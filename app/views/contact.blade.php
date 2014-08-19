@extends('layouts.master')

@section('content')

<div class="heading">
	<h2>Contacto</h2>
</div>

<div class="row">

	<div class="col-md-7">

		<div class="lead">Envíanos tus comentarios, dudas o sugerencias y nos pondremos en contacto contigo a la brevedad</div>

		<div id="contact-form-error" class="bs-callout bs-callout-error">
			<h4><span class="glyphicon glyphicon-remove"></span> Se encontraron errores al procesar el formulario.</h4>
			<p id="contact-form-message">Inputs will only be fully styled if their <code>type</code> is properly declared.</p>
		</div>

		<div id="contact-form-success" class="bs-callout bs-callout-success">
			<h4><span class="glyphicon glyphicon-ok"></span> Gracias por ponerse en contacto con nosotros!</h4>
			<p>Nos ponemos en contacto contigo lo más pronto posible.</p>
		</div>

		<form id="contact-form" role="form">

			<div class="form-group">
				<label for="name">Nombre</label>
				<input class="form-control" id="name" placeholder="Nombre">
			</div>

			<div class="form-group">
				<label for="subject">Asunto</label>
				<input class="form-control" id="subject" placeholder="Asunto">
			</div>

			<div class="form-group">
				<label for="email">Correo Electrónico</label>
				<input type="email" class="form-control" id="email" placeholder="Correo Electrónico">
			</div>

			<div class="form-group">
				<label for="message">Mensaje</label>
				<textarea class="form-control" id="message" placeholder="Mensaje" rows="10"></textarea>
			</div>

			<button type="submit" class="btn btn-primary pull-right btn-waiting">Enviar <span class="glyphicon glyphicon-send"></span></button>

			<div class="clearfix"></div>

		</form><!-- contact-form -->

	</div><!-- col-md-7 -->


	<div class="col-md-4 col-md-offset-1">

		<div class="side-box">
			<h3>Acercate</h3>
			<p class="lead-medium">¡Acércate a nosotros, queremos saber de ti!</p>
			<ul>
				<li><span class="glyphicon glyphicon-info-sign"></span> Envíanos tus comentarios, dudas o sugerencias y nos pondremos en contacto contigo a la brevedad</li>
				<li><span class="glyphicon glyphicon-info-sign"></span> Nos interesa conocerte y que sepas qué hacemos y qué ofrecemos en la plataforma</li>
			</ul>
		</div><!-- side-box -->

		<h3>Redes Sociales</h3>
		<ul class="contactlinks">
			<li><a class="icon-twitter" href="#">Twitter</a></li>
			<li><a class="icon-facebook" href="#">Facebook</a></li>
			<li><a class="icon-google" href="#">Google</a></li>
		</ul><!-- contactlinks -->

	</div><!-- col-md-4 -->

</div><!-- row -->

@stop
