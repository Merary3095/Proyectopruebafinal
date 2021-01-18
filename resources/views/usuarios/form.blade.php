<div class="form-group ">
    <label for="Nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset(Auth::user()->name) ? Auth::user()->name : ''}}" >
</div>

<div class="form-group ">
    <label for="Email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : ''}}" >

</div>

<div class="form-group ">
    <label for="Telefono" class="control-label">{{ 'Telefono' }}</label>
    <input class="form-control" name="telefono" type="text" id="telefono" value="{{ isset(Auth::user()->telefono) ? Auth::user()->telefono : ''}}" >

</div>

<div class="form-group ">
    <label for="Telefono" class="control-label">{{ 'Contraseña' }}</label>
    <input class="form-control" name="password" type="text" id="password" value="" >

</div>




<div class="form-group">
    <input class="btn btn-success" type="submit" value="{{ 'Editar'}}">
</div>