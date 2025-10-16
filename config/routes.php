<?php

use App\Router;

return function(Router $router) {
  // Home
  $router->get('/', 'App\\Controllers\\HomeController', 'index');

  // Contact
  $router->get('/contacto', 'App\\Controllers\\ContactController', 'index');
  $router->get('/contact', 'App\\Controllers\\ContactController', 'index');
  $router->post('/contacto', 'App\\Controllers\\ContactController', 'submit');
  $router->post('/contact', 'App\\Controllers\\ContactController', 'submit');

  // Services - dynamic route with slug
  $router->get('/{slug}', 'App\\Controllers\\ServiceController', 'show');
};
