<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{ $pro->id }}">
	{!! Form::open(array('action' => array('ProyectoController@destroy', $pro->id), 'method' => 'delete')) !!}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Eliminar proyecto</h4>
				</div>
				<div class="modal-body">
					<p>¿Desea eliminar este proyecto?</p>
				</div>
				<div class="modal-footer">
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
</div>