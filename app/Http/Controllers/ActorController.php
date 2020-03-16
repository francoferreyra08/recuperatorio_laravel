<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;

class ActorController extends Controller
{
  public function mostraractor(){
    $actors=Actor::all();
    return view('actores',compact('actors'));
  }





  public function detalleactor($id){
    $actordetalle=Actor::find($id);

    return view('detalleactor',compact('actordetalle'));
  }




public function agregar(Request $datos){
$validacion =[
  'first_name'=>'required|min:4',
  'last_name'=>'required|min:4',
  'rating'=>'required|numeric',

];

$mesajes =[
'required' =>'El campo :atribute es obligatorio',
    'min' =>'El titulo debe tener como minimo 4 caracteres',
    'numeric' =>'El campo :atribute debe ser numeric'

];
      $this->validate($datos, $validacion);

      $nuevoActor = new Actor;
      $nuevoActor->first_name = $datos['first_name'];
      $nuevoActor->last_name = $datos['last_name'];
      $nuevoActor->rating = $datos['rating'];


      $nuevoActor->save();
        return redirect('/Actores');


}




}
