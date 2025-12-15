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
    return [
      'id' => $post['id'] ?? '',
      'title' => $post['title'] ?? '',
      'slug' => $post['slug'] ?? '',
      'excerpt' => self::cleanExcerpt($post['excerpt'] ?? ''),
      'content' => $post['content'] ?? '',
      'date' => self::formatDate($post['date'] ?? ''),
      'dateRaw' => $post['date'] ?? '',
      'modified' => self::formatDate($post['modified'] ?? ''),
      'author' => [
        'name' => $post['author']['node']['name'] ?? 'Unknown',
        'description' => $post['author']['node']['description'] ?? '',
        'avatar' => $post['author']['node']['avatar']['url'] ?? '',
      ],
      'featuredImage' => self::formatFeaturedImage($post['featuredImage'] ?? null),
      'categories' => self::formatTerms($post['categories']['nodes'] ?? []),
      'tags' => self::formatTerms($post['tags']['nodes'] ?? []),
      'seo' => self::formatSEO($post['seo'] ?? []),
      'translations' => self::formatTranslations($post['translations'] ?? []),
      'url' => self::buildPostUrl($post['slug'] ?? '', Language::getCurrentLanguage()),
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
      'canonical' => $seo['canonical'] ?? '',
      'breadcrumbs' => $seo['breadcrumbs'] ?? [],
    ];
  }

  /**
   * Format post translations
   *
   * @param array $translations Translations data from Polylang
   * @return array Formatted translations
   */
  private static function formatTranslations(array $translations): array
  {
    return array_map(function($translation) {
      return [
        'slug' => $translation['slug'] ?? '',
        'code' => strtolower($translation['language']['code'] ?? ''),
        'name' => $translation['language']['name'] ?? '',
      ];
    }, $translations);
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
   * Generate pagination data for cursor-based pagination
   *
   * @param array $pageInfo Page info from WordPress (with cursors)
   * @param string|null $currentCursor Current cursor position
   * @return array Pagination data
   */
  public static function generatePagination(array $pageInfo, ?string $currentCursor = null): array
  {
    return [
      'hasNext' => $pageInfo['hasNextPage'] ?? false,
      'hasPrev' => $pageInfo['hasPreviousPage'] ?? false,
      'endCursor' => $pageInfo['endCursor'] ?? null,
      'startCursor' => $pageInfo['startCursor'] ?? null,
      'currentCursor' => $currentCursor,
    ];
  }
}
