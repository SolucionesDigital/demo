@extends('Admin::layouts.master')

@section('content')

	<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-user"></i> Usuarios
            </h1>
        </div>
    </div><!-- /.row -->

    @include('Admin::layouts.message')

    <div class="row">

		<div class="col-lg-12">

			@include('Admin::layouts.search')

			<div class="list-group">

				@if ( isset($users) )

					@foreach ($users as $user)

					<div class="list-group-item">
						<h4 class="list-group-item-heading">
							<span class="username">{{ $user->username }}</span>
							<small><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></small>
						</h4>
						<div class="list-group-item-text">
							<ul class="list-inline">
								<li class="pull-right text-muted">{{ $user->created_at->formatLocalized('%B %Y') }}</li>
								<li>{{ link_to_route('admin.usuarios.edit', 'Editar', $user->id, ['class' => 'edit-entity']) }}</li>
								<li>{{ link_to_delete('admin.usuarios.destroy', 'Borrar', $user->id, ['class' => 'btn btn-link delete-entity']) }}</li>
							</ul>
						</div>
					</div>

					@endforeach

				<div class="pagination-container">{{ $users->links('pagination::slider-3') }}</div>

				@else

					<div href="#" class="list-group-item">
						<h4 class="list-group-item-heading">No se encontro ninguna experiencia.</h4>
					</div>

				@endif

			</div><!-- .list-group-->

		</div><!-- .col-lg-12 -->

	</div><!-- row -->

@stop