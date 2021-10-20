<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Papeleria;

class PapeleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $papelerias= Papeleria::all();
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
        $papeleria=new Papeleria();
  
        $papeleria->nombre=$request->get('nombre');
        $papeleria->descripcion=$request->get('descripcion');
        $papeleria->precio_venta=$request->get('precio_venta');
        $papeleria->cantidad=$request->get('cantidad');
       

        $papeleria->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $papeleria=Papeleria::find($id);
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
        $papeleria=Papeleria::find($id);

        $papeleria->nombre=$request->get('nombre');
        $papeleria->descripcion=$request->get('descripcion');
        $papeleria->precio_venta=$request->get('precio_venta');
        $papeleria->cantidad=$request->get('cantidad');
        

        $papeleria->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $papeleria=Papeleria::find($id);
        $papeleria->delete();
    }
}