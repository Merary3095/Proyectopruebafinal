@extends('layout.general')


@section('content')
<div class="container">
        <div class="row">

 @include('layout.sidebar')
            <div class="col-md-9">
                <form action="/preguntas" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">Imagen:</div>
                        <div class="col bg-light"><img src="{{ asset('storage').'/'.$producto->Imagen}}" alt="" class="img-thumnail"></div>
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>

                    <div class="row">
                        <div class="col">Precio:</div>
                        <div class="col bg-light">${{$producto->Precio}}</div>
                        <div class="col"></div>
                        <div class="col"></div>
                    </div>

                    <input type="hidden" name="producto_id" value="{{$producto->id}}">
                    <input type="hidden" name="quien_p" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label>Pregunta:</label>
                        <textarea name="pregunta" class="form-control" rows="2"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Preguntar">
                </form>
        </div>

    </div>
</div>
@endsection
