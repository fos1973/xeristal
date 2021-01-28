<?php
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

Route::get('/', function () {
    if (auth::user()) {
    return view ('plantilla');
  }
  else {
    return view('auth.login');
  }
});

Auth::routes();

Route::get('/logout', function (){ Auth::logout(); return redirect('/login');});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

  Route::get('/plantilla', function() {return view('plantilla');});
  Route::get('/deposito' , 'pedidosController@index');
  Route::post('/eti', 'etiquetasController@imprimir');
  Route::get('/eticrear', 'etiquetasController@create');
  Route::get('/cia', function (){return view('compania');});
  Route::get('/remitos/{id}', 'remitosController@index');
  Route::get('/remitosdetalle/{id}', 'remitosdetalleController@index');
  Route::post('/remitosimprimir', 'remitosController@imprimir');
  Route::get('/exito', function (){return view('exito');});
  });
