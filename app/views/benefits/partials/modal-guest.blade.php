<div id="beneficio-guest" class="modal fade">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Iniciar Sesión</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-5">
						<img src="{{ asset('images/demo-logo.png') }}" alt="IMSS" width="100%" height="auto">
					</div><!-- col-xs-5 -->
					<div class="col-xs-7">
						<p>Por favor, inicia sesión con tu dirección de correo electrónico y tu contraseña.</p>
						<p>¿Perdiste tu nombre de usuario o tu contraseña? <a href="/login">Recupérala aquí.</a></p>
						<p>¿Dudas, Comentarios o Sugerencias? <a href="/">Contáctanos.</a> </p>
					</div><!-- col-xs-7 -->

				</div><!-- row -->
			</div><!-- modal-body -->

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar <span class="glyphicon glyphicon-remove"></span></button>
				<a href="{{ route('session.create') }}" class="btn btn-primary">Ingresar <span class="glyphicon glyphicon-log-in"></span></a>
			</div>

		</div><!-- modal-content -->

	</div><!-- modal-dialog -->

</div><!-- modal -->