<?php
$pageTitle = $title ?? $trans('blog.title');
require __DIR__ . '/../../layouts/header.php';
?>

<!-- Blog Index Page -->
<section class="relative bg-white py-16 lg:py-24">
  <div class="container mx-auto px-4 max-w-screen-xl">

    <!-- Page Header -->
    <div class="text-center mb-12 lg:mb-16">
      <h1 class="font-title text-4xl md:text-6xl lg:text-7xl uppercase mb-4">
        <?= htmlspecialchars($title ?? $trans('blog.title')) ?>
      </h1>
      <?php if (isset($metaDescription) && $metaDescription): ?>
        <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
          <?= htmlspecialchars($metaDescription) ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Error Message -->
    <?php if (isset($error) && $error): ?>
      <div class="bg-red-50 border border-red-200 text-red-800 px-6 py-4 rounded-lg mb-8 text-center">
        <p><?= htmlspecialchars($error) ?></p>
      </div>
    <?php endif; ?>

    <div class="flex flex-col lg:flex-row gap-8">

      <!-- Main Content - Posts Grid -->
      <div class="flex-1">
        <?php if (!empty($posts)): ?>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            <?php foreach ($posts as $post): ?>
              <article class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">

                <!-- Featured Image -->
                <?php if ($post['featuredImage']): ?>
                  <a href="<?= htmlspecialchars($post['url']) ?>" class="block aspect-video overflow-hidden">
                    <img
                      src="<?= htmlspecialchars($post['featuredImage']['url']) ?>"
                      alt="<?= htmlspecialchars($post['featuredImage']['alt'] ?: $post['title']) ?>"
                      class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
                      loading="lazy"
                    >
                  </a>
                <?php endif; ?>

                <div class="p-6">
                  <!-- Categories -->
                  <?php if (!empty($post['categories'])): ?>
                    <div class="flex flex-wrap gap-2 mb-3">
                      <?php foreach (array_slice($post['categories'], 0, 2) as $category): ?>
                        <span class="text-xs font-semibold px-3 py-1 bg-secondary-100 text-white rounded-full">
                          <?= htmlspecialchars($category['name']) ?>
                        </span>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>

                  <!-- Title -->
                  <h2 class="text-xl font-bold mb-3 line-clamp-2">
                    <a href="<?= htmlspecialchars($post['url']) ?>" class="hover:text-secondary-200 transition-colors">
                      <?= htmlspecialchars($post['title']) ?>
                    </a>
                  </h2>

                  <!-- Excerpt -->
                  <?php if ($post['excerpt']): ?>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                      <?= htmlspecialchars($post['excerpt']) ?>
                    </p>
                  <?php endif; ?>

                  <!-- Meta Info -->
                  <div class="flex items-center justify-between text-sm text-gray-500 pt-4 border-t border-gray-200">
                    <div class="flex items-center gap-2">
                      <?php if ($post['author']['avatar']): ?>
                        <img
                          src="<?= htmlspecialchars($post['author']['avatar']) ?>"
                          alt="<?= htmlspecialchars($post['author']['name']) ?>"
                          class="w-8 h-8 rounded-full"
                        >
                      <?php endif; ?>
                      <span><?= htmlspecialchars($post['author']['name']) ?></span>
                    </div>
                    <time datetime="<?= htmlspecialchars($post['dateRaw']) ?>">
                      <?= htmlspecialchars($post['date']) ?>
                    </time>
                  </div>
                </div>
              </article>
            <?php endforeach; ?>
          </div>

          <!-- Pagination Component -->
          <?php require __DIR__ . '/../../components/pagination.php'; ?>

        <?php else: ?>
          <!-- No Posts -->
          <div class="text-center py-12">
            <p class="text-xl text-gray-600"><?= $trans('blog.no_posts') ?></p>
          </div>
        <?php endif; ?>
      </div>

      <!-- Sidebar -->
      <aside class="w-full lg:w-80 shrink-0">

        <!-- Categories -->
        <?php if (!empty($categories)): ?>
          <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <h3 class="text-xl font-bold mb-4"><?= $trans('blog.categories') ?></h3>
            <ul class="space-y-2">
              <li>
                <a
                  href="/blog"
                  class="block px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors <?= !$selectedCategory ? 'bg-secondary-100 text-white hover:bg-secondary-200' : '' ?>"
                >
                  <?= $trans('blog.all_posts') ?>
                </a>
              </li>
              <?php foreach ($categories as $category): ?>
                <li>
                  <a
                    href="?category=<?= urlencode($category['slug']) ?>"
                    class="flex items-center justify-between px-4 py-2 rounded-lg hover:bg-gray-100 transition-colors <?= $selectedCategory === $category['slug'] ? 'bg-secondary-100 text-white hover:bg-secondary-200' : '' ?>"
                  >
                    <span><?= htmlspecialchars($category['name']) ?></span>
                    <span class="text-sm text-gray-500">(<?= $category['count'] ?>)</span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

      </aside>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
