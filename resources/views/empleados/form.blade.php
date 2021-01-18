

	<div class="form-group">
	<label for="Nombre" class="control-label">{{'Nombre'}}</label>
	<input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':'' }} "  name="name" id="name"
	value="{{ isset($empleado->name)?$empleado->name:old('Nombre') }}">

	{!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label for="email" class="control-label">{{'Email'}}</label>
	<input type="text" class="form-control {{$errors->has('email')?'is-invalid':'' }} "  name="email" id="email"
	value="{{ isset($empleado->email)?$empleado->email:old('email') }}">

	{!! $errors->first('email','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label for="rol" class="control-label">{{'Rol'}}</label>
	<input type="text" class="form-control {{$errors->has('rol')?'is-invalid':'' }} "  name="rol" id="rol"
	value="{{ isset($empleado->rol)?$empleado->rol:old('rol') }}">

	{!! $errors->first('rol','<div class="invalid-feedback">:message</div>') !!}
	</div>

	<div class="form-group">
	<label for="telefono" class="control-label">{{'Telefono'}}</label>
	<input type="text" class="form-control {{$errors->has('telefono')?'is-invalid':'' }} "  name="telefono" id="telefono"
	value="{{ isset($empleado->telefono)?$empleado->telefono:old('telefono') }}">

	{!! $errors->first('telefono','<div class="invalid-feedback">:message</div>') !!}
	</div>

	@canany(['encargado','supervisor'])
	@if($Modo == 'editar')
	<div class="form-group">
	<label for="contraseña" class="control-label">{{'Contraseña'}}</label>
	<input type="text" class="form-control {{$errors->has('password')?'is-invalid':'' }} "  name="password" id="password">

	{!! $errors->first('password','<div class="invalid-feedback">:message</div>') !!}
	</div>
	@endif
	@endcanany

	@can(['supervisor'])
	@if($Modo == 'crear')
	<div class="form-group">
	<label for="contraseña" class="control-label">{{'Contraseña'}}</label>
	<input type="text" class="form-control {{$errors->has('password')?'is-invalid':'' }} "  name="password" id="password">

	{!! $errors->first('password','<div class="invalid-feedback">:message</div>') !!}
	</div>
	@endif
	@endcan
	<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar' : 'Modificar' }}">
	<a class="btn btn-danger" href="{{ url('empleados') }}">Cancelar</a>


	@can('supervisor')

	<div class="card">
							<div class="card-body">
								<h5 class="card-title">Informacion del usuario</h5>
								<p class="card-text">fecha y hora de registro: {{$empleado->created_at}}</p>
								<p class="card-text">total de productos en venta: {{$cons}}</p>
								<p class="card-text">numero de compras: {{$comp}}</p>

							</div>
						</div>
	@endcan