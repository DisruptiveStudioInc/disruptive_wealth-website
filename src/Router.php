<?php

namespace App;

class Router
{
  private array $routes = [];
  private string $currentLanguage;
  private array $availableLanguages;
  private string $defaultLanguage;

  public function __construct(array $languages)
  {
    $this->availableLanguages = $languages['available'];
    $this->defaultLanguage = $languages['default'];
  }

  public function get(string $path, string $controller, string $method): void
  {
    $this->addRoute('GET', $path, $controller, $method);
  }

  public function post(string $path, string $controller, string $method): void
  {
    $this->addRoute('POST', $path, $controller, $method);
  }

  private function addRoute(string $httpMethod, string $path, string $controller, string $method): void
  {
    $this->routes[] = [
      'method' => $httpMethod,
      'path' => $path,
      'controller' => $controller,
      'action' => $method,
    ];
  }

  public function dispatch(Request $request): Response
  {
    $uri = $request->getUri();
    $httpMethod = $request->getMethod();

    // Detect language from URI
    $this->detectLanguage($uri);

    // Remove language prefix from URI for matching
    $cleanUri = $this->removeLanguagePrefix($uri);

    // Try to match route
    foreach ($this->routes as $route) {
      if ($route['method'] === $httpMethod && $this->matchPath($route['path'], $cleanUri)) {
        return $this->callController($route['controller'], $route['action'], $request);
      }
    }

    // No route matched - 404
    return $this->callController('App\\Controllers\\ErrorController', 'notFound', $request);
  }

  private function detectLanguage(string $uri): void
  {
    // Check if URI starts with language code
    foreach ($this->availableLanguages as $lang) {
      if ($lang !== $this->defaultLanguage && str_starts_with($uri, "/$lang")) {
        $this->currentLanguage = $lang;
        return;
      }
    }

    $this->currentLanguage = $this->defaultLanguage;
  }

  private function removeLanguagePrefix(string $uri): string
  {
    if ($this->currentLanguage !== $this->defaultLanguage) {
      $prefix = "/{$this->currentLanguage}";
      if (str_starts_with($uri, $prefix)) {
        $uri = substr($uri, strlen($prefix));
        return $uri ?: '/';
      }
    }
    return $uri;
  }

  private function matchPath(string $routePath, string $uri): bool
  {
    // Exact match
    if ($routePath === $uri) {
      return true;
    }

    // Pattern match with parameters (e.g., /service/{slug})
    $pattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $routePath);
    $pattern = "#^$pattern$#";

    return (bool) preg_match($pattern, $uri);
  }

  private function callController(string $controller, string $method, Request $request): Response
  {
    if (!class_exists($controller)) {
      return $this->errorResponse("Controller $controller not found");
    }

    $instance = new $controller();

    if (!method_exists($instance, $method)) {
      return $this->errorResponse("Method $method not found in $controller");
    }

    // Pass language to controller
    if (method_exists($instance, 'setLanguage')) {
      $instance->setLanguage($this->currentLanguage);
    }

    return $instance->$method($request);
  }

  private function errorResponse(string $message): Response
  {
    $response = new Response();
    return $response->setStatusCode(500)->setContent($message);
  }

  public function getCurrentLanguage(): string
  {
    return $this->currentLanguage;
  }
}
