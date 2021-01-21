@extends('layout.general')

@section('content')
    <div class="container">
        <div class="row">

            @include('layout.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">producto {{ $producto->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/productos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>

                        @if(Auth::id() == $producto->cliente_id && $producto->conse != 2)
                        @can('cliente')
                        <a href="{{ url('/productos/' . $producto->id . '/edit') }}" title="Edit producto"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        @endcan
                        @endif


                        @can('encargado')
                        <a href="{{ url('/productos/' . $producto->id . '/edit') }}" title="Edit producto"><button class="btn btn-warning "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> cambiar estado</button></a>
                        @endcan

                        @if(Auth::id() == $producto->cliente_id)
                        @if(is_null($producto->conse) || $producto->conse == 0)
                        @can('cliente')
                        <form method="POST" action="{{ url('productos' . '/' . $producto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete producto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        @endcan
                        @endif
                        @endif
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $producto->id }}</td>
                                    </tr>
                                    <tr><th> Imagen </th><td> <img src="{{ asset('storage').'/'.$producto->Imagen}}" class="img-thumbnail img-fluid" alt="" width="300"> </td></tr>
                                    <tr>
                                        <th> Nombre </th>
                                        <td> {{ $producto->Nombre }} </td>
                                    </tr>
                                    <tr>
                                        <th> Descripcion </th>
                                        <td> {{ $producto->Descripcion }} </td>
                                    </tr>
                                    @can('supervisor')
                                     <tr>
                                        <th> Fecha y hora de registro </th>
                                        <td> {{ $producto->created_at }} </td>
                                    </tr>
                                     <tr>
                                        <th> numero de preguntas / respuestas </th>
                                        <td> {{ $cons }} </td>
                                    </tr>
                                     <tr>
                                        <th> veces comprado </th>
                                        <td> {{ $comp }} </td>
                                    </tr>
                                    @endcan
                                    @can('cliente')
                                    <tr>
                                        <th> veces comprado por usted</th>
                                        <td> {{ $compra }} </td>
                                    </tr>
                                    @endcan
                                     @if(Auth::check())
                                    @if($producto->cliente_id == Auth::user()->id)
                                    @endif
                                    @if($producto->conse == '1')
                                     <tr>
                                        <th> Estado </th>
                                        <td>
                                            Aceptado
                                        </td>
                                    </tr>

                                    @elseif($producto->conse == '0')
                                     <tr>
                                        <th> Estado </th>
                                        <td>
                                            rechazado
                                        </td>
                                    </tr>
                                     <tr>
                                        <th> Razón </th>
                                        <td> {{ $producto->porque }} </td>
                                    </tr>
                                    @elseif($producto->conse == '2')
                                    <tr>
                                        <th> Estado </th>
                                        <td>
                                            consecionado
                                        </td>
                                    </tr>
                                    @else
                                     <tr>
                                        <th> Estado </th>
                                        <td>

                                        </td>
                                    </tr>
                                     @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between aling-items-center">
        <div class="btn-group">
            @can('cliente')
            <form method="POST" action="{{ url('/comprar') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
            <input type="hidden" name="producto" value="{{$producto->id}}">
            <input type="hidden" name="cliente" value="{{Auth::user()->id}}">
            <input type="hidden" name="vendedor" value="{{$producto->cliente_id}}">
            <br>
            <br>
            <label for="calificacion" class="control-label">{{ 'Califica tu compra' }}</label>
            <br>
            <br>
            <select class="form-control" name="calificacion"  id="calificacion">
            <option value="1">Una estrella</option>
            <option value="2" selected>Dos estrella</option>
            <option value="3">Tres estrellas</option>
            <option value="4" selected>Cuatro estrellas</option>
            <option value="5">Cinco estrellas</option>
            </select>
            <br>
            <br>
            <button type="submit" class="btn btn-lg btn-outline-success" title="comprar producto" >
            Comprar</button>
            </form>
            @endcan
            @if(Gate::allows('preguntar',$producto))
            <a class="btn btn-lg btn-outline-success" href="/preguntar/{{$producto->id}}">Preguntar</a>
            @endif
        </div>
    </div>
@endsection
