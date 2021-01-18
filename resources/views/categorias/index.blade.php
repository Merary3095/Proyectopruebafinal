@extends('layout.general')


@section('content')
<div class="container">
        <div class="row">

 @include('layout.sidebar')
            <div class="col-md-9">
                <div class="card" >
                    <div class="card-header">Categorias</div>
                    <div class="card-body">
                       @can('supervisor')
                        <a href="{{ url('/categorias/create') }}" class="btn btn-success btn-sm" title="Add New Categoria">
                            <i class="fa fa-plus" aria-hidden="true"></i> Añadir Categoria
                        </a>
                        @endcan

                        <form method="GET" action="{{ url('/categorias') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th><th>Descripcion</th><th>Imagen</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categorias as $item)
                                    <tr>

                                        <td>{{ $item->Nombre }}</td><td>{{ $item->Descripcion }}</td>
                                        <td><img src="{{ asset('storage').'/'.$item->Imagen}}" class="img-thumbnail img-fluid" alt="" width="300"></td>
                                        <td>
                                            <div class="btn-group">
                                            <a href="{{ url('/categorias/' . $item->id) }}" title="View Categoria"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Mostrar</button></a>
                                            @can('supervisor')
                                             <a href="{{ url('/categorias/' . $item->id . '/edit') }}" title="Edit Categoria"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                            @endcan
                                            @can('supervisor')
                                            <form method="POST" action="{{ url('/categorias' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Categoria" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </div>
                                            </div>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $categorias->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
