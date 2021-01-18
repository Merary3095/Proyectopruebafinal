@if(Auth::user()->rol == 'cliente')

@if($producto->conse != 1)
<div class="form-group {{ $errors->has('Nombre') ? 'has-error' : ''}}">
    <label for="Nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="Nombre" type="text" id="Nombre" value="{{ isset($producto->Nombre) ? $producto->Nombre : ''}}" >
    {!! $errors->first('Nombre', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Descripcion') ? 'has-error' : ''}}">
    <label for="Descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <input class="form-control" name="Descripcion" type="text" id="Descripcion" value="{{ isset($producto->Descripcion) ? $producto->Descripcion : ''}}" >
    {!! $errors->first('Descripcion', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('Precio') ? 'has-error' : ''}}">
    <label for="Precio" class="control-label">{{ 'Precio' }}</label>
    <input class="form-control" name="Precio" type="number" id="Precio" value="{{ isset($producto->Precio) ? $producto->Precio : ''}}" >
    {!! $errors->first('Precio', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group ">
    <label for="categoria_id" class="control-label">{{ 'Categoria' }}</label>
    <select class="form-control" name="categoria_id"  id="categoria_id">
            <option value="1">Anime</option>
            <option value="2" selected>Manga</option>
            <option value="3">Peluches</option>
    </select>

</div>


<div class="form-group {{ $errors->has('Imagen') ? 'has-error' : ''}}">
    <label for="Imagen" class="control-label">{{ 'Imagen' }}</label>
    <br>
    <br>
    @if(isset($producto->Imagen))
    <img src="{{ asset('storage').'/'.$producto->Imagen}}" class="img-thumbnail img-fluid" alt="" width="200">


    @endif
    <input class="form-control" name="Imagen" type="file" id="Imagen" value="{{ isset($producto->Imagen) ? $producto->Imagen : ''}}" >
    {!! $errors->first('Imagen', '<p class="help-block">:message</p>') !!}
</div>
<br>
<br>
@endif
@endif
@if(Auth::user()->rol == 'encargado')

<div class="form-group">
    <label for="conse" class="control-label">{{ 'Estado' }}</label>
    <select class="form-control" name="conse"  id="conse">
            <option value="1">Consignar</option>
            <option value="" selected>No Consignar</option>

    </select>
</div>

<div class="form-group ">
    <label for="porque" class="control-label">{{ 'Razon' }}</label>
    <input class="form-control" name="porque" type="text" id="porque" value="" >
</div>
@endif

@if($producto->conse != 1)
<div class="form-group">
    <input class="btn btn-success" type="submit" value="{{ $formMode === 'Editar' ? 'Actualizar' : 'Crear' }}">
</div>
@endif