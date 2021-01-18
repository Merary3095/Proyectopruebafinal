@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Info del usuario</div>
                    <div class="card-body">


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th><th>email</th><th>telefono</th>
                                        <th>Contraseña</th>                                    </tr>
                                </thead>
                                <tbody>


                                    <tr>

                                        <td>{{ Auth::user()->name }}</td>
                                        <td>{{ Auth::user()->email }}</td>
                                        <td>{{ Auth::user()->telefono }}</td>
                                        <td>{{ Auth::user()->password }}</td>
                                        <td>

                                        </td>

                                    </tr>
                                    <a href="{{ url('/infousuario/' . Auth::user()->id . '/edit') }}" title="Edit usuario"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
