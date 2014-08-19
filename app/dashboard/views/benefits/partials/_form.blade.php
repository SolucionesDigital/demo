<div class="row">

    <div class="col-md-8 text-center">

    {{ Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Titulo del Beneficio'] ) }}


    {{ Form::text('subtitle', null, ['class' => 'form-control', 'placeholder' => 'Subtitulo del Beneficio'] ) }}


    <label for="content" class="lead pull-left textarea-title">Descripción del Beneficio</label>
    <div class="clearfix"></div>
    {{ Form::textarea('content', null, ['class' => 'form-control wysiwyg', 'rows' => 12] ) }}


    <label for="legal" class="lead pull-left textarea-title">Legales</label>
    <div class="clearfix"></div>
    {{ Form::textarea('legal', null, ['class' => 'form-control', 'rows' => 8] ) }}


    </div><!-- col-md-8 -->

    <div class="col-md-4">

        <!-- Publicar -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Guardar</h3>
            </div>
            <div class="panel-body">
                {{ Form::submit('Guardar', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        </div>



        <!-- Categorias -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Categorias</h3>
            </div>

            <div class="panel-body">

                 <div class="category-conteiner">

                    @if ( isset($categories) )
                        <ul>
                        @foreach($categories as $category)
                            <li>
                                {{ Form::radio('category', $category->id, is_category_checked($category->id, $benefit), ['id' => $category->slug]) }}
                                <label for="{{ $category->slug }}">&nbsp;{{ $category->name }}</label>
                            </li>
                        @endforeach
                        </ul>
                    @endif
                </div><!-- category-conteiner -->
            </div><!-- panel-body -->

        </div><!-- panel -->



         <!-- Sitio Web -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Sitio Web</h3>
            </div>

            <div class="panel-body">
                {{ Form::text('url', null, ['class' => 'form-control']) }}
                <small>&nbsp; Ejemplo: <i>http://www.example.com</i></small>
            </div><!-- panel-body -->

        </div><!-- panel -->



        <!-- Vigencia -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Vigencia del Beneficio</h3>
            </div>

            <div class="panel-body">
                <!-- valid_from -->
                <label for="valid_from">Desde:</label>
                {{ Form::input('date', 'valid_from', null, ['class' => 'form-control']) }}

                <!-- valid_to -->
                <label for="valid_to">Hasta:</label>
                {{ Form::input('date', 'valid_to', null, ['class' => 'form-control']) }}
            </div><!-- panel-body -->

        </div><!-- panel -->



        <!-- Imagen Destacada -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Imagen Destacada</h3>
            </div>

            <div class="panel-body">
                <div class="image-container">
                    @if( isset($benefit) )
                        <img src="{{ asset($benefit->featured_image) }}" class="img-responsive">
					@endif
                </div>
                {{ Form::file('featured_image', null, ['class' => 'form-control']) }}
            </div><!-- panel-body -->

        </div><!-- panel -->


    </div><!-- col-md-4 -->

</div><!-- row -->