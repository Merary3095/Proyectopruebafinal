<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/', '\App\Http\Controllers\productosController');
Route::get('login', function() {
    return view('autenticar');
    //buscara el archivo 'autenticar.php' o 'autenticar.blade.php' dentro de resoureces/views
});
Route::get('tablero', 'inicio@tablero');
Route::get('kardex', 'inicio@kardex');
Route::get('revisar', function() {
    return view('encargado.revisar');
});
Route::resource('empleados','\App\Http\Controllers\EmpleadosController');
Route::get('totalizar', function() {
    return view('contador.totalizar');
});
Route::get('cuenta', function() {
    return view('cliente.cuenta');
});
Route::post('/comprar', 'compraController@store');

Route::get('listar_por_categoria/{categoria_id}','BuscarControler@listar_por');
Route::resource('categorias', 'CategoriasController');
Route::resource('productos', 'productosController');
Route::post('productos/all', 'productosController@all');

Auth::routes(['reset'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::resourse('Preguntas','\App\Http\Controllers\preguntaControler', [ 'except' => [ 'create' ]]);

Route::get('preguntar/{producto}','preguntasControler@create');

Route::resource('preguntas','\App\Http\Controllers\preguntasControler');

Route::get('enviar', ['as' => 'enviar', function () {

    $data = ['link' => 'http://styde.net'];

    \Mail::send('emails.notificacion', $data, function ($message) {

        $message->from('avalon@outlook.com', 'Avalon');

        $message->to('Vendedor@example.com')->subject('Notificación');

    });

    return "Se envío el email";
}]);

Route::post('/register/validar','VerificacionController@verificar')->name('register.verificar');