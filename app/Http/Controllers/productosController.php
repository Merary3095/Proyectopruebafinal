<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function all(request $request)
    {
        $productos = \DB::table('productos')
        ->select('productos.Nombre','productos.Descripcion','productos.Precio','productos.id')
        ->WHERE('conse','LIKE','1')
        ->orderBy('id','ASC')
        ->get();
        return response(json_encode($productos),200)->header('content-type','text/plain');
    }
    public function index(Request $request)
    {
        $perPage = 25;
        if(Auth::guest() || Auth::user()->rol == 'supervisor')
        {
            $productos = producto::latest()->paginate($perPage);
            return view('productos.index', compact('productos'));
        }
        $keyword = $request->get('search');
        $otro = $request->get('ide');

        if($otro != Auth::user()->id)
        {
        if (!empty($keyword)) {
            $productos = producto::where('Imagen', 'LIKE', "%$keyword%")
                ->orWhere('Nombre', 'LIKE', "%$keyword%")
                ->orWhere('Descripcion', 'LIKE', "%$keyword%")
                ->orWhere('Precio', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $productos = producto::latest()->paginate($perPage);
        }

        return view('productos.index', compact('productos'));
        }
        else
        {
            $productos = producto::where('cliente_id','like',"%$otro%")->paginate(5);
            return view('productos.index', compact('productos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
                if ($request->hasFile('Imagen')) {
            $requestData['Imagen'] = $request->file('Imagen')
                ->store('uploads', 'public');
        }

        $requestData = Arr::add($requestData,'cliente_id',Auth::user()->id);
        producto::create($requestData);

        return redirect('productos')->with('flash_message', 'producto added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        /*if($id == Auth::user()->id)
        {
        $keyword = $id;
        $productos = producto::where('cliente_id','like',"%$keyword%")->paginate(5);
        return view('productos.index', compact('productos'));
    }*/

        $producto = producto::findOrFail($id);
        if (Auth::check()) {
           $usuario = Auth::user()->id;
        $query="(
                    SELECT hora_p FROM preguntas JOIN users ON preguntas.quien_p = users.id
                    WHERE preguntas.producto_id = $id
                )";
        $conse = DB::select($query);
        $cons = count($conse);
        $query2="(
                    SELECT vendedor FROM compra JOIN users ON compra.cliente = users.id
                    WHERE compra.producto  = $id
                )";
        $compra = DB::select($query2);
        $comp = count($compra);
        $query3="(
                    SELECT vendedor FROM compra JOIN users ON compra.cliente = users.id
                    WHERE compra.producto = $id and compra.cliente = $usuario
                )";
        $comprado = DB::select($query3);
        $compra = count($comprado);
        return view('productos.show', compact('producto','cons','comp','compra'));
        }
        else
        {
             return view('productos.show', compact('producto'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $producto = producto::findOrFail($id);

        return view('productos.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();
                if ($request->hasFile('Imagen')) {

            $producto = producto::findOrFail($id);

            Storage::delete('public/'.$producto->Imagen);

            $requestData['Imagen'] = $request->file('Imagen')
                ->store('uploads', 'public');
        }

        $producto = producto::findOrFail($id);
        $producto->update($requestData);

    return redirect('productos')->with('flash_message', 'producto Actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        producto::destroy($id);

        return redirect('productos')->with('flash_message', 'producto deleted!');
    }
    public function consesionar(Request $request, $id)
    {

        $request_data = $request->all();
        $producto = producto::findOrFail($id);
        $producto->update($requestData);

        return redirect('productos')->with('flash_message', 'producto consecionado');
    }
}
