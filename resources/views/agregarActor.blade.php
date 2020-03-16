@extends('plantillas.app')

@section('contenido')


  @if ($errors)
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
</ul>
@endif
<form class="" action="/agregarActor" method="post">
  @csrf

<div class="">
    <label for="first_name">Nombre</label><br>
    <input type="text" name="first_name">
</div>

<div class="">
    <label for="last_name">Apellido</label><br>
    <input type="text" name="last_name">
</div>

<div class="">
    <label for="rating">Rating</label><br>
    <input type="number" name="rating" >
</div>


<button type="submit" name="agregar">Agregar</button>
</form>
@endsection
