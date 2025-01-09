<?php

namespace App\Http\Controllers\pages;

use App\Models\Event;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class HomePage extends Controller
{
  public function index()
  {

   $user = Auth::user();
   $roleifexist = DB::table('model_has_roles')->where('model_id', $user->id)->first();

    if($roleifexist==null){
      DB::table('model_has_roles')->insert([
        'role_id' => 1,
        'model_type' => 'App\Models\User',
        'model_id' => $user->id
      ]);
    }
   
    $novedad_sin_efecto = Event::where('estadoCaso', 2)->count();
    $novedad_pendiente = Event::where('estadoCaso', 1)->count();
    $novedad_evacuada = Event::where('estadoCaso', 0)->count();
    $novedad_pedida = Event::where('estadoCaso', 3)->count();
    $novedad_archivada = Event::where('estadoCaso', 4)->count();
    return view('content.pages.pages-home', ['novedad_sin_efecto'=>$novedad_sin_efecto, 'novedad_pendiente'=>$novedad_pendiente, 'novedad_evacuada'=>$novedad_evacuada, 'novedad_pedida'=>$novedad_pedida, 'novedad_archivada'=>$novedad_archivada]);
  }
}
