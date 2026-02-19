<?php

namespace App\Controllers;

use App\Request;
use App\Response;

class HomeController extends BaseController
{
  public function index(Request $request): Response
  {
    // Load page content
    $pageContent = $this->loadPageContent('home');

    return $this->view('home', [
      'content' => $pageContent,
      'hasSnapScroll' => true,
      'hasTextTexture' => true,
      'metaDescription' => $pageContent['seoDescription'] ?? null
    ]);
  }
}
