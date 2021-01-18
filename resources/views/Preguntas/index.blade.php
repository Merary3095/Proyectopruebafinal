@extends('layout.general')


@section('content')
<div class="container">
        <div class="row">
 @include('layout.sidebar')
            <div class="col-md-9">
               <div class="table-responsive">
                    <div class="card-header">Preguntas</div>
                <table class="table table-light table-hover">
                <thead class="thead-light">
                <tr>
                <th># usuario</th>
                <th>Comentario</th>
                <th>Accion</th>
                </tr>
                </thead>
                <tbody>
    @forelse ($comentarios as $comentario)

            	<tr
            	@if($comentario->tipo=="PREGUNTA")
            		class="text-info"
            	@else
            		class="text-info"
            	@endif
            	>
            	<td>
            		{{$comentario->quien}}
            	</td>
                <td>
                    {{$comentario->cuestion}}
                </td>
            	<td>
                    @if(Auth::id() != $comentario->quien)
            		<a href="/preguntas/{{$comentario->id}}/edit" class="btn btn-success">Responder</a>
                    @endif

            	</td>
                <br>
                <br>
                <br>
            	</tr>
            @empty
            	<tr>
            		<td colspan="3">Sin comentarios registrados</td>
            	</tr>
            	@endforelse
            </div>
        </tbody>
        </table>

    </div>
</div>
</div>
@endsection

