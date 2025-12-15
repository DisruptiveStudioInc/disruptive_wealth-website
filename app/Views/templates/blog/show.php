<?php
$pageTitle = $title ?? $post['title'] ?? $trans('blog.post');
require __DIR__ . '/../../layouts/header.php';
?>

<!-- Single Post Page -->
<article class="relative bg-white">

  <!-- Featured Image Hero -->
  <?php if ($post['featuredImage']): ?>
    <div class="relative w-full h-96 lg:h-[600px] overflow-hidden bg-gray-900">
      <img
        src="<?= htmlspecialchars($post['featuredImage']['url']) ?>"
        alt="<?= htmlspecialchars($post['featuredImage']['alt'] ?: $post['title']) ?>"
        class="w-full h-full object-cover opacity-90"
        loading="eager"
      >
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

      <!-- Title Overlay -->
      <div class="absolute bottom-0 left-0 right-0 p-8 lg:p-16 text-white">
        <div class="container mx-auto max-w-4xl">
          <h1 class="font-title text-3xl md:text-5xl lg:text-6xl uppercase mb-4">
            <?= htmlspecialchars($post['title']) ?>
          </h1>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Article Content -->
  <div class="container mx-auto px-4 py-12 lg:py-16 max-w-4xl">

    <!-- No Featured Image - Show Title Here -->
    <?php if (!$post['featuredImage']): ?>
      <h1 class="font-title text-4xl md:text-6xl lg:text-7xl uppercase mb-8 text-center">
        <?= htmlspecialchars($post['title']) ?>
      </h1>
    <?php endif; ?>

    <!-- Post Meta -->
    <div class="flex flex-wrap items-center justify-between gap-4 pb-6 mb-8 border-b border-gray-200">
      <div class="flex items-center gap-4">
        <?php if ($post['author']['avatar']): ?>
          <img
            src="<?= htmlspecialchars($post['author']['avatar']) ?>"
            alt="<?= htmlspecialchars($post['author']['name']) ?>"
            class="w-12 h-12 rounded-full"
          >
        <?php endif; ?>
        <div>
          <p class="font-semibold"><?= htmlspecialchars($post['author']['name']) ?></p>
          <p class="text-sm text-gray-500">
            <time datetime="<?= htmlspecialchars($post['dateRaw']) ?>">
              <?= htmlspecialchars($post['date']) ?>
            </time>
            <?php if (isset($readingTime) && $readingTime): ?>
              <span class="mx-2">•</span>
              <span><?= $readingTime ?> <?= $trans('blog.min_read') ?></span>
            <?php endif; ?>
          </p>
        </div>
      </div>

      <!-- Categories & Tags -->
      <div class="flex flex-wrap gap-2">
        <?php foreach ($post['categories'] as $category): ?>
          <a
            href="/blog?category=<?= urlencode($category['slug']) ?>"
            class="text-xs font-semibold px-3 py-1 bg-secondary-100 text-white rounded-full hover:bg-secondary-200 transition-colors"
          >
            <?= htmlspecialchars($category['name']) ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Post Content -->
    <div class="prose prose-lg max-w-none mb-12">
      <?= $post['content'] ?>
    </div>

    <!-- Tags -->
    <?php if (!empty($post['tags'])): ?>
      <div class="flex flex-wrap gap-2 mb-8 pb-8 border-b border-gray-200">
        <span class="font-semibold text-gray-700"><?= $trans('blog.tags') ?>:</span>
        <?php foreach ($post['tags'] as $tag): ?>
          <span class="text-sm px-3 py-1 bg-gray-100 text-gray-700 rounded-full">
            #<?= htmlspecialchars($tag['name']) ?>
          </span>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- Author Bio -->
    <?php if (!empty($post['author']['description'])): ?>
      <div class="bg-gray-50 rounded-xl p-6 mb-12">
        <div class="flex items-start gap-4">
          <?php if ($post['author']['avatar']): ?>
            <img
              src="<?= htmlspecialchars($post['author']['avatar']) ?>"
              alt="<?= htmlspecialchars($post['author']['name']) ?>"
              class="w-16 h-16 rounded-full shrink-0"
            >
          <?php endif; ?>
          <div>
            <h3 class="font-bold text-lg mb-2"><?= $trans('blog.about_author') ?>: <?= htmlspecialchars($post['author']['name']) ?></h3>
            <p class="text-gray-600"><?= htmlspecialchars($post['author']['description']) ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Language Switcher for Translations -->
    <?php if (!empty($post['translations'])): ?>
      <div class="mb-12 p-6 bg-blue-50 border border-blue-200 rounded-xl">
        <p class="font-semibold mb-3"><?= $trans('blog.available_in') ?>:</p>
        <div class="flex flex-wrap gap-2">
          <?php foreach ($post['translations'] as $translation): ?>
            <a
              href="<?= htmlspecialchars($translation['code'] === 'es' ? '/es' : '') ?>/blog/<?= htmlspecialchars($translation['slug']) ?>"
              class="px-4 py-2 bg-white border border-blue-300 rounded-lg hover:bg-blue-100 transition-colors"
            >
              <?= htmlspecialchars($translation['name']) ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <!-- Share Buttons -->
    <div class="flex items-center gap-4 mb-12">
      <span class="font-semibold text-gray-700"><?= $trans('blog.share') ?>:</span>
      <div class="flex gap-2">
        <a
          href="https://twitter.com/intent/tweet?text=<?= urlencode($post['title']) ?>&url=<?= urlencode($_ENV['APP_URL'] . $post['url']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="w-10 h-10 flex items-center justify-center bg-gray-800 text-white rounded-full hover:bg-gray-900 transition-colors"
          aria-label="Share on Twitter"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>
        <a
          href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($_ENV['APP_URL'] . $post['url']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="w-10 h-10 flex items-center justify-center bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors"
          aria-label="Share on Facebook"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396v8.01Z"/></svg>
        </a>
        <a
          href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($_ENV['APP_URL'] . $post['url']) ?>"
          target="_blank"
          rel="noopener noreferrer"
          class="w-10 h-10 flex items-center justify-center bg-blue-700 text-white rounded-full hover:bg-blue-800 transition-colors"
          aria-label="Share on LinkedIn"
        >
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
        </a>
      </div>
    </div>

  </div>

  <!-- Related Posts -->
  <?php if (!empty($relatedPosts)): ?>
    <section class="bg-gray-50 py-12 lg:py-16">
      <div class="container mx-auto px-4 max-w-6xl">
        <h2 class="text-3xl font-bold mb-8 text-center"><?= $trans('blog.related_posts') ?></h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <?php foreach ($relatedPosts as $related): ?>
            <article class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
              <?php if ($related['featuredImage']): ?>
                <a href="<?= htmlspecialchars($related['url']) ?>" class="block aspect-video overflow-hidden">
                  <img
                    src="<?= htmlspecialchars($related['featuredImage']['url']) ?>"
                    alt="<?= htmlspecialchars($related['featuredImage']['alt'] ?: $related['title']) ?>"
                    class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                    loading="lazy"
                  >
                </a>
              <?php endif; ?>
              <div class="p-6">
                <h3 class="text-lg font-bold mb-2 line-clamp-2">
                  <a href="<?= htmlspecialchars($related['url']) ?>" class="hover:text-secondary-200 transition-colors">
                    <?= htmlspecialchars($related['title']) ?>
                  </a>
                </h3>
                <?php if ($related['excerpt']): ?>
                  <p class="text-sm text-gray-600 line-clamp-2">
                    <?= htmlspecialchars($related['excerpt']) ?>
                  </p>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  <?php endif; ?>

</article>

<!-- Structured Data for SEO -->
<?php if (isset($structuredData)): ?>
<script type="application/ld+json">
<?= $structuredData ?>
</script>
<?php endif; ?>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
