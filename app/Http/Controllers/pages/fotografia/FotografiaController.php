<?php

namespace App\Http\Controllers\pages\fotografia;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FotografiaController extends Controller
{
  public function index()
  {
    $events = DB::table('events')->orderBy('id', 'DESC')->paginate(10);
    return view('content.pages.fotografia.intFotografia', ['events'=>$events]);
  }

  public function show($event_id){
    $event = Event::find($event_id);
    //la variable 'event' es donde queda almacenado el dato y se lo pasa al blade. El blade show lo recibe a traves de $event
    return view ('content.pages.fotografia.fotografia-casos-show', ['event'=>$event]);   
  }

  public function update(Request $request) {
    
    $buttonValue = $request->input('button');
   
    if ($buttonValue === 'actualizar') {  
      $event = Event::find($request->event_id);
      $event->modified_by = Auth::id();
      $event->unidad_policial = $request-> unidadPolicial;
      $event->fiscalia = $request-> fiscalia;
      $event->tipo_hecho = $request-> tipoHecho;
      
      $event->lugar = $request-> lugar;
      $event->ampliacion = $request-> ampliacion;
      $event->perito = $request-> intervinientes;
      
      $event->fotografo = $request-> fotografo;
      $event->contactos = $request-> contactos;
      $event->hojas = $request-> hojas;
      
      $event->observaciones = $request-> observaciones;

      $event->save();
      return redirect()->route('fotografia');
    }
  }

  public function searchFot(Request $request)
{
    $busqueda = $request->busqueda;
    $events = Event::where('id', 'like', $busqueda)
        ->orderBy('id', 'DESC')
        ->paginate(500);

    return view('content.pages.fotografia.intFotografia', ['events' => $events]);
}

public function searchByPendienteFot()
{
  $busqueda = 1;
  $events = Event::where('estadoCaso', 'LIKE',$busqueda)
      ->orderBy('id', 'DESC')->paginate(10);      
  return view('content.pages.fotografia.intFotografia', ['events'=>$events]);
}

}
