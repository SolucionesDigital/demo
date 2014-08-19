<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SolucionesDigital - Dashboard</title>

        <!-- Bootstrap Core CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Morris Charts CSS -->
        {{ HTML::style('css/admin/morris.css') }}

        <!-- Custom CSS -->
        {{ HTML::style('css/admin/style.css') }}

        <!-- WYSIWYG Styles -->
        {{ HTML::style('css/bootstrap-wysihtml5.css') }}

    </head>

    <body>

        <div id="wrapper">

            @include('Admin::layouts.navigation')

            <div id="page-wrapper">

                 <div class="container-fluid">

                    @yield('content')

					<div class="row">
						<div class="col-lg-12">
							<hr/>
							<p class="muted-text">Creado por <a href="http://solucionesdigital.com">Soluciones Digital</a></p>
						</div>
					</div>

                </div><!-- container-fluid -->

            </div><!-- page-wrapper -->

        </div><!-- wrapper -->

        <!-- jQuery Version 1.11.0 -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>

        <!-- Bootstrap Core JavaScript -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

        <!-- WYSIWYG JavaScripts -->
       {{ HTML::script('js/admin/wysihtml5.js') }}
       {{ HTML::script('js/admin/bootstrap3-wysihtml5.js') }}

        <!-- Morris Charts JavaScripts -->


		<!-- Custon JavaScript -->
        {{ HTML::script('js/admin/functions.js') }}

    </body>

</html>
