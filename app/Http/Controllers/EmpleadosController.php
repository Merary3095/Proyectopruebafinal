<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados']=User::paginate();
        return view('empleados.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
        'name' => 'required|string|max:100',
        'email' => 'required', 'string', 'max:255',
        'rol' => 'string', 'max:255',
        'telefono' => 'required', 'string', 'max:255',
        'password' => 'required', 'string', 'min:8', 'confirmed',
       /* 'Foto' => 'required|max:10000|mimes:jpeg,png,jpg'*/
        ];
        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEmpleado=request()->except('_token');

       $datosEmpleado['password'] = Hash::make($datosEmpleado['password']);
        User::insert($datosEmpleado);
        return redirect('empleados')->with('Mensaje','Empleado Agregado Con Exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado= User::findOrFail($id);
        $query="(
                    SELECT nombre FROM productos JOIN users ON productos.cliente_id = users.id
                    WHERE cliente_id = $id
                )";
        $conse = DB::select($query);
        $cons = count($conse);
        $query2="(
                    SELECT producto FROM compra JOIN users ON compra.cliente = users.id
                    WHERE cliente = $id
                )";
        $compra = DB::select($query2);
        $comp = count($compra);
        return view('empleados.edit',compact('empleado','cons','comp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campos=[
        'name' => 'required|string|max:100',
        'email' => 'required', 'string', 'max:255',
        'rol' => 'string', 'max:255',
        'telefono' => 'required', 'string', 'max:255',
        'password' => 'string', 'min:8', 'confirmed',
        ];


        $Mensaje=["required"=>'El :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        $datosEmpleado=request()->except(['_token','_method']);

        if(Auth::user()->rol =='encargado' || Auth::user()->rol =='supervisor'){
            $datosEmpleado['password'] = Hash::make($datosEmpleado['password']);

        User::where('id','=',$id)->update($datosEmpleado);
        return redirect('empleados')->with('Mensaje','Datos Modificados Con Exito');
        }
        else{
            User::where('id','=',$id)->update($datosEmpleado);
        return redirect('empleados')->with('Mensaje','Datos Modificados Con Exito');

    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        User::destroy($id);

        //
        return redirect('empleados')->with('Mensaje','Empleado Eliminado');
    }
}
