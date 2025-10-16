<?php
$pageTitle = $meta['meta_title'] ?? $content['hero']['title'];
$metaDescription = $meta['meta_description'] ?? '';
require __DIR__ . '/../layouts/header.php';
?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-brand-100 to-brand-200 text-white py-20">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto text-center fade-in">
      <h1 class="text-5xl font-bold mb-6">
        <?= htmlspecialchars($content['hero']['title']) ?>
      </h1>
      <p class="text-xl mb-4">
        <?= htmlspecialchars($content['hero']['subtitle']) ?>
      </p>
      <p class="text-lg">
        <?= htmlspecialchars($content['hero']['description']) ?>
      </p>
    </div>
  </div>
</section>

<!-- Introduction Section -->
<section class="py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-3xl font-bold mb-6 fade-in">
        <?= htmlspecialchars($content['intro']['title']) ?>
      </h2>
      <?php foreach ($content['intro']['paragraphs'] as $paragraph): ?>
        <p class="text-lg text-gray-700 mb-4 fade-in">
          <?= nl2br(htmlspecialchars($paragraph)) ?>
        </p>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="bg-gray-50 py-16">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12 fade-in">
      <?= htmlspecialchars($content['features']['title']) ?>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <?php foreach ($content['features']['items'] as $feature): ?>
        <div class="bg-white rounded-lg shadow-lg p-6 feature-card">
          <div class="w-12 h-12 bg-brand-100 rounded-lg flex items-center justify-center mb-4">
            <svg class="w-6 h-6 text-secondary-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-3">
            <?= htmlspecialchars($feature['title']) ?>
          </h3>
          <p class="text-dark-100">
            <?= htmlspecialchars($feature['description']) ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Benefits Section -->
<section class="py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-3xl font-bold mb-8 fade-in">
        <?= htmlspecialchars($content['benefits']['title']) ?>
      </h2>
      <ul class="space-y-4">
        <?php foreach ($content['benefits']['list'] as $benefit): ?>
        <li class="flex items-start fade-in">
          <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          <span class="text-lg text-gray-700"><?= htmlspecialchars($benefit) ?></span>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<!-- Process Section -->
<section class="bg-dark-200 text-white py-16">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12 fade-in">
      <?= htmlspecialchars($content['process']['title']) ?>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 max-w-6xl mx-auto">
      <?php foreach ($content['process']['steps'] as $step): ?>
        <div class="text-center process-step">
          <div class="text-4xl font-bold text-brand-100 mb-4">
            <?= htmlspecialchars($step['number']) ?>
          </div>
          <h3 class="text-xl font-semibold mb-3">
            <?= htmlspecialchars($step['title']) ?>
          </h3>
          <p class="text-gray-300">
            <?= htmlspecialchars($step['description']) ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto text-center bg-brand-100 text-white rounded-2xl p-12 fade-in">
      <h2 class="text-3xl font-bold mb-4">
        <?= htmlspecialchars($content['cta']['title']) ?>
      </h2>
      <p class="text-xl mb-8">
        <?= htmlspecialchars($content['cta']['description']) ?>
      </p>
      <a href="<?= route('contact', $currentLang, $config['languages']['default']) ?>" class="inline-block bg-white text-brand-100 px-8 py-3 rounded-lg font-semibold hover:bg-secondary-100 hover:text-white transition-colors">
        <?= htmlspecialchars($content['cta']['button_text']) ?>
      </a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
