<?php
$pageTitle = $meta['meta_title'] ?? $trans('legal_notice.title');
$metaDescription = $meta['meta_description'] ?? '';
require __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/fixedBackground.php';
?>

<article class="block-content max-w-screen-lg min-h-[calc(100vh-172px)] pt-24 pb-16 lg:py-40 lg:text-lg">
  <h1 class="font-title text-4xl md:text-7xl lg:text-9xl uppercase bg-clip-text bg-text-black text-center mb-6"><?= $trans('legal_notice.title') ?></h1>
  <section class="space-y-4">
    <?php foreach($content['section1'] as $paragraph): ?>
      <p><?= $paragraph ?></p>
    <?php endforeach; ?>
  </section>
</article>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
