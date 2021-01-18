@extends('layout.general')


@section('content')
<div class="container">
        <div class="row">

 @include('layout.sidebar')
            <div class="col-md-9">
                <form action="/preguntas" method="post" enctype="multipart/form-data">
                    @csrf


                    <input type="hidden" name="producto_id" value="{{$producto->producto_id}}">
                    <input type="hidden" name="quien_p" value="{{Auth::user()->id}}">
                    <div class="form-group">
                        <label>respuesta:</label>
                        <textarea name="respuesta" class="form-control" rows="2"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Preguntar">
                </form>
        </div>

    </div>
</div>
@endsection
