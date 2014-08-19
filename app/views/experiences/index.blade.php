@extends('layouts.master')

@section('content')


<div class="row revista-heading">

	<div class="col-sm-7">
		<a href="#">
			<img src="http://placehold.it/940x400" alt=""/>
		</a>
	</div><!-- col-lg-5 -->

	<div class="col-sm-5">
		<h1>Lorem Ipsum</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cupiditate delectus, deserunt eius ex iste modi placeat repudiandae, unde vero voluptatem, voluptatum!</p>
		<a class="btn btn-primary pull-right" href="#">Leer Mas <span class="glyphicon glyphicon-arrow-right"></span></a>
	</div><!-- col-lg-7 -->

</div><!-- row revista-heading -->

<hr>


<div class="revista-container">

	@foreach($experiences->chunk(4) as $experienceSet)

	<div class="row">

		@foreach($experienceSet as $experience)

		<div class="col-md-3">

			<article>
				<a href="{{ $experience->permalink }}">
					<figure>
						<img src="http://placehold.it/300x300">
						<figcaption>{{ $experience->title }}</figcaption>
					</figure>
					<p>{{ $experience->excerpt }}</p>
				</a>
			</article>

		</div>

		@endforeach

	</div><!-- row -->

	@endforeach

</div><!-- revista-container -->

{{ $experiences->links() }}

@stop