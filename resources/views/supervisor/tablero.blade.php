@extends('layout.general')


@section('content')
<div class="container">
        <div class="row">

 @include('layout.sidebar')
            <div class="col-md-9">
                <div class="card" >
                    <div class="card-header">Tablero</div>
                    <div class="card-body">
					<div class="card-columns">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Usuarios Registrados</h5>
								<p class="card-text">Clientes: {{$clientes ?? ''}}</p>
								<p class="card-text">Usuaros: {{$empleados}}</p>
							</div>
						</div>


							<div class="card">
							<div class="card-body">
								<h5 class="card-title">Productos</h5>
								<p class="card-text">Registrados: {{$productos}}</p>
								<p class="card-text">Concesionados: {{$conse}}</p>
							</div>
						</div>


						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Categorias</h5>
								<p class="card-text">Registradas: {{$categorias}}</p>

							</div>
						</div>

					</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection