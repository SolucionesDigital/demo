@extends('layouts.master')


@section('content')

<div class="heading">
	<h2>Descargas</h2>
</div>

@foreach($benefits->chunk(4) as $benefitSet)

<div class="row">

	<div class="beneficios-container downloads-container col-xs-12">

	@foreach($benefitSet as $benefit)

		<div class="row">

				<div class="col-xs-2">
					<figure>
                        <img src="{{ asset($benefit->featured_image) }}" alt="{{ $benefit->title }}" class="thumbnail img-responsive">
					</figure>
				</div><!-- col-xs-3 -->

				<div class="col-xs-10">

					<h3>{{ $benefit->title }}</h3>

					{{ $benefit->content }}

					<div class="clearfix"></div>
					<hr>

					@if($benefit->redeemed == 'true')
						<span class="label label-danger pull-right"> redimido {{ $benefit->updated_at->diffForHumans() }}</span>
					@else
						{{ link_to_route('benefits.print', 'Imprimir', [$benefit->benefit_id], ['class'=>'btn btn-primary btn-sm pull-right', 'target' => '_blank']) }}
						{{ link_to_route('benefits.download', 'Descargar', [$benefit->benefit_id], ['class'=>'btn btn-primary btn-sm pull-right hidden-xs hidden-sm']) }}
					@endif

				</div><!-- col-xs-9 -->

		</div><!-- row -->
		<div class="clearfix"></div>
	@endforeach

	</div><!-- beneficios-container -->

</div><!-- row -->

@endforeach

{{ $benefits->links() }}

@stop