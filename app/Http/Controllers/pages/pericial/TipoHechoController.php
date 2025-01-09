<?php

namespace App\Http\Controllers\pages\pericial;

use App\Models\TipoHecho;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoHechoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Trae un array de todos los eventos en orden descendente
        //El 'createdByUsrHecho' hace ref a la funcion del modelo
         $tipo_hechos = TipoHecho::with('createdByUsrHecho')->orderBy('id', 'DESC')->paginate(10);
        //$events = Event::orderBy('id', 'DESC')->get();
        //$events = Event::paginate(10);
        //Paso por variable los eventos a la vista
        return view('content.pages.pericial.tiposDeHecho', ['tipo_hechos'=>$tipo_hechos]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.pericial.tiposDeHecho-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipoHecho = new TipoHecho();
        $tipoHecho->created_by = Auth::id();
        $tipoHecho->modified_by = Auth::id();
        $tipoHecho->tipo_hecho = $request-> tipo_hecho;
        $tipoHecho->observaciones = $request-> observaciones;  
        $tipoHecho->save();
        return redirect()->route('tiposdehecho');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoHecho  $tipoHecho
     * @return \Illuminate\Http\Response
     */
    public function show($tipoHecho)
    {
        $tipo = TipoHecho::find($tipoHecho);
        return view ('content.pages.pericial.tiposDeHecho-show', ['tipo_hecho'=>$tipo]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoHecho  $tipoHecho
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoHecho $tipoHecho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoHecho  $tipoHecho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $tipo = TipoHecho::find($request->tipo_hecho_id);
         $tipo->modified_by = Auth::id();
         $tipo->tipo_hecho = $request-> tipo_hecho;
         $tipo->observaciones = $request-> observaciones;
         $tipo->save();
         return redirect()->route('tiposdehecho');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoHecho  $tipoHecho
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoHecho $tipoHecho)
    {
        //
    }
}
