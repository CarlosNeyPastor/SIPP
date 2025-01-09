<?php

namespace App\Http\Controllers\pages\planimetria;

use App\Models\GenericoPlanimetria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GenericoPlanimetriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function home()
    {
      $trabajos_evacuados = GenericoPlanimetria::where('estado', 2)->count();
      $trabajos_sinEfecto = GenericoPlanimetria::where('estado', 1)->count();
      $trabajos_pendiente = GenericoPlanimetria::where('estado', 0)->count();

      $trabajos_planos = GenericoPlanimetria::where('tipo_trabajo', 'Planos')->count();
      $trabajos_multimedias = GenericoPlanimetria::where('tipo_trabajo', 'Multimedia')->count();
      $trabajos_joyas = GenericoPlanimetria::where('tipo_trabajo', 'Joyas')->count();
      $trabajos_lesiones = GenericoPlanimetria::where('tipo_trabajo', 'Formulario de lesiones')->count();
      $trabajos_facial = GenericoPlanimetria::where('tipo_trabajo', 'Facial')->count();
      $trabajos_relevamiento = GenericoPlanimetria::where('tipo_trabajo', 'Relevamiento')->count();
      $trabajos_otros = GenericoPlanimetria::where('tipo_trabajo', 'Otros')->count();
      return view('content.pages.planimetria.intervenciones-home', ['trabajos_evacuados'=>$trabajos_evacuados, 'trabajos_sinEfecto'=>$trabajos_sinEfecto, 'trabajos_pendiente'=> $trabajos_pendiente, 
      'trabajos_facial'=> $trabajos_facial, 'trabajos_planos'=>$trabajos_planos, 'trabajos_multimedias'=> $trabajos_multimedias, 'trabajos_joyas'=>$trabajos_joyas, 'trabajos_lesiones'=>$trabajos_lesiones, 'trabajos_relevamiento'=>$trabajos_relevamiento, 'trabajos_otros'=>$trabajos_otros]);
    }   

    public function index()
    {
        $eventPlanimetria = GenericoPlanimetria::with('createdByUserPlanimetria')->orderBy('id', 'DESC')->paginate(10);
        return view('content.pages.planimetria.intervenciones', ['eventPlanimetrias'=>$eventPlanimetria]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('content.pages.planimetria.intervenciones-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $eventPlanimetría = new GenericoPlanimetria();
    //La parte luego del =, como por ejemplo "unidadPolicial", hace referencia al name en el formulario del blade. EN este caso ubicado en C:\xampp\htdocs\laravel-init-master\resources\views\content\pages\casos-create.blade.php
        $eventPlanimetría->created_by = Auth::id();
        $eventPlanimetría->modified_by = Auth::id();
        $eventPlanimetría->sgsp = $request-> sgsp;
        $eventPlanimetría->unidad_policial = $request-> unidadPolicial;
        $eventPlanimetría->origen = $request-> origen;
        $eventPlanimetría->tipo_trabajo = $request-> tipoTrabajo;
        $eventPlanimetría->asunto = $request-> asunto;
        $eventPlanimetría->oficio = $request-> oficio;
        $eventPlanimetría->novedad = $request-> novedad;
        $eventPlanimetría->iue = $request-> iue;
        $eventPlanimetría->exp_electronico = $request-> expEle;
        $eventPlanimetría->fiscaliaInt = $request-> fiscalia;
        $eventPlanimetría->tipo_hecho = $request-> tipoHecho;
        $eventPlanimetría->lugar = $request-> lugar;
        $eventPlanimetría->dibujante = $request-> dibujante;
        $eventPlanimetría->receptor = $request-> receptor;
        $eventPlanimetría->salida = $request-> fechaSalida;
        $eventPlanimetría->observaciones = $request-> observaciones;
        $eventPlanimetría->caracteristica = $request-> caracteristica;
        $eventPlanimetría->visto_Bueno_planimetria = $request-> VBplanimetria;
        $eventPlanimetría->visto_Bueno_pericial = $request-> VBpericial;

        if ($request->filled('dibujante')) {
            $eventPlanimetría->estado= 1;
          }
       else {
        $eventPlanimetría->estado= 0;
          }

        $eventPlanimetría->save();
      return redirect()->route('planimetria');
    }
    /**
     * Display the specified resource.
     * @param  \App\Models\GenericoPlanimetria  $genericoPlanimetria
     * @return \Illuminate\Http\Response
     */
    public function show($planimteria_id)
    {
        $eventPlanimetría = GenericoPlanimetria::find($planimteria_id);
        return view ('content.pages.planimetria.intervenciones-show', ['eventPlanimetria'=>$eventPlanimetría]);   
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Models\GenericoPlanimetria  $genericoPlanimetria
     * @return \Illuminate\Http\Response
     */
    public function edit(GenericoPlanimetria $genericoPlanimetria)
    {
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GenericoPlanimetria  $genericoPlanimetria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

        $buttonValue = $request->input('buttonUpdate');
   
    if ($buttonValue === 'actualizarPlanimetria') { 
        $eventPlanimetría = GenericoPlanimetria::find($request-> eventPlanimetria_id);
        $eventPlanimetría->modified_by = Auth::id();
        //$eventPlanimetría->sgsp = $request-> sgsp;
        $eventPlanimetría->unidad_policial = $request-> unidadPolicial;
        $eventPlanimetría->origen = $request-> origen;
        $eventPlanimetría->tipo_trabajo = $request-> tipoTrabajo;
        $eventPlanimetría->asunto = $request-> asunto;
        $eventPlanimetría->oficio = $request-> oficio;
        $eventPlanimetría->novedad = $request-> novedad;
        $eventPlanimetría->iue = $request-> iue;
        $eventPlanimetría->exp_electronico = $request-> expEle;
        $eventPlanimetría->fiscaliaInt = $request-> fiscalia;
        $eventPlanimetría->tipo_hecho = $request-> tipoHecho;
        $eventPlanimetría->lugar = $request-> lugar;
        $eventPlanimetría->dibujante = $request-> dibujante;
        $eventPlanimetría->receptor = $request-> receptor;
        $eventPlanimetría->salida = $request-> fechaSalida;
        $eventPlanimetría->observaciones = $request-> observaciones;
        $eventPlanimetría->caracteristica = $request-> caracteristica;

        if ($request->filled('dibujante')) {
          $eventPlanimetría->estado= 1;
        }
        
        if(!empty($request->input('fechaSalida'))) {
            $eventPlanimetría->estado= 2;
          }
          
        $eventPlanimetría->visto_Bueno_planimetria = $request-> VBplanimetria;
        $eventPlanimetría->visto_Bueno_pericial = $request-> VBpericial;
        $eventPlanimetría->save();        
          return redirect()->route('planimetria');
        }
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GenericoPlanimetria  $genericoPlanimetria
     * @return \Illuminate\Http\Response
     */
    public function destroy(GenericoPlanimetria $genericoPlanimetria)
    {
    }

    public function searchSGSP(Request $request)
    {
    $busqueda = $request->busqueda;
    $eventPlanimetria = GenericoPlanimetria::where('sgsp', 'LIKE','%'.$busqueda.'%')
        ->orWhere('novedad', 'LIKE', $busqueda)
        ->orderBy('id', 'DESC')->paginate(500);  
        return view('content.pages.planimetria.intervenciones', ['eventPlanimetrias'=>$eventPlanimetria]); 
    }

    public function searchByTrabajoPendiente()
    {
      $busqueda = 0;
      $eventPlanimetria = GenericoPlanimetria::where('estado', 'LIKE',$busqueda)
          ->orderBy('id', 'DESC')->paginate(10);      
      return view('content.pages.planimetria.intervenciones', ['eventPlanimetrias'=>$eventPlanimetria]);
    }
  
    public function searchByTrabajoEvacuate()
    {
      $busqueda = 2;
      $eventPlanimetria = GenericoPlanimetria::where('estado', 'LIKE',$busqueda)
          ->orderBy('id', 'DESC')->paginate(10);      
      return view('content.pages.planimetria.intervenciones', ['eventPlanimetrias'=>$eventPlanimetria]);
    }
  
    public function searchByTrabajoSinEffect()
    {
      $busqueda = 1;
      $eventPlanimetria = GenericoPlanimetria::where('estado', 'LIKE',$busqueda)
          ->orderBy('id', 'DESC')->paginate(10);      
      return view('content.pages.planimetria.intervenciones', ['eventPlanimetrias'=>$eventPlanimetria]);
    }
}
