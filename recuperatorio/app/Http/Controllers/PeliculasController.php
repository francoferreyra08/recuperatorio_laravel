<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculasController extends Controller
{
  $result["fecha"] = $result["anio"]."-".$result["mes"]."-".$result["dia"];

  $valida = [
   'titulo' => "required|max:100",
   'rating' => "required|numeric|max:10",
   'premios' => "required|integer|min:0",
   'duracion' => "required|numeric|min:0",
   'fecha' => "date",
   'foto' => "file"
  ];


  $msj = [
    "required" => "el campo :attribute es requerido",
    "numeric" => "este campo :attribute solo puede contener número",
    "min" => "el valor :attribute debe ser mayor",
    "max"  => "el valor :attribute ingresado supera el permitido",
    "date" => "ingrese una fecha correcta",
    "file" => "Seleccione una imagen"
  ];

  $this->validate($result, $valida, $msj);

    //subir imagen
   $ruta = $result->file("foto")->store("public");
   $nombre = basename($ruta);

   //agregamos pelicula
  $peli = new Pelicula();

  $peli->title = $result["titulo"];
  $peli->rating = $result["rating"];
  $peli->awards = $result["premios"];
  $peli->length = $result["duracion"];
  $peli->release_date = $result["fecha"];
  $peli->foto = $nombre;

   $peli->save();

}
