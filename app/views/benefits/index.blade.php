@extends('layouts.master')

@section('content')

<div class="row revista-heading">

	<div class="col-sm-3 category-container">
		<h3>Categorías</h3>

		@if ($categories)
			<ul class="nav nav-pills nav-stacked">
				@foreach($categories as $category)
					<li>
						<a href="{{ route('benefits.category.show', [$category->slug]) }}">
							<span class="badge pull-right">{{ $category->total }}</span>
							{{ $category->name }}
						</a>
					</li>
				@endforeach
			</ul>
		@endif
	</div><!-- col-lg-7 -->

	<div class="col-sm-9">
		<a href="#">
			<img src="{{ asset('images/beneficio-boletos.jpg') }}" class="img-responsive">
		</a>
	</div><!-- col-lg-5 -->

</div><!-- row revista-heading -->

<hr>

@foreach($benefits->chunk(4) as $benefitSet)

<div class="row">

	@foreach($benefitSet as $benefit)

	<div class="beneficios-container">

		<div class="col-xs-3 {{ Auth::check() ? 'add-benefit' : 'guest-benefit' }}" data-benefit='{{ $benefit->toJson() }}'>

			<article>

				<figure>
				    <img src="{{ asset($benefit->featured_image) }}" alt="{{ $benefit->title }}">
					<figcaption>{{ $benefit->title }}</figcaption>
				</figure>

				{{ $benefit->subtitle }}

				<div class="clearfix"></div>

				@if($benefit->categories)
					@foreach($benefit->categories as $category)
						<span class="label label-primary">{{ $category->name }}</span>
					@endforeach
				@endif

			</article>

		</div><!-- col-xs-3 -->

	</div><!-- beneficios-container -->

	@endforeach

</div><!-- row -->

@endforeach

{{ $benefits->links() }}

@if( Auth::check() )
	@include('benefits.partials.modal-registered')
@else
	@include('benefits.partials.modal-guest')
@endif

@stop
