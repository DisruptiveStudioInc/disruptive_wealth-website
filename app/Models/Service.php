<?php

namespace App\Models;

class Service
{
  private static ?array $services = null;

  private static function loadServices(): void
  {
    if (self::$services !== null) {
      return;
    }

    self::$services = require __DIR__ . '/../../config/services.php';
  }

  public static function findBySlug(string $slug, string $language): ?array
  {
    self::loadServices();

    foreach (self::$services as $key => $service) {
      if (isset($service[$language]['slug']) && $service[$language]['slug'] === $slug) {
        $content = self::loadContent($service['content_file'], $language);

        return [
          'key' => $key,
          'template' => $service['template'],
          'meta' => $service[$language],
          'content' => $content,
        ];
      }
    }

    return null;
  }

  private static function loadContent(string $contentFile, string $language): array
  {
    $file = __DIR__ . "/../../content/services/{$contentFile}.php";

    if (!file_exists($file)) {
      return [];
    }

    $contentData = require $file;
    return $contentData[$language] ?? [];
  }

  public static function getAll(string $language): array
  {
    self::loadServices();

    $result = [];
    foreach (self::$services as $key => $service) {
      if (isset($service[$language])) {
        $content = self::loadContent($service['content_file'], $language);

        $result[] = [
          'key' => $key,
          'category' => $service['category'] ?? 'services',
          'template' => $service['template'],
          'meta' => $service[$language],
          'content' => $content,
        ];
      }
    }

    return $result;
  }

  public static function getByCategory(string $category, string $language): array
  {
    self::loadServices();

    $result = [];
    foreach (self::$services as $key => $service) {
      if (isset($service[$language]) && ($service['category'] ?? 'services') === $category) {
        $content = self::loadContent($service['content_file'], $language);

        $result[] = [
          'key' => $key,
          'category' => $service['category'],
          'template' => $service['template'],
          'meta' => $service[$language],
          'content' => $content,
        ];
      }
    }

    return $result;
  }

  public static function getCategories(): array
  {
    return ['services', 'ecosystem', 'ips'];
  }

  public static function getServiceSubcategories(): array
  {
    return [
      'blockchain',
      'custom-software',
      'payment-processing',
      'referral-marketing',
      'creative-services',
      'hr'
    ];
  }

  public static function getBySubcategory(string $subcategory, string $language): array
  {
    self::loadServices();

    $result = [];
    foreach (self::$services as $key => $service) {
      if (isset($service[$language]) && ($service['subcategory'] ?? null) === $subcategory) {
        $result[] = [
          'key' => $key,
          'category' => $service['category'],
          'subcategory' => $service['subcategory'],
          'meta' => $service[$language],
        ];
      }
    }

    return $result;
  }

  public static function getServicesGroupedBySubcategory(string $language): array
  {
    self::loadServices();

    $grouped = [];
    foreach (self::$services as $key => $service) {
      if (($service['category'] ?? 'services') !== 'services' || !isset($service[$language])) {
        continue;
      }

      $subcategory = $service['subcategory'] ?? 'other';

      if (!isset($grouped[$subcategory])) {
        $grouped[$subcategory] = [];
      }

      $grouped[$subcategory][] = [
        'key' => $key,
        'meta' => $service[$language],
      ];
    }

    return $grouped;
  }

  public static function exists(string $slug, string $language): bool
  {
    return self::findBySlug($slug, $language) !== null;
  }

  public static function getTranslatedSlug(string $slug, string $fromLang, string $toLang): ?string
  {
    self::loadServices();

    // Find the service key by slug in the source language
    $serviceKey = null;
    foreach (self::$services as $key => $service) {
      if (isset($service[$fromLang]['slug']) && $service[$fromLang]['slug'] === $slug) {
        $serviceKey = $key;
        break;
      }
    }

    if ($serviceKey === null) {
      return null;
    }

    // Return the slug in the target language
    return self::$services[$serviceKey][$toLang]['slug'] ?? null;
  }
}
