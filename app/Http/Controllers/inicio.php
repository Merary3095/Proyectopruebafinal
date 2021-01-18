<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class inicio extends Controller
{
	public function tablero()
	{
		switch (Auth::user()->rol) {
			case 'supervisor':
			$usuarios = DB::table('users')->count();
			$clientes = DB::select('SELECT count(*) as cuantos from users where rol = "cliente"')[0]->cuantos;
			$empleados = DB::select('SELECT count(*) as cuantos from users where rol <> "cliente"')[0]->cuantos;
			$productos = DB::table('productos')->count();
			$conse = DB::select('SELECT count(*) as cuantos from productos where conse = 1')[0]->cuantos;
			$categorias = DB::table('categorias')->count();
			return view('supervisor.tablero',compact('usuarios','clientes','empleados','productos','conse','categorias'));
				break;

			default:
				# code...
				break;
		}
	}

	public function kardex()
	{

		$nombre = DB::select('SELECT name as cuantos from users where rol = "cliente"')[0]->cuantos;
		$ide = DB::select('SELECT id as cuantos from users where rol = "cliente"')[0]->cuantos;
		$registro = DB::select('SELECT created_at as cuantos from users where rol = "cliente"')[0]->cuantos;
		$produ = DB::select('SELECT count(*) as cuantos from productos where cliente_id = 2')[0]->cuantos;
	    return view('supervisor.kardex',compact('nombre','registro','produ'));
	}
}
