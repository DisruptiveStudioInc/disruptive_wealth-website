<?php

namespace App\Controllers;

use App\Request;
use App\Response;

class GovernanceController extends BaseController
{
  public function index(Request $request): Response
  {
    // Load page content
    $pageContent = $this->loadPageContent('governance');

    return $this->view('governance', [
      'content' => $pageContent,
      'hasSnapScroll' => true,
      'hasTextTexture' => true,
      'metaDescription' => $pageContent['seoDescription'] ?? null
    ]);
  }
}
