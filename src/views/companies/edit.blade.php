@extends('master')

@section('content')
<form method="post" action="{{$router->generate('update', ['id' => $companie->id])}}">
  <p>Nombre: <input type="text" name="name" value="{{$companie->name}}"></p>
  <p>URL: <input type="text" name="url" value="{{$companie->url}}"></p>
  <p>
    <select name="mode" id="">
      <option value="online">online</option>
      <option value="presencial">presencial</option>
      <option value="semipresencial">semipresencial</option>
    </select>
  </p>
  <p>Descripcion: <input type="text" name="description" value="{{$companie->description}}"></p>
  <p><input type="submit" value="Editar"></p>
</form>
@endsection('content')