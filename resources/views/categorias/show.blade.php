@extends('layout.general')


@section('content')
    <div class="container">
        <div class="row">
 @include('layout.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Categoria {{ $categoria->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/categorias') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/categorias/' . $categoria->id . '/edit') }}" title="Edit Categoria"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('categorias' . '/' . $categoria->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Categoria" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $categoria->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $categoria->Nombre }} </td></tr><tr><th> Descripcion </th><td> {{ $categoria->Descripcion }} </td></tr><tr><th> Imagen </th><td> <img src="{{ asset('storage').'/'.$categoria->Imagen}}" class="img-thumbnail img-fluid" alt="" width="300"> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
