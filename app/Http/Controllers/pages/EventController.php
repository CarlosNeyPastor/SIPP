<?php

namespace App\Http\Controllers\pages;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\TemplateProcessor;

class EventController extends Controller
{
  public function index()
  {
    //Trae un array de todos los eventos en orden descendente
    $events = DB::table('events')->orderBy('id', 'DESC')->paginate(10);
    //$events = Event::orderBy('id', 'DESC')->get();
    //$events = Event::paginate(10);
    //Paso por variable los eventos a la vista
    return view('content.pages.casos', ['events'=>$events]);
  }

  //Funcion para crear un nuevo event
  public function create()
  {
    //Llama a la vista que tiene el formulario en la carpeta pages, casos-create    
    return view('content.pages.casos-create');
  }

  public function store(Request $request){
    
    //Almacena un nuevo caso en la BD
    //Primero creo una nueva instancia de evento
    $event = new Event();
    //Luego a ese evento le digo que en el campo fecha le paso la request fecha, y asi sucesivamente para todos los atrubutos
    //La parte luego del =, como por ejemplo "unidadPolicial", hace referencia al name en el formulario del blade. EN este caso ubicado en C:\xampp\htdocs\laravel-init-master\resources\views\content\pages\casos-create.blade.php
    $event->created_by = Auth::id();
    $event->modified_by = Auth::id();
    //$event->unidad_policial = DB::table('dependencia_policials')->get();
    $event->unidad_policial = $request-> unidadPolicial;
    $event->fiscalia = $request-> fiscalia;
    $event->tipo_hecho = $request-> tipoHecho;
    $event->solicitante = $request-> solicitante;
    $event->lugar = $request-> lugar;
    $event->ampliacion = $request-> ampliacion;
    $event->perito = $request-> intervinientes;

      if(empty($request->input('intervinientes'))) {
        $event->estadoCaso= 1;
      }
      else {
        $event->estadoCaso= 0;
      }

      $event->receptor = $request-> receptor;
      $event->observaciones = $request-> observaciones;
      $event->save();
      return redirect()->route('casos');
      //Luego de creado el caso se enva mail para notificar gracias a use App\Mail\ExampleMail;
      //Mail::to('mauro.diaz@estudiantes.utec.edu.uy')->send(new ExampleMail());

      //Luego de guardado que me redireccione a la ruta index, osea el listado de casos
     
  }

  //Función que permite ver un evento en particular
  public function show($event_id){
      $event = Event::find($event_id);
      //la variable 'event' es donde queda almacenado el dato y se lo pasa al blade. El blade show lo recibe a traves de $event
      return view ('content.pages.casos-show', ['event'=>$event]);   
  }

