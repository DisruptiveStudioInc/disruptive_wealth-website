<?php
$pageTitle = $meta['meta_title'] ?? $content['hero']['title'];
$metaDescription = $meta['meta_description'] ?? '';
require __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/fixedBackground.php';
?>

<div class="fixed left-7 right-7 bottom-7 flex justify-between items-center z-10">
  <ul id="serv-dots" class="flex gap-4">
    <?php foreach([1,2,3,4] as $item): ?>
      <li class="h-3 w-8 rounded-full <?= $item === 1 ? 'bg-brand-100' : 'bg-white' ?>"></li>
    <?php endforeach; ?>
  </ul>
  <nav class="flex gap-4">
    <button id="serv-prev" class="button rounded-full leading-none gap-2 cursor-pointer">
      <svg class="size-5"><use href="#arrow-left"/></svg>
      <?= $trans('common.previous') ?>
    </button>
    <button id="serv-next" class="button rounded-full leading-none gap-2 cursor-pointer">
      <?= $trans('common.next') ?>
      <svg class="size-5"><use href="#arrow-right"/></svg>
    </button>
  </nav>
</div>

<!-- Hero Section -->
<section class="lat-section">
  <div class="block-content min-h-dvh py-16 lg:py-40">
    <h2 class="font-khand uppercase text-7xl">Message</h2>
  </div>
</section>

<!-- Hero Section -->
<section class="lat-section">
  <div class="block-content min-h-dvh py-16 lg:py-40">
    <h2 class="font-khand uppercase text-7xl">Message</h2>
  </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
