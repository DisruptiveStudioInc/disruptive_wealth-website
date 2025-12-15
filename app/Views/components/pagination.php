<?php
/**
 * Pagination Component
 *
 * A reusable cursor-based pagination component for WordPress GraphQL
 *
 * @param array $pagination Pagination data with 'hasNext', 'hasPrev', 'endCursor'
 * @param string|null $selectedCategory Optional category filter
 * @param array $additionalParams Additional query parameters to preserve
 */

if (!isset($pagination) || !$pagination || (!$pagination['hasNext'] && !$pagination['hasPrev'])) {
  return; // Don't render if no pagination needed
}

// Build query parameters
$queryParams = [];
if (isset($selectedCategory) && $selectedCategory) {
  $queryParams[] = 'category=' . urlencode($selectedCategory);
}
if (isset($additionalParams) && is_array($additionalParams)) {
  foreach ($additionalParams as $key => $value) {
    $queryParams[] = urlencode($key) . '=' . urlencode($value);
  }
}
$queryString = !empty($queryParams) ? implode('&', $queryParams) : '';
$separator = !empty($queryString) ? '&' : '';
?>

<nav class="mt-12 flex justify-center items-center gap-4" aria-label="<?= $trans('blog.pagination') ?>">

  <!-- Previous Page (Back to First) -->
  <?php if ($pagination['hasPrev']): ?>
    <a
      href="?<?= $queryString ?>"
      class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors font-medium"
      aria-label="<?= $trans('blog.previous') ?>"
    >
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      <?= $trans('blog.previous') ?>
    </a>
  <?php else: ?>
    <span class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed font-medium">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      <?= $trans('blog.previous') ?>
    </span>
  <?php endif; ?>

  <!-- Next Page -->
  <?php if ($pagination['hasNext']): ?>
    <a
      href="?<?= $queryString ?><?= $separator ?>after=<?= urlencode($pagination['endCursor']) ?>"
      class="inline-flex items-center gap-2 px-6 py-3 bg-secondary-200 text-white rounded-lg hover:bg-secondary-100 transition-colors font-medium"
      aria-label="<?= $trans('blog.next') ?>"
    >
      <?= $trans('blog.next') ?>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </a>
  <?php else: ?>
    <span class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed font-medium">
      <?= $trans('blog.next') ?>
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </span>
  <?php endif; ?>
</nav>
