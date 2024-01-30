<?php

namespace Dsw\Fct\Controllers;

use Dsw\Fct\Models\Choice;
use Dsw\Fct\Models\Companies;

require_once('../src/connection.php');
class companiesController
{
  public function index()
  {
    global $blade;
    global $router;
    $admins = ['Andrés', 'Eva', 'Angel' . 'Elena'];
    $companies = Companies::all();
    echo $blade->make('companies.list', compact('companies', 'router', 'admins'))->render();
  }
  public function create()
  {
    global $blade;
    global $router;
    echo $blade->make('companies.create', compact('router'))->render();
  }

  public function post()
  {
    $companie = new Companies();
    if (isset($_POST['name'], $_POST['url'], $_POST['mode'], $_POST['description'])) {
      $companie->name = $_POST['name'];
      $companie->url = $_POST['url'];
      $companie->mode = $_POST['mode'];
      $companie->description = $_POST['description'];
      $companie->save();
      header('Location: /companies');
    }
  }

  public function delete($params)
  {
    if (isset($params['id'])) {
      $companie = Companies::find($params['id']);
      if ($companie) {
        $companie->delete();
        header('Location: /companies');
      }
    }
  }

  public function edit($params)
  {
    global $blade;
    global $router;

    if (isset($params['id'])) {
      $companie = Companies::find($params['id']);
      if ($companie) {
        echo $blade->make('companies.edit', compact('router', 'companie'))->render();
      }
    } else {
      echo "as";
    }
  }

  public function update($params)
  {
    if (isset($params['id'])) {
      $company = Companies::find($params['id']);
      if ($company) {
        $company->name = $_POST['name'];
        $company->url = $_POST['url'];
        $company->mode = $_POST['mode'];
        $company->description = $_POST['description'];
        $company->save();
        header('Location: /companies');
      }
    }
  }

  public function choiceCompany($params)
  {
    if ($params['id']) {
      $company = Companies::find($params['id']);
      $choice = new Choice();
      $choice->user_id = $_SESSION['id'];
      $choice->company_id = $company->id;
      $choice->save();
      header('Location: /companies');
      // var_dump($choice);
    }
  }

  public function listChoice()
  {
    global $blade;
    global $router;
    $choice = Choice::where([
      ['user_id', $_SESSION['id']]
    ]);
    $companies = new Companies();
    echo $blade->make('companies.list', compact('choice', 'router', 'companies'))->render();
  }
}
