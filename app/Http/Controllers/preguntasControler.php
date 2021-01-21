<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\pregunta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class preguntasControler extends Controller
{
	public function index()
	{
	if(is_null(Auth::user())) die;
	$id = Auth::id();
	$query="(
					SELECT preguntas.id, 'PREGUNTA' as tipo, pregunta as cuestion, quien_p as quien
                    FROM preguntas JOIN productos ON preguntas.producto_id = productos.id
                    WHERE preguntas.pregunta is not null
                )UNION(
                    SELECT preguntas.id, 'RESPUESTA' as tipo, respuesta as cuestion, quien_p as quien
                    FROM preguntas JOIN productos ON preguntas.producto_id = productos.id
                    WHERE productos.id = preguntas.producto_id and preguntas.respuesta is not null
                )";


	$comentarios = DB::select($query);
	return view('preguntas.index',compact('comentarios'));
	}

	public function create($id)
	{
		$producto = Producto::find($id);
		if(is_null($producto)) return "UPPS, Producto no econtrado";
		return view('Preguntas.create',compact('producto'));

	}
	public function store(Request $request)
	{
		$datos=request()->except('_token');

        Pregunta::insert($datos);
        return redirect('preguntas')->with('Mensaje','pregunta Agregado Con Exito');

	}

	public function edit($id)
    {
        //
        $producto= pregunta::findOrFail($id);

        return view('Preguntas.edit',compact('producto'));
    }
}
