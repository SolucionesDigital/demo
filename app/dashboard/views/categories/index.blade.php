@extends('Admin::layouts.master')

@section('content')

	<!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-tags"></i> Categorías
            </h1>
        </div>
    </div><!-- /.row -->

    @include('Admin::layouts.message')

    <div class="row">

        <div class="col-sm-5">

			<h3 class="text-muted">Nueva Categoria</h3><hr/>

             {{ Form::open(['route' => 'admin.categorias.store', 'files' => true]) }}

				<label for="name">Nombre de la categoría</label>
                {{ Form::text('name', null, ['class' => 'form-control'] ) }}

                <label for="description">Descripción</label>
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 6] ) }}

				{{ Form::submit('Crear Nueva Categoría', ['class' => 'btn btn-primary']) }}

           {{ Form::close() }}

        </div>{{--col-sm-5--}}

        <div class="col-sm-7">

            @include('Admin::layouts.search')

            <div class="list-group">

                @if ( isset($categories) )

                    @foreach ($categories as $category)

                    <div class="list-group-item">
                        <h4 class="list-group-item-heading">
                            {{ $category->name }}
                        </h4>
                        <div class="list-group-item-text">
                            <ul class="list-inline">
                                <li class="pull-right text-muted">{{ $category->slug }}</li>
                                <li>{{ link_to_route('admin.categorias.edit', 'Editar', $category->id, ['class' => 'edit-entity']) }}</li>
                                <li>{{ link_to_delete('admin.categorias.destroy', 'Borrar', $category->id, ['class' => 'btn btn-link delete-entity']) }}</li>
                            </ul>
                        </div>
                    </div>

                    @endforeach

                <div class="pagination-container">{{ $categories->links('pagination::slider-3') }}</div>

                @else

                    <div href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">No se encontro ninguna categoria.</h4>
                    </div>

                @endif

            </div><!-- .list-group-->

        </div><!-- .col-sm-7 -->

    </div><!-- .row -->

@stop