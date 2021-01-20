@extends('layout.general')


@section('content')
<div class="container">
        <div class="row">


            @include('layout.sidebar')


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Productos</div>
                    <div class="card-body">
                        @can('cliente')
                        <a href="{{ url('/productos/create') }}" class="btn btn-success btn-sm" title="Add New producto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir Producto
                        </a>
                        @endcan

                        <form method="GET" action="{{ url('/productos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                               @canany(['cliente','supervisor','encargado'])
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                                @endcanany
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-light table-hover">
                                <thead class="thead-light">
                                    <tr>

                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($productos as $item)
                                    <tr>

                                        <td>
                                            <img src="{{ asset('storage').'/'.$item->Imagen}}" class="img-thumbnail img-fluid" alt="" width="150">
                                        </td>
                                        <td>{{ $item->Nombre }}</td>
                                        <td>{{ $item->Descripcion }}</td>
                                        <td>{{ $item->Precio }}</td>
                                        <td>
                                            <div class="btn-group">
                                            <a href="{{ url('/productos/' . $item->id) }}" title="View producto"><button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true" ></i> Mostrar</button></a>
                                            @can('cliente')
                                            @if(Auth::id() == $item->cliente_id && $item->conse != 2)
                                            <a href="{{ url('/productos/' . $item->id . '/edit') }}" title="Edit producto"><button class="btn btn-warning "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            @endif
                                            @endcan

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $productos->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        <form action="POST" action="productos/all" id="form1">
                            @csrf
                            <input type="hidden" name="id" value="1">
                        </form>
@can('encargado')
                        <table class="table table-light table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>
                                            Productos Aceptados
                                        </th>
                                    </tr>
                                    <tr>

                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                </tbody>
                            </table>




                        <script>
                            $(document).ready(function(){
                                $.ajax({
                                        url:'productos/all',
                                        method:'POST',
                                        data:$("#form1").serialize()
                                }).done(function(res){

                                    var arreglo = JSON.parse(res);
                                    console.log(arreglo);
                                    for(var x=0;x<arreglo.length;x++)
                                    {
                                        $ide = arreglo[x].id;

                                        var todo='<tr><td>'+arreglo[x].Nombre+'</td>';
                                        todo+='<td>'+arreglo[x].Descripcion+'</td>';
                                        todo+='<td>'+arreglo[x].Precio+'</td>';
                                        todo+='<td>'+'<a href="/productos/'+arreglo[x].id+'" title="View producto"><button class="btn btn-info">'+'Mostrar'+'</button></a>'+'</td>';
                                        todo+='<td></td></tr>';
                                        console.log(todo);

                                        $('#tbody').append(todo);
                                    }
                                });
                            });
                        </script>
                        @endcan
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
    </div>
@endsection
