<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmacia;

class FarmaciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $farmacias= Farmacia::all();
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
        $farmacia=new Farmacia();
  
        $farmacia->nombre=$request->get('nombre');
        $farmacia->descripcion=$request->get('descripcion');
        $farmacia->precio_venta=$request->get('precio_venta');
        $farmacia->cantidad=$request->get('cantidad');
       

        $farmacia->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $farmacia=Farmacia::find($id);
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
        $farmacia=Farmacia::find($id);

        $farmacia->nombre=$request->get('nombre');
        $farmacia->descripcion=$request->get('descripcion');
        $farmacia->precio_venta=$request->get('precio_venta');
        $farmacia->cantidad=$request->get('cantidad');
        

        $farmacia->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmacia=Farmacia::find($id);
        $farmacia->delete();
    }
}