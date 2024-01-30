<?php
namespace Dsw\Fct\Controllers;

class defaultController
{
  public function home() {
    global $blade;    
    global $router;
    echo $blade->make('home', compact('router'))->render();
  }
}