@extends('master')

@section('content')
<table>
  <tr>
    <th>Nombre</th>
    <th>Modo</th>
    <th>Descripción</th>
    <th>Opciones</th>
  </tr>
  @foreach($companies as $companie)
  <tr>
    <td><a href="{{$companie->url}}">{{$companie->name}}</a></td>
    <td>{{$companie->mode}}</td>
    <td>{{$companie->description}}</td>
    @if(in_array($_SESSION['name'], $admins) && isset($_SESSION['id']))
    <td><a href="{{$router->generate('delete', ['id' => $companie->id])}}">Eliminar</a>
      <a href="{{$router->generate('edit', ['id' => $companie->id])}}">Editar</a>
    </td>
    @endif
    @if(!in_array($_SESSION['name'], $admins) && isset($_SESSION['id']))
    <td><a href="{{$router->generate('choice_company', ['id' => $companie->id])}}">Elegir</a></td>
    @endif
  </tr>
  @endforeach
  @if(in_array($_SESSION['name'], $admins) && isset($_SESSION['id']))
  <a href="{{$router->generate('create')}}">Añadir nueva empresa</a>
  @endif
</table>
@endsection