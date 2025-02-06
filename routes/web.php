<?php

use Illuminate\Support\Facades\Route;
use App\Models\Categoria;
use App\Models\Producto;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/productos',function(){
    return view('almacen.producto');
});


Route::get('/usuario',function(){
    $nombre = "Juan";
    return "hola {$nombre}";
});

Route::get('/noticia/{titulo}',function($titulo){
    return "Esta es la Noticia {$titulo}";
});

Route::group(['prefix'=>'admin'],function(){
    Route::get('noticia',function(){
        return "noticia";
    });
    Route::get('evento',function(){
        return "evento";
    });
    Route::get('lavoral',function(){
        return "lavoral"; 
    });
});

Route::get('database', function(){
    return env('DB_CONNECTION');
});

Route::get('time', function(){
    return env('APP_TIMEZONE');
});

Route::get('locales', function(){
    return config('app.locale');
});



Route::get('categorias', function(){
    $categorias = Categoria::all();
    return $categorias;
});

Route::get('productos', function(){
    // $producto = Producto::all();
    $producto = Producto::with('categoria')->get();
    return $producto;
});

