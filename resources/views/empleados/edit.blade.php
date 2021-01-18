@extends('layout.general')

@section('content')
<div class="container">
        <div class="row">
            @canany(['supervisor','cliente'])
 @include('layout.sidebar')
@endcanany
<div class="col-md-9">

<form action="{{ url('/empleados/'.$empleado->id) }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PATCH') }}

	@include('empleados.form',['Modo'=>'editar'])

</form>
</div>
</div>

</div>
@endsection