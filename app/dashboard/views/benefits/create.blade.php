@extends('Admin::layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-ticket"></i> Beneficios <small>Crear Nuevo</small>
            </h1>
        </div>
    </div><!-- /.row -->

    @include('Admin::layouts.message')

    <div class="row">

        <div class="col-lg-12">

            <div class="list-group">

               {{ Form::open(['route' => 'admin.beneficios.store', 'files' => true]) }}

                   @include('Admin::benefits.partials._form', ['benefit' => null])

               {{ Form::close() }}

            </div><!-- .list-group-->

        </div><!-- .col-lg-12 -->

    </div><!-- .row -->

@stop