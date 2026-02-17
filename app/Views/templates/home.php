<?php
$pageTitle = $trans('home.title');
$edgeSlides = array_merge($content['edge'], $content['edge'], $content['edge']);
$heroTitles = json_encode([$trans('home.hero.title1'), $trans('home.hero.title2'), $trans('home.hero.title3')]);
require __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/sideDotsNavigation.php';
?>

<!-- Hero Section -->
<section data-nav-index="0" class="nav-section relative text-white w-full overflow-x-hidden">
  <div class="aboslute -z-1 w-full h-full top-0 left-0">
    <img class="background" src="/public/images/background/black-01.webp" alt="" loading="eager" fetchpriority="high">
    <img class="background opacity-0 animate-cycle" src="/public/images/background/black-02.webp" alt="" loading="lazy" style="animation-duration:36s;animation-delay:12s">
    <img class="background opacity-0 animate-cycle" src="/public/images/background/black-03.webp" alt="" loading="lazy" style="animation-duration:36s;animation-delay:24s">
  </div>
  <?php #generateBackground('black-g1',3); ?>
  <div class="block-content min-h-dvh flex-col flex-center relative">
    <h1 class="font-title text-center uppercase bg-clip-text bg-text-white text-[7vw]">
      <?= $trans('home.hero.titleCommon') ?>
      <span id="hero-typing-text" data-texts='<?= $heroTitles ?>'></span>
    </h1>
    <p class="text-center md:text-xl lg:text-3xl max-w-[56ch] mb-12"><?= $trans('home.hero.text') ?></p>
    <div class="flex items-center gap-4">
      <?php foreach($content['hero_ctas'] as $cta): ?>
        <a href="<?= $cta['link'] ?>" class="button lg:text-lg rounded-full <?= (isset($cta['style']) && $cta['style'] === 'secondary') ? 'bg-secondary-100 hover:bg-secondary-200' : '' ?>"><?= $cta['text'] ?></a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- What We Do -->
<section data-nav-index="1" class="nav-section relative">
  <span class="absolute top-0 left-0 size-0" id="platform"></span>
  <div class="aboslute -z-1 w-full h-full top-0 left-0">
    <?php generateBackground('white2',3, true); ?>
  </div>
  <div class="block-content py-16 lg:py-40 min-h-dvh flex-center flex-col">
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:grid-rows-[auto_1fr] gap-10 lg:min-h-[60vh] stagger-parent">
      <h2 class="font-title leading-none uppercase text-center lg:text-left text-4xl md:text-7xl lg:text-9xl lg:col-span-2 slide-up-words-black"><?= $trans('home.we_do.title') ?></h2>
      <?php foreach($content['we_do'] as $item): ?>
      <div class="opacity-stagger <?= $item['containerStyle'] ?>">
        <article class="flex flex-col h-full bg-surface-100 rounded-2xl overflow-hidden">
          <div class="grow">
            <img src="/public/images/home/<?= $item['image'] ?>" alt="" class="w-full h-full object-cover bg-secondary-50" loading="lazy">
          </div>
          <p class="p-2 lg:p-4 text-center text-balance"><?= $item['text'] ?></p>
        </article>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Edge -->
<section data-nav-index="2" class="nav-section relative w-full">
  <span class="absolute top-0 left-0 size-0" id="edge"></span>
  <?php generateBackground('black',3, true); ?>
  <div class="block-content min-h-dvh flex-center flex-col text-white">
    <h2 class="font-title uppercase text-3xl md:text-7xl lg:text-11xl leading-none pl-0.5 mb-4 lg:mb-12 slide-up-words-white"><?= $trans('home.edge.title') ?></h2>
    <ul class="edge-items swiper !overflow-visible w-full linear-swiper">
      <div class="swiper-wrapper">
        <?php foreach($edgeSlides as $item): ?>
          <li class="swiper-slide">
            <div class="overflow-hidden rounded-lg lg:rounded-2xl min-h-[50vh] relative flex flex-col">
              <img src="/public/images/home/<?= $item['image'] ?>" alt="" loading="lazy" class="w-full h-full object-cover grow">
              <div class="p-2 lg:p-4 flex min-h-1/3 items-end w-full absolute bottom-0 left-0 bg-gradient-to-t from-black/80 to-black/0">
                <p class="text-center w-full"><?= $item['text'] ?></p>
              </div>
            </div>
          </li>
        <?php endforeach; ?>
      </div>
    </ul>
  </div>
</section>

<!-- Portfolio -->
<section data-nav-index="3" class="nav-section relative">
  <span class="absolute top-0 left-0 size-0" id="portfolio"></span>
  <?php generateBackground('white2',3, true); ?>
  <div class="block-content py-16 lg:py-40 min-h-dvh flex-center flex-col">
    <h2 class="font-title uppercase text-center text-3xl md:text-7xl lg:text-11xl leading-none pl-0.5 mb-4 lg:mb-12 slide-up-words-black"><?= $trans('home.portfolio.title') ?></h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 2xl:gap-10 stagger-parent">
      <?php foreach($content['portfolio'] as $item): ?>
        <article class="group relative rounded-lg lg:rounded-2xl sm:min-h-[20vh] bg-white hover:bg-brand-100 p-5 lg:px-7 flex-center flex-col gap-2 text-center lg:text-left transition-colors duration-300 slide-up-stagger <?= (isset($item['containerStyle']) ? $item['containerStyle'] : '') ?>">
          <h3 class="w-full font-title uppercase leading-tight text-lg lg:text-xl 2xl:text-3xl text-wrap text-secondary-100 lg:group-first:text-brand-100 group-hover:text-white lg:absolute lg:top-1/2 lg:left-0 lg:px-3 2xl:px-7 lg:-translate-y-1/2 lg:group-hover:opacity-0 transition-op-colors duration-300 lg:duration-200"><?= $item['title'] ?></h3>
          <div class="w-full lg:grid grid-rows-[0fr] group-hover:grid-rows-[1fr] transition-grid-rows duration-300">
            <p class="overflow-hidden w-full text-balance lg:text-surface-100 group-hover:text-surface-100 transition-colors duration-150 lg:px-0.5">
              <span class="font-title uppercase leading-tight text-lg 2xl:text-xl text-white hidden lg:block"><?= $item['title'] ?></span>
              <?= $item['text'] ?>
            </p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
