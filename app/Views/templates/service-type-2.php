<?php
$pageTitle = $meta['meta_title'] ?? $content['hero']['title'];
$metaDescription = $meta['meta_description'] ?? '';
require __DIR__ . '/../layouts/header.php';
?>

<!-- Hero Section - Alternate Style -->
<section class="py-20">
  <div class="container mx-auto px-4">
    <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="fade-in">
          <h1 class="text-5xl font-bold mb-6 text-dark-200">
            <?= htmlspecialchars($content['hero']['title']) ?>
          </h1>
          <p class="text-2xl mb-4">
            <?= htmlspecialchars($content['hero']['subtitle']) ?>
          </p>
          <p class="text-lg">
            <?= htmlspecialchars($content['hero']['description']) ?>
          </p>
        </div>
        <div class="bg-gradient-to-br from-brand-100 to-brand-200 rounded-2xl h-96 fade-in"></div>
      </div>
    </div>
  </div>
</section>

<!-- Introduction Section - Sidebar Layout -->
<section class="bg-dark-100 text-white py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-6xl mx-auto">
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
          <h2 class="text-3xl text-brand-100 font-bold mb-6 fade-in">
            <?= htmlspecialchars($content['intro']['title']) ?>
          </h2>
          <?php foreach ($content['intro']['paragraphs'] as $paragraph): ?>
            <p class="text-lg mb-4 fade-in">
              <?= nl2br(htmlspecialchars($paragraph)) ?>
            </p>
          <?php endforeach; ?>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
          <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
            <h3 class="text-xl font-bold mb-4">
              <?= htmlspecialchars($content['benefits']['title']) ?>
            </h3>
            <ul class="space-y-3">
              <?php foreach ($content['benefits']['list'] as $benefit): ?>
                <li class="flex items-start">
                  <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                  </svg>
                  <span class="text-dark-100"><?= htmlspecialchars($benefit) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Features Section - Card Grid -->
<section class="py-16">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12 fade-in">
      <?= htmlspecialchars($content['features']['title']) ?>
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-5xl mx-auto">
      <?php foreach ($content['features']['items'] as $feature): ?>
        <div class="bg-white border-2 border-dark-100 rounded-xl p-8 hover:border-brand-100 transition feature-card">
          <h3 class="text-2xl font-bold mb-3 text-dark-200">
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

<!-- Process Section - Timeline -->
<section class="bg-dark-100 text-white py-16">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12 fade-in">
      <?= htmlspecialchars($content['process']['title']) ?>
    </h2>

    <div class="max-w-4xl mx-auto">
      <?php foreach ($content['process']['steps'] as $index => $step): ?>
        <div class="flex items-start mb-8 process-step">
          <div class="flex-shrink-0 w-16 h-16 bg-brand-100 text-white rounded-full flex items-center justify-center text-xl font-bold mr-6">
            <?= htmlspecialchars($step['number']) ?>
          </div>
          <div class="flex-1">
            <h3 class="text-2xl font-bold mb-2">
              <?= htmlspecialchars($step['title']) ?>
            </h3>
            <p class="text-dark-200">
              <?= htmlspecialchars($step['description']) ?>
            </p>
          </div>
        </div>
        <?php if ($index < count($content['process']['steps']) - 1): ?>
          <div class="w-0.5 h-8 bg-dark-200 ml-8 mb-8"></div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section - Full Width -->
<section class="bg-gradient-to-r from-brand-100 to-brand-200 text-white py-16">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto text-center fade-in">
      <h2 class="text-4xl font-bold mb-4">
        <?= htmlspecialchars($content['cta']['title']) ?>
      </h2>
      <p class="text-xl mb-8">
        <?= htmlspecialchars($content['cta']['description']) ?>
      </p>
      <a href="<?= route('contact', $currentLang, $config['languages']['default']) ?>" class="inline-block bg-white text-brand-100 px-10 py-4 rounded-lg font-bold text-lg hover:bg-secondary-100 hover:text-white transition-colors">
        <?= htmlspecialchars($content['cta']['button_text']) ?>
      </a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>