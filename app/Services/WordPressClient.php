<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Exception;

class WordPressClient
{
  private string $endpoint;
  private Client $client;
  private string $cacheDir;
  private int $cacheTTL = 3600; // 1 hour in seconds

  public function __construct()
  {
    $this->endpoint = $_ENV['WP_API_URL'] ?? '';

    if (empty($this->endpoint)) {
      throw new Exception('WP_API_URL environment variable is not set');
    }

    $this->client = new Client([
      'timeout' => 10,
      'connect_timeout' => 5,
    ]);

    $this->cacheDir = __DIR__ . '/../../cache/wordpress';
    $this->ensureCacheDirectory();
  }

  /**
   * Get paginated posts by language
   *
   * @param string $lang Language code (ES or EN)
   * @param string|null $after Cursor for pagination (use endCursor from previous request)
   * @param int $limit Posts per page
   * @return array
   */
  public function getPosts(string $lang = 'EN', ?string $after = null, int $limit = 10): array
  {
    $cacheKey = "posts_{$lang}_" . ($after ?: 'first') . "_{$limit}";

    // Try cache first
    if ($cached = $this->getFromCache($cacheKey)) {
      return $cached;
    }

    $query = '
      query GetPosts($lang: LanguageCodeFilterEnum!, $limit: Int!, $after: String) {
        posts(where: {language: $lang, orderby: {field: DATE, order: DESC}}, first: $limit, after: $after) {
          pageInfo {
            hasNextPage
            hasPreviousPage
            endCursor
            startCursor
          }
          nodes {
            id
            title
            slug
            excerpt
            date
            modified
            author {
              node {
                name
                avatar {
                  url
                }
              }
            }
            featuredImage {
              node {
                sourceUrl
                altText
                mediaDetails {
                  width
                  height
                }
              }
            }
            categories {
              nodes {
                name
                slug
              }
            }
            tags {
              nodes {
                name
                slug
              }
            }
            seo {
              title
              metaDesc
              opengraphImage {
                sourceUrl
              }
            }
          }
        }
      }
    ';

    $variables = [
      'lang' => strtoupper($lang),
      'limit' => $limit,
      'after' => $after
    ];

    $result = $this->request($query, $variables);

    if (isset($result['data']['posts'])) {
      $data = [
        'posts' => $result['data']['posts']['nodes'] ?? [],
        'pageInfo' => $result['data']['posts']['pageInfo'] ?? []
      ];

      $this->saveToCache($cacheKey, $data);
      return $data;
    }

    return ['posts' => [], 'pageInfo' => []];
  }

  /**
   * Get total count of posts by language
   *
   * @param string $lang Language code (ES or EN)
   * @return int Total number of posts
   */
  public function getPostsCount(string $lang = 'EN'): int
  {
    $cacheKey = "posts_count_{$lang}";

    // Try cache first (cache for longer since count doesn't change often)
    if ($cached = $this->getFromCache($cacheKey)) {
      return $cached;
    }

    $query = '
      query GetPostsCount($lang: LanguageCodeFilterEnum!) {
        posts(where: {language: $lang}) {
          nodes {
            id
          }
        }
      }
    ';

    $variables = [
      'lang' => strtoupper($lang),
    ];

    $result = $this->request($query, $variables);

    $count = 0;
    if (isset($result['data']['posts']['nodes'])) {
      $count = count($result['data']['posts']['nodes']);
    }

    // Cache for 30 minutes
    $this->saveToCache($cacheKey, $count);
    return $count;
  }

