@if( Session::has('success') )
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="fa fa-info-circle"></i>  {{ Session::get('success') }}
            </div>
        </div>
    </div><!-- /.row -->
@endif


@if( Session::has('benefits.destroy') )
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Form::open(['route' => ['admin.beneficios.restore', Session::get('benefits.destroy')]]) }}
                    <i class="fa fa-warning"></i> El beneficio se movio a la papelera correctamente
					{{ Form::submit('Deshacer', ['class' => 'btn-link'])  }}
				{{ Form::close() }}
            </div>
        </div>
    </div><!-- /.row -->
@endif


@if( Session::has('experiences.destroy') )
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Form::open(['route' => ['admin.experiences.restore', Session::get('experiences.destroy')]]) }}
                    <i class="fa fa-warning"></i> La experiencia se movio a la papelera correctamente
					{{ Form::submit('Deshacer', ['class' => 'btn-link'])  }}
				{{ Form::close() }}
            </div>
        </div>
    </div><!-- /.row -->
@endif



@if( Session::has('users.destroy') )
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Form::open(['route' => ['admin.usuarios.restore', Session::get('users.destroy')]]) }}
                    <i class="fa fa-warning"></i> El usuario se movio a la papelera correctamente
					{{ Form::submit('Deshacer', ['class' => 'btn-link'])  }}
				{{ Form::close() }}
            </div>
        </div>
    </div><!-- /.row -->
@endif



@if( Session::has('categories.destroy') )
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Form::open(['route' => ['admin.categorias.restore', Session::get('categories.destroy')]]) }}
                    <i class="fa fa-warning"></i> La categoria se movio a la papelera correctamente
					{{ Form::submit('Deshacer', ['class' => 'btn-link'])  }}?
				{{ Form::close() }}
            </div>
        </div>
    </div><!-- /.row -->
@endif


<!-- error -->
@if( $errors->count() )

    <div class="alert alert-danger">
        <span class="glyphicon glyphicon-remove"></span> Se encontraron errores al procesar el formulario.
        <p id="contact-form-message">{{ $errors->first() }}</p>
    </div>

@endif