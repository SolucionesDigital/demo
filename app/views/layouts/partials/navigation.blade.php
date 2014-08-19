<nav class="navbar navbar-fixed-top" role="navigation">

	<div class="container">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="glyphicon glyphicon-align-justify"></span>
			</button>
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('images/demo-logo.png') }}" alt="IMSS">
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			<ul class="nav navbar-nav navbar-right">

				<li><a href="{{ route('benefits.index') }}">Beneficios</a></li>
				<li><a href="{{ route('experiences.index') }}">Experiencias</a></li>
				<li><a href="{{ route('contacto.index') }}">Contacto</a></li>

				@if( Auth::check() )
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Mi Perfil <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ route('profile.edit') }}"><span class="glyphicon glyphicon-user"></span> Editar Mi Perfil</a></li>
							<li><a href="{{ route('downloads.show') }}"><span class="glyphicon glyphicon-save"></span> Mis Descargas</a></li>
							<li><a href="{{ route('session.destroy') }}"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
						</ul>
					</li>
				@else
					<li><a href="{{ route('session.create') }}">Ingresar</a></li>
				@endif

			</ul><!-- navbar-right -->

		</div><!-- /.navbar-collapse -->

	</div><!-- container -->

</nav>
