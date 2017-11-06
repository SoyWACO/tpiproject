{!! Form::open(array('url' => 'buscar/proyecto', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search')) !!}
	<div class="form-group">
		<div class="input-group">
			<input type="text" class="form-control" name="searchText", placeholder="Buscar proyecto", value="{{ $searchText }}"></input>
			<span class="input-group-btn">
				<button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
			</span>
		</div>
	</div>
{!! Form::close() !!}