</main>

<footer class="bg-secondary-100 text-white <?= (isset($hasSnapScroll) && $hasSnapScroll) ? 'snap-start' : '' ?>">
  <div class="block-content flex flex-col items-center py-8">
    <svg width="127" height="34" class="h-8 lg:h-12 w-auto"><use href="#disruptive-wealth-logo"/></svg>
  </div>
  <div class="flex flex-col lg:flex-row-reverse lg:justify-between gap-4 items-center px-7 pb-7">
    <ul class="text-center lg:flex items-center gap-6">
      <?php # foreach([1,2,3] as $item): ?>
        <li>
          <a href="<?= route('legal-notice', $currentLang) ?>" class="block text-white/70 hover:text-white active:text-white py-1 transition-colors"><?= $trans('footer.legal_notice') ?></a>
        </li>
      <?php # endforeach; ?>
    </ul>
    <small>&copy; <?= date("Y") ?> Disruptive Wealth, Inc. All rights reserved</small>
  </div>
  <?php require_once __DIR__ .'/../components/svgSprites.php'; ?>
</footer>
</body>
</html>
