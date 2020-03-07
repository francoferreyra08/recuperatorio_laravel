<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelicula;

class peliculaController extends Controller
{
public function Peliculas(){
  $peli = Pelicula::paginate(30);

  $var = compact("peli");

  return view("pelicula", $var);
}

public function buscar(Request $result){

  $validar = [
  "buscar" => 'required'

];
$msj = [
 'required' => "ingrese una pelicula a buscar"

];
$this->validate($result,$validar,$msj);

$pe = $result['buscar'];

  $peli = Pelicula::where("title","like","%$pe%")->get();
  $var = compact("peli");
  return view("pelicula", $var);
  }



  /*function buscarPelicula($id){
      $pelicula = [
        1 => "Toy Story",
        2 => "Buscando a Nemo",
        3 => "Avatar",
        4 => "Piratas del Caribe",
        5 => "Up",
        6 => "Mary and Max"
       ];
       for ($i=1; $i <=6 ; $i++) {
         if ($i == $id) {
           return $pelicula[$id];
         }
       }
    }

    function buscarPelicula($id){
      $pelicula = [
        1 => "Toy Story",
        2 => "Buscando a Nemo",
        3 => "Avatar",
        4 => "Piratas del Caribe",
        5 => "Up",
        6 => "Mary and Max"
       ];
       for ($i=1; $i <=7 ; $i++) {
         if ($i == $id) {
           return $pelicula[$i];
           exit;
         }
       }

       function buscarPeliculanombre($nombre){
         $pelicula = [
           1 => "Toy Story",
           2 => "Buscando a Nemo",
           3 => "Avatar",
           4 => "Piratas del Caribe",
           5 => "Up",
           6 => "Mary and Max"
          ];
          for ($i=1; $i <=7 ; $i++) {
            if ($pelicula[$id]== $nombre) {
            $msj = $nombre;
          }else{
            $msj = "no se encontro esta pelicula";

              return $msj;

    }
  }
}
*/





 public function insertar(Request $result){

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

}
