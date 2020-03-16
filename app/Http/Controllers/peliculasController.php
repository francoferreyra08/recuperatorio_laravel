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

public function mostrarmovies(){
  $mostrarmovies =Movie::all();
  return view('movies',compact('mostrarmovies'));

}




  public function detallepelicula($id){
    $peliculadetalle=Movie::find($id);
    return view('detallepelicula',compact('peliculadetalle'));
  }

  public function seleccionarEditar($id){
    $seleccionarEditar = Movie::find($id);
    return view('/editarPeliculas',compact('seleccionarEditar'));
  }




  public function editar(Request $datos){
    $validacion =[
      'title'=>'required|min:4',
      'rating'=>'required|numeric',
      'awards'=>'required|numeric',
      'length'=>'required|numeric',
      'release_date'=>'required|date',
      'genre_id'=>'required|numeric',
    ];

  $mesajes =[
    'required' =>'El campo :atribute es obligatorio',
        'min' =>'El titulo debe tener como minimo 4 caracteres',
        'numeric' =>'El campo :atribute debe ser numeric',
        'date' =>'El campo :atribute debe ser feha',


      ];


      $this->validate($datos, $validacion);
    $editarMovies = Movie::find($datos->id);

    $editarMovies->title = $datos['title'];
    $editarMovies->rating = $datos['rating'];
    $editarMovies->awards = $datos['awards'];
    $editarMovies->length = $datos['length'];
    $editarMovies->release_date = $datos['release_date'];
    $editarMovies->genre_id = $datos['genre_id'];

    $editarMovies-> save();
    return redirect('/Peliculas');
  }

}
