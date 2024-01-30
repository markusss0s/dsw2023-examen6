@extends('master')

@section('content')
<form method="post" action="{{$router->generate('post',  [])}}">
  <p>Nombre: <input type="text" name="name"></p>
  <p>URL: <input type="text" name="url"></p>
  <p>
    <select name="mode" id="">
      <option value="online">online</option>
      <option value="presencial">presencial</option>
      <option value="semipresencial">semipresencial</option>
    </select>
  </p>
  <p>Descripcion: <input type="text" name="description"></p>
  <p><input type="submit" value="Crear"></p>
</form>
@endsection('content')