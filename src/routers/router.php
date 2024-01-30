<?php
// List of routes
$router->map('GET', '/', 'defaultController#home');

$router->map('GET', '/login', 'loginController#login');
$router->map('POST', '/login', 'loginController#validate');
$router->map('GET', '/logout', 'loginController#logout');
