<?php

namespace App\Models;

class Blog
{
  /**
   * Format post data for display
   *
   * @param array $post Raw post data from WordPress
   * @return array Formatted post data
   */
  public static function format(array $post): array
  {
    $currentSlug = $post['slug'] ?? '';
    $currentLang = Language::getCurrentLanguage();

    return [
      'id' => $post['id'] ?? '',
      'title' => $post['title'] ?? '',
      'slug' => $currentSlug,
      'excerpt' => self::cleanExcerpt($post['excerpt'] ?? ''),
      'content' => $post['content'] ?? '',
      'date' => self::formatDate($post['date'] ?? ''),
      'dateRaw' => $post['date'] ?? '',
      'modified' => self::formatDate($post['modified'] ?? ''),
      'featuredImage' => self::formatFeaturedImage($post['featuredImage'] ?? null),
      'categories' => self::formatTerms($post['categories']['nodes'] ?? []),
      'tags' => self::formatTerms($post['tags']['nodes'] ?? []),
      'seo' => self::formatSEO($post['seo'] ?? []),
      'translations' => self::formatTranslations($post['translations'] ?? [], $currentSlug, $currentLang),
      'url' => self::buildPostUrl($currentSlug, $currentLang),
    ];
  }

  /**
   * Format multiple posts
   *
   * @param array $posts Array of posts
   * @return array Formatted posts
   */
  public static function formatMultiple(array $posts): array
  {
    return array_map([self::class, 'format'], $posts);
  }