  /**
   * Get all page cursors for numbered pagination
   * This method fetches cursors for all pages (cached)
   *
   * @param string $lang Language code
   * @param int $limit Posts per page
   * @return array Array of cursors indexed by page number
   */
  public function getPageCursors(string $lang = 'EN', int $limit = 10): array
  {
    $cacheKey = "page_cursors_{$lang}_{$limit}";

    // Try cache first (cache for longer since structure doesn't change often)
    if ($cached = $this->getFromCache($cacheKey)) {
      return $cached;
    }

    $cursors = [1 => null]; // Page 1 has no cursor (first page)
    $currentCursor = null;
    $pageNumber = 1;

    // Keep fetching pages until there are no more
    while (true) {
      // Fetch current page to get its endCursor
      $data = $this->getPosts($lang, $currentCursor, $limit);
      $pageInfo = $data['pageInfo'] ?? [];

      // Check if there's a next page
      if (!($pageInfo['hasNextPage'] ?? false)) {
        break; // No more pages
      }

      // Get the cursor for the next page
      $currentCursor = $pageInfo['endCursor'] ?? null;

      if (!$currentCursor) {
        break; // No cursor means we can't continue
      }

      // Add the cursor for the next page
      $pageNumber++;
      $cursors[$pageNumber] = $currentCursor;

      // Safety limit to prevent infinite loops
      if ($pageNumber > 1000) {
        break;
      }
    }

    // Cache for 1 hour
    $this->saveToCache($cacheKey, $cursors);
    return $cursors;
  }

  /**
   * Get a single post by slug
   *
   * @param string $slug Post slug
   * @param string|null $lang Language code (ES or EN), null for any language
   * @return array|null
   */
  public function getPostBySlug(string $slug, ?string $lang = null): ?array
  {
    $cacheKey = "post_{$slug}" . ($lang ? "_{$lang}" : '');

    // Try cache first
    if ($cached = $this->getFromCache($cacheKey)) {
      return $cached;
    }

    $query = '
      query GetPostBySlug($slug: ID!) {
        post(id: $slug, idType: SLUG) {
          id
          title
          slug
          content
          excerpt
          date
          modified
          author {
            node {
              name
              description
              avatar {
                url
              }
            }
          }
          featuredImage {
            node {
              sourceUrl
              altText
              caption
              mediaDetails {
                width
                height
              }
            }
          }
          categories {
            nodes {
              name
              slug
            }
          }
          tags {
            nodes {
              name
              slug
            }
          }
          seo {
            title
            metaDesc
            metaKeywords
            opengraphTitle
            opengraphDescription
            opengraphImage {
              sourceUrl
            }
            twitterTitle
            twitterDescription
            twitterImage {
              sourceUrl
            }
            canonical
            breadcrumbs {
              text
              url
            }
          }
          translations {
            slug
            language {
              code
              name
            }
          }
        }
      }
    ';

    $variables = ['slug' => $slug];
    if ($lang) {
      $variables['lang'] = strtoupper($lang);
    }

    $result = $this->request($query, $variables);

    if (isset($result['data']['post']) && $result['data']['post'] !== null) {
      $post = $result['data']['post'];
      $this->saveToCache($cacheKey, $post);
      return $post;
    }

    return null;
  }

  /**
   * Get posts by category
   *
   * @param string $categorySlug Category slug
   * @param string $lang Language code
   * @param int $limit Posts per page
   * @return array
   */
  public function getPostsByCategory(string $categorySlug, string $lang = 'ES', int $limit = 10): array
  {
    $cacheKey = "posts_category_{$categorySlug}_{$lang}_{$limit}";

    if ($cached = $this->getFromCache($cacheKey)) {
      return $cached;
    }

    $query = '
      query GetPostsByCategory($categorySlug: String!, $lang: LanguageCodeFilterEnum!, $limit: Int!) {
        posts(where: {categoryName: $categorySlug, language: $lang}, first: $limit) {
          nodes {
            id
            title
            slug
            excerpt
            date
            featuredImage {
              node {
                sourceUrl
                altText
              }
            }
            categories {
              nodes {
                name
                slug
              }
            }
          }
        }
      }
    ';

    $variables = [
      'categorySlug' => $categorySlug,
      'lang' => strtoupper($lang),
      'limit' => $limit
    ];

    $result = $this->request($query, $variables);

    if (isset($result['data']['posts']['nodes'])) {
      $posts = $result['data']['posts']['nodes'];
      $this->saveToCache($cacheKey, $posts);
      return $posts;
    }

    return [];
  }

