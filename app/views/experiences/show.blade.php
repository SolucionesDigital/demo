@extends('layouts.master')


@section('content')

<div class="row revista-heading">

	<div class="col-lg-12">

		<h1>{{ $experience->title }}</h1>

		<ul class="post-meta">
			<li>
				<!-- post date -->
				<span class="glyphicon glyphicon-calendar"></span>
				<a href="#">
					<time pubdate datetime="2014-02-27">
						27 febrero 2014
					</time>
				</a>
			</li>
			<li class="hidden-xs">
				<span class="glyphicon glyphicon-tag"></span>
				<a href="#">Uncategorized</a>
			</li>
			<li class="pull-right">
				<a href="#" rel="next">Siguiente <span class="glyphicon glyphicon-arrow-right"></span></a>
			</li>
			<li class="pull-right">|</li>
			<li class="pull-right">
				<a href="#" rel="prev"><span class="glyphicon glyphicon-arrow-left"></span> Anterior</a>
			</li>
		</ul>

	</div><!-- col-lg-12 -->

</div><!-- revista-heading -->


<div class="row revista-single">

	<div class="col-md-12">
		<img src="http://placehold.it/940x400" class="img-responsive img-revista"/>
		<h2>Some Random title</h2>
		<p>{{ $experience->content }}</p>
	</div><!-- col-md-12 -->

</div><!-- row -->


<div class="row revista-relacionadas">

	@if( isset($relateds) )

	<div class="col-lg-12">
		<h3 class="page-header">Notas Relacionadas</h3>
	</div>

	@foreach($relateds as $related)

	<div class="col-sm-3 col-xs-6">
		<a href="#">
			<img src="http://placehold.it/300x150" class="img-responsive"/>
		</a>
	</div>

	@endforeach

	@endif

</div><!-- row -->

@stop