  /**
   * Clean excerpt HTML
   *
   * @param string $excerpt Raw excerpt
   * @return string Clean excerpt
   */
  private static function cleanExcerpt(string $excerpt): string
  {
    // Remove HTML tags
    $excerpt = strip_tags($excerpt);
    // Decode HTML entities
    $excerpt = html_entity_decode($excerpt, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    return trim($excerpt);
  }

  /**
   * Format date for display
   *
   * @param string $date ISO date string
   * @return string Formatted date
   */
  private static function formatDate(string $date): string
  {
    if (empty($date)) {
      return '';
    }

    $timestamp = strtotime($date);
    if ($timestamp === false) {
      return $date;
    }

    $lang = Language::getCurrentLanguage();

    if ($lang === 'es') {
      $months = [
        1 => 'enero', 2 => 'febrero', 3 => 'marzo', 4 => 'abril',
        5 => 'mayo', 6 => 'junio', 7 => 'julio', 8 => 'agosto',
        9 => 'septiembre', 10 => 'octubre', 11 => 'noviembre', 12 => 'diciembre'
      ];
      $day = date('d', $timestamp);
      $month = $months[(int)date('n', $timestamp)];
      $year = date('Y', $timestamp);
      return "{$day} de {$month} de {$year}";
    }

    return date('F d, Y', $timestamp);
  }

  /**
   * Format featured image data
   *
   * @param array|null $image Featured image data
   * @return array|null Formatted image data
   */
  private static function formatFeaturedImage(?array $image): ?array
  {
    if (empty($image) || !isset($image['node'])) {
      return null;
    }

    $node = $image['node'];

    return [
      'url' => $node['sourceUrl'] ?? '',
      'alt' => $node['altText'] ?? '',
      'caption' => $node['caption'] ?? '',
      'width' => $node['mediaDetails']['width'] ?? null,
      'height' => $node['mediaDetails']['height'] ?? null,
    ];
  }

  /**
   * Format taxonomy terms (categories, tags)
   *
   * @param array $terms Terms array
   * @return array Formatted terms
   */
  private static function formatTerms(array $terms): array
  {
    return array_map(function($term) {
      return [
        'name' => $term['name'] ?? '',
        'slug' => $term['slug'] ?? '',
      ];
    }, $terms);
  }

  /**
   * Format SEO metadata
   *
   * @param array $seo SEO data from Yoast
   * @return array Formatted SEO data
   */
  private static function formatSEO(array $seo): array
  {
    return [
      'title' => $seo['title'] ?? '',
      'metaDesc' => $seo['metaDesc'] ?? '',
      'metaKeywords' => $seo['metaKeywords'] ?? '',
      'opengraphTitle' => $seo['opengraphTitle'] ?? '',
      'opengraphDescription' => $seo['opengraphDescription'] ?? '',
      'opengraphImage' => $seo['opengraphImage']['sourceUrl'] ?? '',
      'twitterTitle' => $seo['twitterTitle'] ?? '',
      'twitterDescription' => $seo['twitterDescription'] ?? '',
      'twitterImage' => $seo['twitterImage']['sourceUrl'] ?? '',
    ];
  }

  /**
   * Format post translations including current post
   *
   * @param array $translations Translations data from Polylang
   * @param string $currentSlug Current post slug
   * @param string $currentLang Current language code
   * @return array Formatted translations with URLs
   */
  private static function formatTranslations(array $translations, string $currentSlug = '', string $currentLang = ''): array
  {
    $formatted = array_map(function($translation) {
      $lang = strtolower($translation['language']['code'] ?? '');
      return [
        'slug' => $translation['slug'] ?? '',
        'code' => $lang,
        'name' => $translation['language']['name'] ?? '',
        'url' => self::buildPostUrl($translation['slug'] ?? '', $lang),
      ];
    }, $translations);

    // Add current post to translations if not already included
    if ($currentSlug && $currentLang) {
      $currentExists = false;
      foreach ($formatted as $trans) {
        if ($trans['code'] === $currentLang) {
          $currentExists = true;
          break;
        }
      }

      if (!$currentExists) {
        $formatted[] = [
          'slug' => $currentSlug,
          'code' => $currentLang,
          'name' => $currentLang === 'es' ? 'Esp' : 'Eng',
          'url' => self::buildPostUrl($currentSlug, $currentLang),
        ];
      }
    }

    return $formatted;
  }

  /**
   * Build post URL based on slug and language
   *
   * @param string $slug Post slug
   * @param string $lang Language code
   * @return string Full post URL
   */
  private static function buildPostUrl(string $slug, string $lang): string
  {
    $prefix = $lang === 'es' ? '/es' : '';
    return $prefix . '/blog/' . $slug;
  }

  /**
   * Get reading time estimate
   *
   * @param string $content Post content
   * @param int $wordsPerMinute Average reading speed
   * @return int Reading time in minutes
   */
  public static function getReadingTime(string $content, int $wordsPerMinute = 200): int
  {
    $text = strip_tags($content);
    $wordCount = str_word_count($text);
    $minutes = ceil($wordCount / $wordsPerMinute);

    return max(1, $minutes);
  }

  /**
   * Truncate content to specified length
   *
   * @param string $content Content to truncate
   * @param int $length Maximum length
   * @param string $suffix Suffix to add when truncated
   * @return string Truncated content
   */
  public static function truncate(string $content, int $length = 150, string $suffix = '...'): string
  {
    $text = strip_tags($content);

    if (mb_strlen($text) <= $length) {
      return $text;
    }

    $truncated = mb_substr($text, 0, $length);
    $lastSpace = mb_strrpos($truncated, ' ');

    if ($lastSpace !== false) {
      $truncated = mb_substr($truncated, 0, $lastSpace);
    }

    return $truncated . $suffix;
  }

  /**
   * Generate pagination data with page numbers
   *
   * @param array $pageInfo Page info from WordPress
   * @param array $pageCursors All available page cursors
   * @param string|null $currentCursor Current cursor position
   * @param int $limit Posts per page
   * @return array Pagination data
   */
  public static function generatePagination(array $pageInfo, array $pageCursors = [], ?string $currentCursor = null, int $limit = 10): array
  {
    // Find current page number
    $currentPage = 1;
    foreach ($pageCursors as $pageNum => $cursor) {
      if ($cursor === $currentCursor) {
        $currentPage = $pageNum;
        break;
      }
    }

    $totalPages = count($pageCursors);

    // Generate page numbers to display
    $pages = self::generatePageNumbers($currentPage, $totalPages);

    return [
      'hasNext' => $pageInfo['hasNextPage'] ?? false,
      'hasPrev' => $currentPage > 1,
      'endCursor' => $pageInfo['endCursor'] ?? null,
      'startCursor' => $pageInfo['startCursor'] ?? null,
      'currentCursor' => $currentCursor,
      'currentPage' => $currentPage,
      'totalPages' => $totalPages,
      'pages' => $pages,
      'pageCursors' => $pageCursors,
    ];
  }

  /**
   * Generate page numbers to display
   * Shows current page ±2 pages, always shows first and last
   *
   * @param int $currentPage Current page number
   * @param int $totalPages Total number of pages
   * @return array Array of page items (number or 'ellipsis')
   */
  private static function generatePageNumbers(int $currentPage, int $totalPages): array
  {
    if ($totalPages <= 1) {
      return [];
    }

    $pages = [];
    $delta = 2; // Show 2 pages before and after current

    // Always show first page
    $pages[] = ['type' => 'number', 'value' => 1];

    // Calculate range around current page
    $rangeStart = max(2, $currentPage - $delta);
    $rangeEnd = min($totalPages - 1, $currentPage + $delta);

    // Add ellipsis after first page if needed
    if ($rangeStart > 2) {
      $pages[] = ['type' => 'ellipsis', 'value' => '...'];
    }

    // Add pages in range
    for ($i = $rangeStart; $i <= $rangeEnd; $i++) {
      $pages[] = ['type' => 'number', 'value' => $i];
    }

    // Add ellipsis before last page if needed
    if ($rangeEnd < $totalPages - 1) {
      $pages[] = ['type' => 'ellipsis', 'value' => '...'];
    }

    // Always show last page if there is more than one page
    if ($totalPages > 1) {
      $pages[] = ['type' => 'number', 'value' => $totalPages];
    }

    return $pages;
  }
}
