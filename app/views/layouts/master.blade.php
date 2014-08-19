<!doctype html>
	<head>
		<meta charset="utf-8">
		<title>Beneficios</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/vnd.microsoft.icon">
		<meta name="description" content="Beneficios">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="cleartype" content="on">
		<!--[if IE]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
		{{ HTML::style('css/style.css') }}
	</head>

	<body>
	<!--[if lt IE 8]>
	<p class="chromeframe">Estás usando una versión <strong>vieja</strong> de tu explorador. Por favor <a href="http://browsehappy.com/" target="_blank"> actualiza tu explorador</a> para tener una experiencia completa.</p>
	<![endif]-->

	@include('layouts.partials.navigation')

	@include('layouts.partials.master-hero')

	<div class="container">

		<div class="row">

			<div class="col-xs-12">

				@include('layouts.partials.messages')

			</div><!-- col-xs-12 -->

		</div><!-- row -->

		@yield('content')

	</div><!-- container -->

	<footer>

		<div class="container">

			<div class="row">
				<style>.aliados-container .img-responsive{ height: 40px; width: auto; max-width: none; }</style>
				<div class="col-lg-12 aliados-container">
					<div class="col-sm-1 col-sm-offset-1"><img class="img-responsive" src="{{ asset('images/aliados/apple.png') }}" alt="apple"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/axtel.png') }}" alt="axtel"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/cinemex.png') }}" alt="cinemex"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/cinepolis.png') }}" alt="cinepolis"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/dominos.png') }}" alt="dominos"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/italianis.png') }}" alt="italianis"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/macdonalds.png') }}" alt="macdonalds"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/mayan-palace.png') }}" alt="mayan-palace"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/sanborns.png') }}" alt="sanborns"></div>
					<div class="col-sm-1"><img class="img-responsive" src="{{ asset('images/aliados/telcel.png') }}" alt="telcel"></div>
				</div><!-- col-lg-12 -->
			</div><!-- row -->

			<div class="row">
				<hr>
				<div class="col-lg-12">
					<p>SolucionesDigital, México. {{ date('Y') }} &nbsp; — &nbsp; <a href="/aviso-legal" target="_blank">Terminos y Condiciones</a></p>
				</div>
			</div><!-- row -->

		</div><!-- container -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		{{ HTML::script('js/vendor/plugins.js') }}
		{{ HTML::script('js/functions.js') }}
		{{ HTML::script('js/beneficios.js') }}

	</footer>

	</body>

</html>
