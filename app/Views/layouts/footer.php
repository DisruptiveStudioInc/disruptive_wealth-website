</main>

<footer class="bg-secondary-100 text-white">
  <div class="block-content flex flex-col lg:flex-row-reverse lg:justify-between items-center pt-12 lg:pb-12">
    <svg width="127" height="34" class="h-12 lg:h-16 w-auto mb-8 lg:mb-0"><use href="#disruptive-studio-logo"/></svg>
    <div class="flex flex-col lg:flex-row gap-4 lg:gap-8">
      <?php foreach([1,2,3] as $item): ?>
        <article>
          <h4 class="text-lg lg:text-2xl font-bold mb-2 lg:mb-4"><?= $trans('footer.about') ?></h4>
          <ul class="flex flex-col gap-1">
            <?php foreach([1,2,3] as $list): ?>
              <li>
                <a href="#" class="hover:text-brand-100 active:text-brand-100 transition-colors"><?= $trans('footer.contact') ?></a>
              </li>
            <?php endforeach; ?>
          </ul>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="flex flex-col lg:flex-row-reverse lg:justify-between gap-4 items-center p-7">
    <ul class="text-center lg:flex items-center gap-6">
      <?php foreach([1,2,3] as $item): ?>
        <li>
          <a href="#" class="block text-white/70 hover:text-white active:text-white py-1 transition-colors"><?= $trans('footer.privacy') ?></a>
        </li>
      <?php endforeach; ?>
    </ul>
    <small>&copy; <?= date("Y") ?> Disruptive Studio</small>
  </div>
  <?php require_once __DIR__ .'/../components/svgSprites.php'; ?>
</footer>
</body>
</html>
