@extends('layout.general')
@section('content')
<div class="container">
        <div class="row">
            @canany(['supervisor','cliente'])
 @include('layout.sidebar')
@endcanany
<div class="col-md-9">
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
	    @foreach($errors->all() as $error)
	    <li>{{ $error }}</li>
	    @endforeach
	</ul>
</div>
@endif


<form action="{{url('/empleados')}}" class="form-horizontal" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	@include('empleados.form',['Modo'=>'crear'])

</form>
</div>
</div>
</div>
@endsection