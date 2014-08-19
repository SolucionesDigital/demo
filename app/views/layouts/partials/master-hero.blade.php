@if ( is_home() )

	<div class="master-hero">

		<div class="container">
			<div class="row">

				<div class="col-sm-7">
					<section>
						<h3>
							Disfruta desde hoy tus <br>
							beneficios de manera
						</h3>
						<h2>fácil y sencilla</h2>
						@if( isset($categories) )
							@foreach($categories as $category)
								<a href="#" class="btn btn-outline-inverse btn-sm">{{ $category->name }}</a>
							@endforeach
						@endif
					</section>
				</div>

				<div class="col-sm-5">
					<section class="text-center">
						<span class="glyphicon glyphicon-user"></span>
						<div class="clearfix"></div>
						<a href="{{ route('profile.edit') }}" class="btn btn-outline-inverse btn-xl">Iniciar sesión</a>
						<div>
							<img class="mano" src="{{ asset('images/mano.png') }}" alt="">
						</div>
					</section>
				</div>


			</div>
		</div>

	</div>

@endif