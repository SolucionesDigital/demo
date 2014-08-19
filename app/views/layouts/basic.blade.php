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

	<div class="container">

		@yield('content')

	</div><!-- container -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	{{ HTML::script('js/vendor/plugins.js') }}
	{{ HTML::script('js/functions.js') }}
	{{ HTML::script('js/beneficios.js') }}
	</body>

</html>
