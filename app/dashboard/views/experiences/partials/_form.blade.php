<div class="row">

    <div class="col-md-8 text-center">

    {{ Form::text('title', null, ['class' => 'form-control input-lg', 'placeholder' => 'Titulo de la Experiencia'] ) }}


        <label for="content" class="lead pull-left textarea-title">Contenido</label>
    <div class="clearfix"></div>
    {{ Form::textarea('content', null, ['class' => 'form-control wysiwyg', 'rows' => 12] ) }}


    <label for="excerpt" class="lead pull-left textarea-title">Extracto</label>
    <div class="clearfix"></div>
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 6] ) }}


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


        <!-- Imagen Destacada -->
        <div class="panel panel-default">

            <div class="panel-heading">
                <h3 class="panel-title">Imagen Destacada</h3>
            </div>

            <div class="panel-body">
                {{ Form::file('featured_image', null, ['class' => 'form-control']) }}
            </div><!-- panel-body -->

        </div><!-- panel -->


    </div><!-- col-md-4 -->

</div><!-- row -->