<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actor</title>
  </head>
  <body>
    <h1>actores</h1>
    <ul>
  <!-- @foreach ($actores as $actor)
   <li>{{
     $actor->TraerNombre() }}</li>
   @endforeach
-->
<li>Actor: {{ $actor->first_name}}</li> 

    </ul>
  </body>
</html>
