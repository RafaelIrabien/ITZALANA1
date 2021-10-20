<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juguete;

class JugueteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $juguetes= Juguete::all();
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
        $juguete=new Juguete();
  
        $juguete->nombre=$request->get('nombre');
        $juguete->descripcion=$request->get('descripcion');
        $juguete->precio_venta=$request->get('precio_venta');
        $juguete->cantidad=$request->get('cantidad');
       

        $juguete->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $juguete=Juguete::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $juguete=Juguete::find($id);

        $juguete->nombre=$request->get('nombre');
        $juguete->descripcion=$request->get('descripcion');
        $juguete->precio_venta=$request->get('precio_venta');
        $juguete->cantidad=$request->get('cantidad');
        

        $juguete->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $juguete=Juguete::find($id);
        $juguete->delete();
    }
}