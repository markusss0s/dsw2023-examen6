<?php
// List of routes
$router->map('GET', '/', 'defaultController#home');

$router->map('GET', '/login', 'loginController#login');
$router->map('POST', '/login', 'loginController#validate');
$router->map('GET', '/logout', 'loginController#logout');

$router->map('GET', '/companies', 'companiesController#index', 'companies');
$router->map('GET', '/create', 'companiesController#create', 'create');
$router->map('POST', '/company', 'companiesController#post', 'post');
$router->map('GET', '/company/[i:id]', 'companiesController#delete', 'delete');
$router->map('GET', '/edit/company/[i:id]', 'companiesController#edit', 'edit');
$router->map('POST', '/company/[i:id]', 'companiesController#update', 'update');
$router->map('GET', '/choiceCompany/[i:id]', 'companiesController#choiceCompany', 'choice_company');
$router->map('GET', '/listChoice', 'companiesController#listChoice', 'list_choice');
