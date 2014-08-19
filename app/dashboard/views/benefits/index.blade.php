@extends('Admin::layouts.master')

@section('content')

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<i class="fa fa-fw fa-ticket"></i> Beneficios
				<a href="{{ route('admin.beneficios.create') }}" class="btn btn-primary pull-right">
					Agregar Nuevo Beneficio
				</a>
			</h1>
		</div>
	</div><!-- /.row -->

	@include('Admin::layouts.message')

	<div class="row">

		<div class="col-lg-12">

			@include('Admin::layouts.search')

			<div class="list-group">

				@if ( isset($benefits) )

					@foreach ($benefits as $benefit)

					<div class="list-group-item">
						<h4 class="list-group-item-heading">{{ $benefit->title }}</h4>
						<div class="list-group-item-text">
							<ul class="list-inline">
								<li class="pull-right text-muted">{{ $benefit->created_at->formatLocalized('%B %Y') }}</li>
								<li>{{ link_to_route('admin.beneficios.edit', 'Editar', $benefit->id, ['class' => 'edit-entity']) }}</li>
								<li>{{ link_to_delete('admin.beneficios.destroy', 'Borrar', $benefit->id, ['class' => 'btn btn-link delete-entity']) }}</li>
							</ul>
						</div>
					</div>

					@endforeach

				<div class="pagination-container">{{ $benefits->links('pagination::slider-3') }}</div>

				@else

					<div href="#" class="list-group-item">
						<h4 class="list-group-item-heading">No se encontro ningun beneficio.</h4>
					</div>

				@endif

			</div><!-- .list-group-->

		</div><!-- .col-lg-12 -->

	</div><!-- .row -->

@stop