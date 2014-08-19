@extends('Admin::layouts.master')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <i class="fa fa-fw fa-ticket"></i> Beneficios <small>Editar</small>
            </h1>
        </div>
    </div><!-- /.row -->

    @include('Admin::layouts.message')

    <div class="row">

        <div class="col-lg-12">

            <div class="list-group">

               {{ Form::model($benefit, ['route' => ['admin.beneficios.update', $benefit->id], 'method' => 'PUT', 'files' => true]) }}

                   @include('Admin::benefits.partials._form')

               {{ Form::close() }}

            </div><!-- .list-group-->

        </div><!-- .col-lg-12 -->

    </div><!-- .row -->

@stop