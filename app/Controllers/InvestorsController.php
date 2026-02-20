<?php

namespace App\Controllers;

use App\Request;
use App\Response;

class InvestorsController extends BaseController
{
  public function index(Request $request): Response
  {
    // Load page content
    $pageContent = $this->loadPageContent('investors');

    return $this->view('investors', [
      'content' => $pageContent,
      'hasSnapScroll' => true,
      'hasTextTexture' => true,
      'metaDescription' => $pageContent['seoDescription'] ?? null
    ]);
  }
}
