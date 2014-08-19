@extends('Admin::layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-ticket"></i> Experiencias <small>Crear Nueva</small>
            </h1>
        </div>
    </div><!-- /.row -->

    @include('Admin::layouts.message')

    <div class="row">

        <div class="col-lg-12">

            <div class="list-group">

				{{ Form::open(['route' => 'admin.experiencias.store', 'files' => true]) }}

					@include('Admin::experiences.partials._form')

				{{ Form::close() }}

            </div><!-- .list-group-->

        </div><!-- .col-lg-12 -->

    </div><!-- .row -->

@stop