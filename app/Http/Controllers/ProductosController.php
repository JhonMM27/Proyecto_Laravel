<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /*,compact(['registros','texto'])*
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $texto = $request->get('texto');

        $categorias = Categoria::select('id','nombre')->get();
        $registros = Producto::/*where('nombre','LIKE','%'.$texto.'%')->orWhere('id','LIKE','%'.$texto.'%')->*/orderBy('id','desc')->paginate(10);
        return view('producto.index',compact(['registros','texto','categorias']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::select('id','nombre')->get();
        return view('producto.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registro = new Producto();
        $registro->nombre = $request->input('nombre');
        $registro->categoria_id = $request->input('categoria-id');
        $registro->codigo = $request->input('codigo');
        $registro->descripcion = $request->input('descripcion');
        $registro->precio_venta = $request->input('precio');

        $registro->save();

        return redirect()->route('productos.index')->with('mensaje','Nuevo Registro '.$registro->nombre.' agerado con exito');


    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
