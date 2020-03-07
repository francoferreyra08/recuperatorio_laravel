<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>mi primera pagina con blade</title>
    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>
    <h1>
   Pelicula <a href="/agregarpeli">Agregar</a>
    </h1>

    <form class="" action="/buscarpeli" method="post">
      {{ csrf_field() }}
      <input type="text" name="buscar" id="titulo">
      <button type="submit" name="button">Buscar</button>

    </form>
    <ol>
         @foreach ($peli as $pe)
                <li>{{ $pe["title"] }}</li>

         @endforeach;

   </ol>






  </body>
</html>
