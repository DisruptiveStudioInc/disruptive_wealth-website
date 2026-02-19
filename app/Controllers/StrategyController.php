<?php

namespace App\Controllers;

use App\Request;
use App\Response;

class StrategyController extends BaseController
{
  public function index(Request $request): Response
  {
    // Load page content
    $pageContent = $this->loadPageContent('strategy');

    return $this->view('strategy', [
      'content' => $pageContent,
      'hasSnapScroll' => true,
      'hasTextTexture' => true,
      'metaDescription' => $pageContent['seoDescription'] ?? null
    ]);
  }
}