  /**
   * Get all categories
   *
   * @param string $lang Language code
   * @return array
   */
  public function getCategories(string $lang = 'ES'): array
  {
    $cacheKey = "categories_{$lang}";

    if ($cached = $this->getFromCache($cacheKey)) {
      return $cached;
    }

    $query = '
      query GetCategories($lang: LanguageCodeFilterEnum!) {
        categories(where: {language: $lang}) {
          nodes {
            id
            name
            slug
            count
            description
          }
        }
      }
    ';

    $variables = ['lang' => strtoupper($lang)];
    $result = $this->request($query, $variables);

    if (isset($result['data']['categories']['nodes'])) {
      $categories = $result['data']['categories']['nodes'];
      $this->saveToCache($cacheKey, $categories);
      return $categories;
    }

    return [];
  }

  /**
   * Make GraphQL request to WordPress
   *
   * @param string $query GraphQL query
   * @param array $variables Query variables
   * @return array
   * @throws Exception
   */
  private function request(string $query, array $variables = []): array
  {
    try {
      $response = $this->client->post($this->endpoint, [
        'json' => [
          'query' => $query,
          'variables' => $variables
        ],
        'headers' => [
          'Content-Type' => 'application/json',
          'Accept' => 'application/json',
        ]
      ]);

      $body = $response->getBody()->getContents();
      $data = json_decode($body, true);

      if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception('Invalid JSON response from WordPress API');
      }

      // Check for GraphQL errors
      if (isset($data['errors']) && !empty($data['errors'])) {
        $errorMessage = $data['errors'][0]['message'] ?? 'Unknown GraphQL error';
        throw new Exception("GraphQL Error: {$errorMessage}");
      }

      return $data;

    } catch (GuzzleException $e) {
      throw new Exception("WordPress API request failed: " . $e->getMessage());
    }
  }

  /**
   * Get data from cache if not expired
   *
   * @param string $key Cache key
   * @return mixed|null
   */
  private function getFromCache(string $key): mixed
  {
    $cacheFile = $this->cacheDir . '/' . md5($key) . '.json';

    if (!file_exists($cacheFile)) {
      return null;
    }

    $fileTime = filemtime($cacheFile);
    if (time() - $fileTime > $this->cacheTTL) {
      @unlink($cacheFile);
      return null;
    }

    $content = @file_get_contents($cacheFile);
    if ($content === false) {
      return null;
    }

    return json_decode($content, true);
  }

  /**
   * Save data to cache
   *
   * @param string $key Cache key
   * @param mixed $data Data to cache
   * @return bool
   */
  private function saveToCache(string $key, mixed $data): bool
  {
    $cacheFile = $this->cacheDir . '/' . md5($key) . '.json';
    $content = json_encode($data, JSON_PRETTY_PRINT);

    return @file_put_contents($cacheFile, $content) !== false;
  }

  /**
   * Clear all cache
   *
   * @return void
   */
  public function clearCache(): void
  {
    $files = glob($this->cacheDir . '/*.json');
    foreach ($files as $file) {
      if (is_file($file)) {
        @unlink($file);
      }
    }
  }

  /**
   * Clear cache for specific key pattern
   *
   * @param string $pattern Pattern to match (e.g., 'posts_*')
   * @return void
   */
  public function clearCachePattern(string $pattern): void
  {
    $files = glob($this->cacheDir . '/*.json');
    foreach ($files as $file) {
      if (is_file($file)) {
        $content = @file_get_contents($file);
        if ($content && str_contains($file, md5($pattern))) {
          @unlink($file);
        }
      }
    }
  }

  /**
   * Ensure cache directory exists
   *
   * @return void
   */
  private function ensureCacheDirectory(): void
  {
    if (!is_dir($this->cacheDir)) {
      @mkdir($this->cacheDir, 0755, true);
    }
  }

  /**
   * Set cache TTL
   *
   * @param int $seconds Cache time to live in seconds
   * @return void
   */
  public function setCacheTTL(int $seconds): void
  {
    $this->cacheTTL = $seconds;
  }
}
