@extends('layout.general')


@section('content')
<div class="container">
        <div class="row">

 @include('layout.sidebar')
            <div class="col-md-9">
                <div class="card" >
                    <div class="card-header">Kardex</div>
                    <div class="card-body">
                    	<div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th><th>Registro</th><th>productos</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{ $nombre}}</td>
                                        <td>{{ $registro }}</td>
                                        <td>{{ $produ }}</td>

                                    </tr>


                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection