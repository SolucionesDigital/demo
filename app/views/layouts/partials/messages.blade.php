
<!-- success -->
@if( Session::has('success') )
	<div class="bs-callout bs-callout-success">
		<h4><span class="glyphicon glyphicon-ok"></span> {{ Session::get('success') }}</h4>
	</div>
@endif

<!-- error -->
@if( Session::has('error') )
<div class="bs-callout bs-callout-error">
	<h4><span class="glyphicon glyphicon-remove"></span> {{ Session::get('error') }}</h4>
</div>
@endif


@if( Session::has('benefit-created') )
<div class="bs-callout bs-callout-success">
	<h4>
		<span class="glyphicon glyphicon-ok"></span> {{ Session::get('benefit-created') }}
		<a href="{{ route('downloads.show') }}" class='pull-right'>
			Ver mis descargas <span class='glyphicon glyphicon-save'></span>
		</a>
	</h4>
</div>
@endif

<!-- error -->
@if( $errors->count() )
	<div class="bs-callout bs-callout-error">
		<h4><span class="glyphicon glyphicon-remove"></span> Se encontraron errores al procesar el formulario.</h4>
		<p id="contact-form-message">{{ $errors->first() }}</p>
	</div>
@endif