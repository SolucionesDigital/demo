	<div class="row search">
		<div class="col-sm-6">
            {{ Form::open(['method' => 'GET']) }}
                <div class="input-group">
                    {{ Form::input('seach', 'q', null, ['class' => 'form-control', 'placeholder' => 'Buscar']) }}
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button">
							<span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            {{ Form::close() }}
        </div>{{--col-sm-6--}}
		<div class="col-sm-6">
			<hr/>
		</div>
    </div>{{--search--}}