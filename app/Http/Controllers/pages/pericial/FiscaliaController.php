<?php

namespace App\Http\Controllers\pages\pericial;

use App\Models\fiscalia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FiscaliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fiscalias = Fiscalia::with('createdByUser')->orderBy('id', 'DESC')->paginate(10);

        return view('content.pages.pericial.fiscalia', ['fiscalias' => $fiscalias]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.pericial.fiscalia-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fiscalia = new fiscalia();
        $fiscalia->created_by = Auth::id();
        $fiscalia->modified_by = Auth::id();
        $fiscalia->fiscalia = $request-> fiscalia;
        $fiscalia->observaciones = $request-> observaciones;  
        $fiscalia->save();
        return redirect()->route('fiscalias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoHecho  $tipoHecho
     * @return \Illuminate\Http\Response
     */
    public function show($fiscalia)
    {
        $tipo = fiscalia::find($fiscalia);
        return view ('content.pages.pericial.fiscalia-show', ['fiscalia'=>$tipo]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoHecho  $tipoHecho
     * @return \Illuminate\Http\Response
     */
    public function edit(fiscalia $fiscalia)
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
         $tipo = fiscalia::find($request->fiscalia_id);
         $tipo->modified_by = Auth::id();
         $tipo->fiscalia = $request-> fiscalia;
         $tipo->observaciones = $request-> observaciones;
         $tipo->save();
         return redirect()->route('fiscalias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoHecho  $tipoHecho
     * @return \Illuminate\Http\Response
     */
    public function destroy(fiscalia $tipoHecho)
    {
        //
    }
}
