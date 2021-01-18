
<div class="col-md-3">
    <div class="card">
        <div class="card-header">
<img src="{{ asset('storage').'/'.'uploads'.'/'.'anonimo.png'}}" alt="150" class="img-thumbnail img-fluid" alt="" width="300">
        </div>
        @if(Auth::check())
        <p>{{Auth::user()->name}}</p>
        <p>({{Auth::user()->rol}})</p>
        @else
        <br>
        <p>Hola: Visitante</p>
        @endif
    </div>
    <div class="card">
        <div class="card-header">
            Barra de navegacion
        </div>

        <div class="card-body">
            <ul>
                @can('supervisor')
            <li><a href="/tablero"><em class="icon-reorder">&nbsp;</em> Tablero</a></li>
            @endcan
            <li class="active"><a href="/categorias"><em class="icon-sitemap">&nbsp;</em> Categorias</a></li>

            <li><a href="{{ url('/productos') }}"><em class="icon-shopping-cart">&nbsp;</em> Productos</a></li>
            @can('cliente')
            <li><a href="charts.html"><em class="icon-exchange">&nbsp;</em> Ventas</a></li>
            @endcan
            @can('cliente')
            <li><a href="elements.html"><em class="icon-shopping-cart">&nbsp;</em> Mis compras</a></li>
            @endcan
            @can('supervisor')
            <li><a href="{{ url('/empleados') }}"><em class="icon-male">&nbsp;</em>Registrar Empleado</a></li>
            @endcan
            @can('cliente')
            <li>
                <form method="GET" action="{{ url('/productos') }}" role="ide">
                            <div class="input-group">
                                <input type="text" class="form-control" name="ide" value="{{Auth::user()->id}}" hidden="true">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit" >
                                        Mis productos
                                    </button>
                                </span>
                            </div>
                        </form>
            </li>
            @endcan
 </ul>
        </div>
    </div>
</div>
