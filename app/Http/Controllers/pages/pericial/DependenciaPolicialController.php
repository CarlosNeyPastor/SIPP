<?php

namespace App\Http\Controllers\pages\pericial;

use App\Models\DependenciaPolicial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DependenciaPolicialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $unidad_policial = DependenciaPolicial::with('createdByUserDependencia')->orderBy('id', 'DESC')->paginate(10);
         //$events = Event::orderBy('id', 'DESC')->get();
         //$events = Event::paginate(10);
         //Paso por variable los eventos a la vista
         return view('content.pages.pericial.unidadPolicial', ['dependencia_policials'=>$unidad_policial]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.pericial.unidadPolicial-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unidad_policial = new DependenciaPolicial();
        $unidad_policial->created_by = Auth::id();
        $unidad_policial->modified_by = Auth::id();
        $unidad_policial->unidad_policial = $request-> unidad_policial;
        $unidad_policial->observaciones = $request-> observaciones;  
        $unidad_policial->save();
        return redirect()->route('unidadespoliciales');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DependenciaPolicial  $dependenciaPolicial
     * @return \Illuminate\Http\Response
     */
    public function show($unidad)
    {
        $unidad_policial = DependenciaPolicial::find($unidad);
        return view ('content.pages.pericial.unidadPolicial-show', ['unidad_policial'=>$unidad_policial]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DependenciaPolicial  $dependenciaPolicial
     * @return \Illuminate\Http\Response
     */
    public function edit(DependenciaPolicial $dependenciaPolicial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DependenciaPolicial  $dependenciaPolicial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DependenciaPolicial $dependenciaPolicial)
    {
        $unidad_policial = DependenciaPolicial::find($request->unidad_policial_id);
        $unidad_policial->modified_by = Auth::id();
        $unidad_policial->unidad_policial = $request-> unidad_policial;
        $unidad_policial->observaciones = $request-> observaciones;
        $unidad_policial->save();
        return redirect()->route('unidadespoliciales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DependenciaPolicial  $dependenciaPolicial
     * @return \Illuminate\Http\Response
     */
    public function destroy(DependenciaPolicial $dependenciaPolicial)
    {
        //
    }
}
