<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a href="{{ route('home') }}" class="navbar-brand" title="dashboard home">
			<span class="glyphicon glyphicon-home"></span> SolucionesDigital
		</a>
	</div>
	<!-- Top Menu Items -->
	<ul class="nav navbar-right top-nav">

		@include('Admin::layouts.partials.message-dropdown')

		@include('Admin::layouts.partials.profile-dropdown')

	</ul>
	<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav side-nav">
			<li class="active">
				<a href="{{ route('admin.index') }}">
					<i class="fa fa-fw fa-dashboard"></i> Dashboard
				</a>
			</li>

			<li>
				<a href="javascript:;" data-toggle="collapse" data-target="#benefits">
					<i class="fa fa-fw fa-ticket"></i> &nbsp; Beneficios <i class="fa fa-fw fa-caret-down"></i>
				</a>
				<ul id="benefits" class="collapse in" style="">
					<li><a href="{{ route('admin.beneficios.index') }}"> Ver Beneficios</a></li>
					<li><a href="{{ route('admin.beneficios.create') }}"> Nuevo Beneficio</a></li>
					<li><a href="{{ route('admin.categorias.index') }}"> <i class="fa fa-fw fa-tags"></i> Categorías</a></li>
				</ul>
			</li>

			<li>
                <a href="javascript:;" data-toggle="collapse" data-target="#experiences">
                    <i class="fa fa-fw fa-gift"></i> &nbsp; Experiencias <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="experiences" class="collapse in" style="">
                    <li><a href="{{ route('admin.experiencias.index') }}"> Ver Experiencias</a></li>
                    <li><a href="{{ route('admin.experiencias.create') }}"> Nueva Experiencia</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-user"></i> &nbsp; Usuarios <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="users" class="collapse" style="">
                    <li><a href="{{ route('admin.usuarios.index') }}"> Ver Usuarios</a></li>
                    <li><a href="{{ route('admin.usuarios.create') }}"> Nuevo Usuario</a></li>
                </ul>
            </li>

			<li><a href="{{ route('admin.settings.index') }}"> <i class="fa fa-cog"></i> &nbsp; Configuración</a></li>

		</ul>
	</div>
	<!-- /.navbar-collapse -->
</nav>