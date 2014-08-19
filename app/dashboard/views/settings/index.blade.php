@extends('Admin::layouts.master')

@section('content')

	<!-- Page Heading -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				<i class="fa fa-fw fa-cog"></i> Configuración
			</h1>
		</div>
	</div><!-- /.row -->

	@include('Admin::layouts.message')

	<div class="row">

		<div class="col-lg-12">

			{{ Form::open() }}

					<div class="row">

					    <div class="col-md-8">

							<h4>Informacion General</h4><hr>

					        <!-- site_title -->
							<div class="form-group">
								<label for="site_title" class="col-sm-4 control-label">Titulo del Sitio</label>
								<div class="col-sm-8">
									{{ Form::text('site_title', null, ['id'=>'site_title', 'class' => 'form-control', 'placeholder' => 'Titulo del Sitio']) }}
								</div>
							</div>

							<!-- admin_email -->
							<div class="form-group">
								<label for="admin_email" class="col-sm-4 control-label">Admin Email</label>
								<div class="col-sm-8">
									{{ Form::email('admin_email', null, ['id'=>'admin_email', 'class' => 'form-control', 'placeholder' => 'Email']) }}
								</div>
							</div>

							<h4>Social Media</h4><hr>

                            <!-- facebook -->
                            <div class="form-group">
                                <label for="facebook" class="col-sm-4 control-label">Facebook</label>
                                <div class="col-sm-8">
                                    {{ Form::text('facebook', null, ['id'=>'facebook', 'class' => 'form-control', 'placeholder' => 'Facebook']) }}
                                </div>
                            </div>

                            <!-- twitter -->
                            <div class="form-group">
                                <label for="twitter" class="col-sm-4 control-label">Twitter</label>
                                <div class="col-sm-8">
                                    {{ Form::text('twitter', null, ['id'=>'twitter', 'class' => 'form-control', 'placeholder' => 'Twitter']) }}
                                </div>
                            </div>

                            <!-- google_plus -->
                            <div class="form-group">
                                <label for="google_plus" class="col-sm-4 control-label">Google +</label>
                                <div class="col-sm-8">
                                    {{ Form::text('google_plus', null, ['id'=>'google_plus', 'class' => 'form-control', 'placeholder' => 'Google +']) }}
                                </div>
                            </div>

						</div><!-- col-md-8 -->

					</div><!-- row -->


			{{ Form::close() }}

		</div><!-- .col-lg-12 -->

	</div><!-- .row -->

@stop