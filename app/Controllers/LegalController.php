<?php

namespace App\Controllers;

use App\Request;
use App\Response;

class LegalController extends BaseController
{
  public function index(Request $request): Response
  {
    // Load page content
    $pageContent = $this->loadPageContent('legal-notice');

    return $this->view('legal', [
      'content' => $pageContent,
      'hasSnapScroll' => false,
      'hasTextTexture' => true,
      'metaDescription' => $pageContent['seoDescription'] ?? null
    ]);
  }
}
