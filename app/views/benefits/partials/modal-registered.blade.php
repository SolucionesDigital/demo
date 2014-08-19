<div id="modal-benefit" class="modal fade">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="modal-benefit-title">
					<!-- titulo del benefit -->
				</h4>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-xs-5" id="modal-benefit-image">
						<!-- imagen del benefit -->
					</div>
					<div class="col-xs-7" id="modal-benefit-content">
						<!-- contenido del benefit -->
					</div>
				</div>
			</div>

			<div class="modal-footer">
				{{ Form::open(['route' => 'benefits.store']) }}
					<input type="hidden" id="modal-benefit-id" name="benefit_id" value="">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar <span class="glyphicon glyphicon-remove"></span></button>
					<!-- <button type="submit" class="btn btn-primary" id="print-benefit">Imprimir <span class="glyphicon glyphicon-print"></span></button> -->
					<input type="submit" class="btn btn-primary" id="save-benefit" value="Guardar" />
				{{ Form::close() }}
			</div>

		</div><!-- modal-content -->

	</div><!-- modal-dialog -->

</div><!-- modal -->