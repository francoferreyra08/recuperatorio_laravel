<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActoresController extends Controller
{
  ublic function Directory(){
      $actores = Actor::all();
      $vac = compact('actores');

    return view('actores', $vac);
  }
  public function Detalle(){
      $actor = Actor::find();
      $vac = compact('actor');

    return view('actores', $vac);
  }
}
