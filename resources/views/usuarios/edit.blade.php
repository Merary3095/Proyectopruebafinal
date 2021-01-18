@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-15">
                <div class="card">
                    <div class="card-header">Editar usuario </div>
                    <div class="card-body">
                        <a href="{{ url('/infousuario') }}" title="Back"><button class="btn btn-danger btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <br />
                        <br />

                       @if ($errors->any())
                           <ul class="alert alert-danger">
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       @endif

                        <form method="POST" action=" {{ route('infousuario.update',['infousuario'=>Auth::user()->id]) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('usuarios.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
