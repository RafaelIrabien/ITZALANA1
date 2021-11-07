<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return $productos= Producto::all();
        //return $productos = Producto::where('categoria','=','Abarrote')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto=new Producto();
  
        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->cantidad=$request->get('cantidad');
        $producto->categoria='Abarrote';

        $producto->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $producto=Producto::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $producto=Producto::find($id);

        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->cantidad=$request->get('cantidad');
        $producto->categoria='Abarrote';
       

        $producto->edit();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto=Producto::find($id);

        $producto->nombre=$request->get('nombre');
        $producto->descripcion=$request->get('descripcion');
        $producto->precio_venta=$request->get('precio_venta');
        $producto->cantidad=$request->get('cantidad');
        $producto->categoria='Abarrote';
       

        $producto->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::find($id);
        $producto->delete();
    }


    public function obtenerAbarrotes()   
    {
        return $abarrotes = Producto::where('categoria','=','Abarrote')->get();
    }


    public function obtenerJuguetes()
    {
        return $juguetes = Producto::where('categoria','=','Juguete')->get();
    }


    public function obtenerFarmacias()
    {
        return $farmacias = Producto::where('categoria','=','Farmacia')->get();
    }

    public function obtenerPapelerias()
    {
        return $papelerias = Producto::where('Categoria','=','Papeleria')->get();
    }
}