  public function update(Request $request) {
    
    $buttonValue = $request->input('button');
   
    if ($buttonValue === 'actualizar') {  
      $event = Event::find($request->event_id);
      $event->modified_by = Auth::id();
      $event->unidad_policial = $request-> unidadPolicial;
      $event->fiscalia = $request-> fiscalia;
      $event->tipo_hecho = $request-> tipoHecho;
      $event->solicitante = $request-> solicitante;
      $event->lugar = $request-> lugar;
      $event->ampliacion = $request-> ampliacion;
      $event->perito = $request-> intervinientes;
  
     if ($request->has('sinEfectoChekBox')) {
          $event->estadoCaso= 2;
        }
     else if(empty($request->input('intervinientes'))) {
          $event->estadoCaso= 1;
        }
     else {
          $event->estadoCaso= 0;
        }
      $event->fotografo = $request-> fotografo;
      $event->contactos = $request-> contactos;
      $event->hojas = $request-> hojas;
      $event->receptor = $request-> receptor;
      $event->observaciones = $request-> observaciones;
      $event->save();
      return redirect()->route('casos');
    }

    if ($buttonValue === 'descargar') {
      
      if($request->tipoHecho=="Accidente de tránsito") {
        $templatePath = base_path('resources/templates/accidente.docx');
        $templateProcessor = new TemplateProcessor($templatePath);
        
        $templateProcessor->setValues(
          [
            
            'caso' => $request->event_id,
            'seccional' => $request->unidadPolicial,
            'fiscalia' => $request->fiscalia,
            'sgsp' => $request->ampliacion,
            'lugar' => $request->lugar,
            'fecha' => date('d/m/Y'),
            'hora' => date('H:i'),
            'dia' => date('d'),
            'mes' => date('M'),
            'solicitante' => $request->solicitante,
            'perito' => $request->intervinientes,
          ]
      );
  
         if(($request->event_id)<10){
              
            $pathToSave = "000". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         } 
  
         else if ((($request->event_id)>9)||((($request->event_id)<100))){
            
            $pathToSave = "00". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else if ((($request->event_id)>100)||((($request->event_id)<1000))){
            
            $pathToSave = "0". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else {
            $pathToSave = $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
      }
      elseif ($request->tipoHecho=="Hurto"){
        $templatePath = base_path('resources/templates/hurto.docx');
        $templateProcessor = new TemplateProcessor($templatePath);
        
        $templateProcessor->setValues(
          [
            
            'caso' => $request->event_id,
            'seccional' => $request->unidadPolicial,
            'fiscalia' => $request->fiscalia,
            'sgsp' => $request->ampliacion,
            'lugar' => $request->lugar,
            'fecha' => date('d/m/Y'),
            'hora' => date('H:i'),
            'dia' => date('d'),
            'mes' => date('M'),
            'solicitante' => $request->solicitante,
            'perito' => $request->intervinientes,
          ]
      );
  
         if(($request->event_id)<10){
              
            $pathToSave = "000". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         } 
  
         else if ((($request->event_id)>9)||((($request->event_id)<100))){
            
            $pathToSave = "00". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else if ((($request->event_id)>100)||((($request->event_id)<1000))){
            
            $pathToSave = "0". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else {
            $pathToSave = $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
      }

      elseif ($request->tipoHecho=="Autopsia"){
        $templatePath = base_path('resources/templates/autopsia.docx');
        $templateProcessor = new TemplateProcessor($templatePath);
        
        $templateProcessor->setValues(
          [
            
            'caso' => $request->event_id,
            'seccional' => $request->unidadPolicial,
            'fiscalia' => $request->fiscalia,
            'sgsp' => $request->ampliacion,
            'fecha' => date('d/m/Y'),
            'hora' => date('H:i'),
            'dia' => date('d'),
            'mes' => date('M'),
            'perito' => $request->intervinientes,
          ]
      );
  
         if(($request->event_id)<10){
              
            $pathToSave = "000". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         } 
  
         else if ((($request->event_id)>9)||((($request->event_id)<100))){
            
            $pathToSave = "00". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else if ((($request->event_id)>100)||((($request->event_id)<1000))){
            
            $pathToSave = "0". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else {
            $pathToSave = $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
      }

      elseif ($request->tipoHecho=="Fallecido sin asistencia"){
        $templatePath = base_path('resources/templates/fallecido.docx');
        $templateProcessor = new TemplateProcessor($templatePath);
        
        $templateProcessor->setValues(
          [
            
            'caso' => $request->event_id,
            'seccional' => $request->unidadPolicial,
            'fiscalia' => $request->fiscalia,
            'sgsp' => $request->ampliacion,
            'lugar' => $request->lugar,
            'fecha' => date('d/m/Y'),
            'hora' => date('H:i'),
            'dia' => date('d'),
            'mes' => date('M'),
            'solicitante' => $request->solicitante,
            'perito' => $request->intervinientes,
          ]
      );
  
         if(($request->event_id)<10){
              
            $pathToSave = "000". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         } 
  
         else if ((($request->event_id)>9)||((($request->event_id)<100))){
            
            $pathToSave = "00". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else if ((($request->event_id)>100)||((($request->event_id)<1000))){
            
            $pathToSave = "0". $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
  
         else {
            $pathToSave = $request->event_id .".doc";
            $templateProcessor->saveAs($pathToSave);
            return response()->download($pathToSave)->deleteFileAfterSend();
         }
      }
    }

  }
   //Función que permite ver un evento en particular. En este caso es para planimetria y fotografia, no permite editar o eliminr campos
   public function showNoEdit($event_id){
    $event = Event::find($event_id);
    //la variable 'event' es donde queda almacenado el dato y se lo pasa al blade. El blade show lo recibe a traves de $event
    return view ('content.pages.casos-showNoEdit', ['event'=>$event]);   
}

public function search(Request $request)
{
    $busqueda = $request->busqueda;
    $fechaInicio = $request->fechaInicio; // Asegúrate de recibir la fecha de inicio desde la solicitud
    $fechaFin = $request->fechaFin; // Asegúrate de recibir la fecha de fin desde la solicitud

    $events = Event::where('id', 'LIKE', $busqueda)
        ->orWhere('tipo_hecho', 'LIKE', $busqueda)
        ->orWhere('unidad_policial', 'LIKE', $busqueda)
        ->orWhere('lugar', 'LIKE', '%' . $busqueda . '%')
        ->whereBetween('created_at', [$fechaInicio, $fechaFin]) // Filtra por rango de fechas
        ->orderBy('id', 'DESC')
        ->paginate(500);

    return view('content.pages.casos', ['events' => $events]);
}

  public function searchByPendiente()
  {
    $busqueda = 1;
    $events = Event::where('estadoCaso', 'LIKE',$busqueda)
        ->orderBy('id', 'DESC')->paginate(10);      
    return view('content.pages.casos', ['events'=>$events]);
  }

  public function searchByEvacuate()
  {
    $busqueda = 0;
    $events = Event::where('estadoCaso', 'LIKE',$busqueda)
        ->orderBy('id', 'DESC')->paginate(10);      
    return view('content.pages.casos', ['events'=>$events]);
  }

  public function searchBySinEffect()
  {
    $busqueda = 2;
    $events = Event::where('estadoCaso', 'LIKE',$busqueda)
        ->orderBy('id', 'DESC')->paginate(10);      
    return view('content.pages.casos', ['events'=>$events]);
  }

  public function searchByPedida()
  {
    $busqueda = 3;
    $events = Event::where('estadoCaso', 'LIKE',$busqueda)
        ->orderBy('id', 'DESC')->paginate(10);      
    return view('content.pages.casos', ['events'=>$events]);
  }

  public function solicitar_archivar(Request $request) {
    $buttonValue = $request->input('button');
    if ($buttonValue === 'solicitar') {  
      $event = Event::find($request->event_id);
      $event->modified_by = Auth::id();
      $event->estadoCaso = 3;
      $event->save();
      return redirect()->route('casos');
    }
    else if ($buttonValue === 'archivar') {  
      $event = Event::find($request->event_id);
      $event->modified_by = Auth::id();
      $event->estadoCaso = 4;
      $event->save();
      return redirect()->route('casos');
    }
  }
}
