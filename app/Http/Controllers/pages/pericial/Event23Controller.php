<?php

namespace App\Http\Controllers\pages\pericial;

use App\Models\Event23;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Event23Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events23 = DB::table('event23s')->orderBy('id', 'DESC')->paginate(10);
        return view('content.pages.pericial.casos23', ['event23s'=>$events23]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event23  $event23
     * @return \Illuminate\Http\Response
     */
    public function showNoEdit($event_id){
        $event23 = Event23::find($event_id);
        return view ('content.pages.pericial.casos23-showNoEdit', ['event'=>$event23]);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event23  $event23
     * @return \Illuminate\Http\Response
     */
    public function edit(Event23 $event23)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event23  $event23
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event23 $event23)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event23  $event23
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event23 $event23)
    {
        //
    }

    public function search(Request $request)
    {
    $busqueda = $request->busqueda;
    $fechaInicio = $request->fechaInicio; 
    $fechaFin = $request->fechaFin; 

    $events23 = Event23::where('id', 'LIKE', $busqueda)
        ->orWhere('tipo_hecho', 'LIKE', $busqueda)
        ->orWhere('unidad_policial', 'LIKE', 'Seccional_' . $busqueda . '%')
        ->orWhere('lugar', 'LIKE', '%' . $busqueda . '%')
        ->whereBetween('created_at', [$fechaInicio, $fechaFin])
        ->orderBy('id', 'DESC')
        ->paginate(2000);

    return view('content.pages.pericial.casos23', ['event23s' => $events23]);
    }
}
