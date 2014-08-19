@extends('layouts.basic')

@section('content')

<div class="row">

	<div class="col-xs-12">
		<!-- success -->
		@if( $errors->count() )
			<div class="bs-callout bs-callout-error">
				<h4><span class="glyphicon glyphicon-remove"></span> {{ $errors->first('error') }}</h4>
			</div>
		@else
			<div class="bs-callout bs-callout-success">
				<h4><span class="glyphicon glyphicon-ok"></span> El cupon es valido</h4>
			</div>
		@endif

	</div><!-- col-xs-12 -->

</div><!-- row -->

@stop
