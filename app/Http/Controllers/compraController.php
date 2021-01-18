<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\compra;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class compraController extends Controller
{

	public function store(Request $request)
    {
        $requestData = $request->all();

        compra::create($requestData);

        return redirect('productos')->with('flash_message', 'producto added!');
    }
}
