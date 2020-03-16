@extends('plantillas.app')


@section('contenido')


<h2>editar</h2>

@if ($errors)
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
@endif
<form  action="editarMovies" method="post">
  @csrf

  <div class="">
    <label for="title">Titulo</label><br>
    <input type="text" name="title" value="">
  </div>
  <div class="">
    <label for="awards">Premios</label><br>
    <input type="number" name="awards" value="">
  </div>
<div class="">
  <label for="rating">Rating</label><br>
  <input type="numbre" name="rating" value="">
</div>

<div class="">
  <label for="release_date">Fecha de Estreno</label><br>
  <input type="date" name="release_date" value="">
</div>

<div class="">
<label for="length">Duracion</label><br>
  <input type="number" name="length" value="">
</div>

<div class="">


   <label for="Generos">Generos</label>
  <select name="genre_id" id="genre_id">
  <option value="1">Comedia</option>
  <option value="2">Terror</option>
  <option value="3">Drama</option>
  <option value="4">Accion</option>
  <option value="5">Ciencia Ficcion</option>
  <option value="6">Suspenso</option>
  <option value="7">Animacion</option>
  <option value="8">Aventuras</option>
  <option value="9">Documental</option>
  <option value="10">Infantiles</option>
  <option value="11">Fantasia</option>
  <option value="12">Musical</option>

</select>
</div>
  <button type="submit" name="buttom">editar</button>
</form>



@endsection
