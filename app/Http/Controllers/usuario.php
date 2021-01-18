<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\User as User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class usuario extends Controller
{

    public function index(Request $request)
    {

        return view('usuarios.index');
    }



    public function edit($id)
    {


        return view('usuarios.edit');
    }

    public function update($id, Request $request)
    {
        $variable = $request->all();
        $usuario = User::find($id);
        $usuario->name = $variable['name'];
        $usuario->email = $variable['email'];
        $usuario->telefono = $variable['telefono'];
        if($variable['password'] != null || $variable['password'] == ""){

        }
        else{
           $usuario->password = Hash::make($variable['password']);
        }

        $usuario->save();
        return redirect('infousuario');
    }
}

