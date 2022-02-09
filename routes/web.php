<?php

// Route::get('/', function () { if (auth::user()) { return view ('plantilla');} else { return view('auth.login');}});

Auth::routes();

Route::get('/logout', function (){ Auth::logout(); return redirect('/login');});

Route::middleware(['auth'])->group(function () {
  Route::get('/', function(){ return view('plantilla');});
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/pickeo' , 'pedidosController@pickeo');
  Route::get('/salidas' , 'pedidosController@salidas');
  Route::get('/plantilla', function() {return view('plantilla');});
  Route::post('/eti', 'etiquetasController@imprimir');
  Route::get('/eticrear', 'etiquetasController@create');
  Route::get('/cia', function (){return view('compania');});
  Route::get('/remitos/{id}', 'remitosController@index');
  Route::get('/remitosdetalle/{id}', 'remitosdetalleController@index');
  Route::get('/exito', function (){return view('exito');});
  Route::post('/remitosimprimir', 'remitosController@imprimir');
  Route::post('/remitosrotulo', 'remitosController@rotulo');
  Route::get('/ordenes', function (){return view('elegirarticulos');});
  Route::get('/articulo', 'planificacionController@show');
  Route::get('/devoluciones' , 'pedidosController@devoluciones');



});


Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/deposito' , 'pedidosController@index');
  Route::get('/productos' , 'productosController@index');
  });
