@extends('Admin::layouts.master')

@section('content')

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<i class="fa fa-fw fa-gift"></i> Experiencias
				<a href="{{ route('admin.experiencias.create') }}" class="btn btn-primary pull-right">
					Agregar Nueva Experiencias
				</a>
			</h1>
		</div>
	</div><!-- /.row -->

	@include('Admin::layouts.message')

	<div class="row">

		<div class="col-lg-12">

			@include('Admin::layouts.search')

			<div class="list-group">

				@if ( isset($experiences) )

					@foreach ($experiences as $experience)

					<div class="list-group-item">
						<h4 class="list-group-item-heading">{{ $experience->title }}</h4>
						<div class="list-group-item-text">
							<ul class="list-inline">
								<li class="pull-right text-muted">{{ $experience->created_at->formatLocalized('%B %Y') }}</li>
								<li>{{ link_to_route('admin.experiencias.edit', 'Editar', $experience->id, ['class' => 'edit-entity']) }}</li>
								<li>{{ link_to_delete('admin.experiencias.destroy', 'Borrar', $experience->id, ['class' => 'btn btn-link delete-entity']) }}</li>
							</ul>
						</div>
					</div>

					@endforeach

				<div class="pagination-container">{{ $experiences->links('pagination::slider-3') }}</div>

				@else

					<div href="#" class="list-group-item">
						<h4 class="list-group-item-heading">No se encontro ninguna experiencia.</h4>
					</div>

				@endif

			</div><!-- .list-group-->

		</div><!-- .col-lg-12 -->

	</div><!-- .row -->

@stop