<?php
$pageTitle = $meta['meta_title'] ?? $trans('investors.title');
$metaDescription = $meta['meta_description'] ?? '';
require __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/fixedBackground.php';
?>

<div class="fixed left-2 right-2 bottom-5 md:left-7 md:right-7 md:bottom-7 flex flex-col md:flex-row justify-between items-center z-10 gap-0">
  <ul id="serv-dots" class="flex gap-2 xs:gap-4 !transform-none"></ul>
  <nav class="absolute top-1/2 md:static flex gap-4 w-full md:w-auto justify-between">
    <button id="serv-prev" class="button rounded-full leading-none gap-2 cursor-pointer -translate-y-1/2 md:translate-none disabled:opacity-0 disabled:pointer-events-none max-md:p-2">
      <svg class="size-5"><use href="#arrow-left"/></svg>
      <span class="hidden md:inline"><?= $trans('common.previous') ?></span>
    </button>
    <button id="serv-next" class="button rounded-full leading-none gap-2 cursor-pointer -translate-y-1/2 md:translate-none disabled:opacity-0 disabled:pointer-events-none max-md:p-2">
      <span class="hidden md:inline"><?= $trans('common.next') ?></span>
      <svg class="size-5"><use href="#arrow-right"/></svg>
    </button>
  </nav>
</div>

<div class="overflow-hidden h-screen">

  <div class="swiper swiper-tt h-screen">
    <div class="swiper-wrapper h-screen">
      <!-- Hero section -->
      <section class="slide-section swiper-slide group h-screen w-full">
        <div class="block-content py-16 lg:py-24 h-full flex-center gap-4 flex-col lg:flex-row">
          <div class="lg:w-1/2 text-center lg:text-left">
            <h2 class="font-khand uppercase bg-clip-text bg-text-black leading-none text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl text-balance es:pt-2"><?= $trans('investors.hero.title') ?></h2>
            <p class="lg:text-xl text-secondary-200 text-balance"><?= $trans('investors.hero.text') ?></p>
            <button class="button rounded-full mt-4 mx-auto lg:mx-0 lg:mt-8 px-7 lg:px-10 bg-white border border-brand-100 text-secondary-200 hover:bg-brand-100 active:bg-brand-100 hover:text-white active:text-white" type="button" id="serv-int-button"><?= $trans('common.know_more') ?></button>
          </div>
          <div class="relative lg:w-1/2">
            <img src="/public/images/services/<?= $content['hero_images']['big'] ?>" alt="" class="rounded-xl md:rounded-2xl lg:min-w-[44vw] relative max-h-[45vh] h-full lg:max-h-none lg:h-auto lg:absolute lg:top-1/2 lg:left-1/5 opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 translate-y-12 group-[&.swiper-slide-fully-visible]:translate-y-0 lg:-translate-y-[calc(50%_-_--spacing(12))] lg:group-[&.swiper-slide-fully-visible]:-translate-y-1/2 transition-op-trans duration-500 delay-200" loading="eager">
            <img src="/public/images/services/<?= $content['hero_images']['small'] ?>" alt="" class="absolute lg:relative rounded-xl md:rounded-2xl w-1/3 bottom-6 lg:bottom-0 -left-6 sm:-left-16 lg:left-0 lg:w-52 xl:w-auto shadow-lg lg:shadow-xl xl:shadow-serv opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 translate-y-12 group-[&.swiper-slide-fully-visible]:translate-y-0 lg:translate-y-22 lg:group-[&.swiper-slide-fully-visible]:translate-y-10 xl:translate-y-20 xl:group-[&.swiper-slide-fully-visible]:translate-y-8 transition-op-trans duration-500 delay-300" loading="eager">
          </div>
        </div>
      </section>

      <!-- Governance section -->
      <section class="slide-section swiper-slide group h-screen w-full">
        <div class="block-content py-16 lg:py-24 h-full flex-center gap-4 flex-col lg:flex-row">
          <div class="lg:w-11/20 text-center lg:text-left">
            <h2 class="font-khand uppercase bg-clip-text bg-text-black leading-none text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl text-balance es:pt-2"><?= $trans('investors.governance.title') ?></h2>
            <p class="lg:text-xl text-secondary-200 text-balance"><?= $trans('investors.governance.text') ?></p>
          </div>
          <div class="lg:w-9/20 flex">
            <img src="/public/images/services/<?= $content['about1_images']['front'] ?>" alt="" class="rounded-xl md:rounded-2xl max-h-[45vh] h-full lg:max-h-none lg:h-auto w-1/2 shadow-lg lg:shadow-xl xl:shadow-serv opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 scale-90 group-[&.swiper-slide-fully-visible]:scale-100 transition-op-trans duration-500 delay-200" loading="lazy">
            <img src="/public/images/services/<?= $content['about1_images']['back'] ?>" alt="" class="rounded-xl md:rounded-2xl max-h-[45vh] h-full lg:max-h-none lg:h-auto w-1/2 -translate-x-8 translate-y-16 shadow-lg lg:shadow-xl xl:shadow-serv opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 scale-90 group-[&.swiper-slide-fully-visible]:scale-100 transition-op-trans duration-500 delay-300" loading="lazy">
          </div>
        </div>
      </section>

      <!-- Foundation section -->
      <section class="slide-section swiper-slide group h-screen w-full">
        <div class="block-content py-16 lg:py-24 h-full flex-center gap-7 lg:gap-4 flex-col">
          <h2 class="font-khand uppercase bg-clip-text bg-text-black leading-none text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl es:pt-2"><?= $trans('investors.foundation.title') ?></h2>
          <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 lg:gap-8 xl:gap-12 w-full">
            <?php foreach($content['foundation'] as $k => $area): ?>
              <li class="flex items-start gap-2 sm:flex-col opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 translate-y-12 group-[&.swiper-slide-fully-visible]:translate-y-0 transition-op-trans duration-300"
              style="transition-delay: calc(200ms + (100ms * <?= $k ?>));">
                <div class="p-2 rounded-lg bg-brand-100 text-white mb-0 lg:mb-4 flex-center shadow-md lg:shadow-xl">
                  <svg class="size-6 lg:size-10"><use href="#<?= $area['image'] ?>"/></svg>
                </div>
                <div>
                  <p class="font-bold sm:text-lg lg:text-xl w-full"><?= $area['text'] ?></p>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>

      <!-- Oversight section -->
      <section class="slide-section swiper-slide group h-screen w-full">
        <div class="block-content py-16 lg:py-24 h-full flex-center gap-7 lg:gap-4 flex-col">
          <h2 class="font-khand uppercase bg-clip-text bg-text-black leading-none text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl es:pt-2"><?= $trans('investors.oversight.title') ?></h2>
          <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6 lg:gap-8 xl:gap-12 w-full">
            <?php foreach($content['oversight'] as $k => $area): ?>
              <li class="flex items-start gap-2 sm:flex-col opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 translate-y-12 group-[&.swiper-slide-fully-visible]:translate-y-0 transition-op-trans duration-300"
              style="transition-delay: calc(200ms + (100ms * <?= $k ?>));">
                <div class="p-2 rounded-lg bg-brand-100 text-white mb-0 lg:mb-4 flex-center shadow-md lg:shadow-xl">
                  <svg class="size-6 lg:size-10"><use href="#<?= $area['image'] ?>"/></svg>
                </div>
                <div>
                  <p class="font-bold sm:text-lg lg:text-xl w-full"><?= $area['text'] ?></p>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </section>

      <!-- Private Accredited section -->
      <section class="slide-section swiper-slide group h-screen w-full">
        <div class="block-content py-16 lg:py-24 h-full flex-center gap-7 lg:gap-4 flex-col lg:flex-row">
          <div class="lg:w-1/2 text-center lg:text-left">
            <h2 class="font-khand uppercase bg-clip-text bg-text-black leading-none text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl text-balance es:pt-2"><?= $trans('investors.private.title') ?></h2>
            <p class="text-white bg-brand-100 px-4 pb-1.5 pt-1.75 mt-2 w-fit font-bold text-lg lg:text-2xl text-balance"><?= $trans('investors.private.subtitle') ?></p>
          </div>
          <div class="relative lg:w-1/2 lg:pr-12">
            <img src="/public/images/services/<?= $content['about2_images']['big'] ?>" alt="" class="rounded-xl md:rounded-2xl mx-auto max-h-[45vh] h-full lg:max-h-none lg:h-auto opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 translate-y-12 group-[&.swiper-slide-fully-visible]:translate-y-0 transition-op-trans duration-500 delay-200" loading="lazy">
            <img src="/public/images/services/<?= $content['about2_images']['mid'] ?>" alt="" class="rounded-xl md:rounded-2xl w-1/2 sm:w-2/3 lg:w-auto absolute -top-4 -right-6 sm:-right-16 lg:-top-8 lg:-right-2 xl:-right-8 shadow-lg lg:shadow-xl xl:shadow-serv opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 scale-90 group-[&.swiper-slide-fully-visible]:scale-100 transition-op-trans duration-500 delay-300" loading="lazy">
            <img src="/public/images/services/<?= $content['about2_images']['small'] ?>" alt="" class="rounded-xl md:rounded-2xl w-2/5 sm:w-1/2 lg:w-auto absolute bottom-8 -left-6 sm:bottom-4 sm:-left-16 lg:bottom-8 lg:-left-4 xl:left-0 shadow-lg lg:shadow-xl xl:shadow-serv opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 scale-90 group-[&.swiper-slide-fully-visible]:scale-100 transition-op-trans duration-500 delay-400" loading="lazy">
          </div>
        </div>
      </section>

      <!-- Profile section -->
      <section class="slide-section swiper-slide h-screen w-full">
        <div class="block-content py-16 lg:py-24 h-full flex-center gap-4 lg:gap-12 flex-col lg:flex-row">
          <div class="lg:w-1/2">
            <h2 class="font-khand uppercase text-center lg:text-left bg-clip-text bg-text-black leading-none text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl es:pt-2"><?= $trans('investors.profile.title') ?></h2>
            <ul id="my-swiper-pagination" class="flex items-center justify-center lg:justify-start gap-2 lg:gap-4 mt-2 lg:mt-6"></ul>
          </div>
          <div class="w-full lg:w-1/2 lg:pr-40">
            <div class="block w-9/10 md:w-full max-w-xs md:max-w-lg lg:max-w-none mx-auto">
              <div class="swiper my-swiper" data-pagination="my-swiper-pagination">
                <div class="swiper-wrapper">
                  <?php foreach($content['profile'] as $item): ?>
                    <article class="swiper-slide slide-ff">
                      <div class="flex-center flex-col text-center lg:text-left h-full bg-secondary-200 text-white rounded-xl">
                        <img src="/public/images/services/<?= $item['image'] ?>" alt="<?= $item['text'] ?>" class="rounded-xl w-full h-[30vh] xl:h-[40vh] object-cover pointer-events-none" loading="lazy">
                        <div class="p-4 md:p-7 xl:p-10">
                          <h3 class="font-title text-lg md:text-xl lg:text-2xl xl:text-4xl leading-tight font-bold mb-2 md:mb-0"><?= $item['text'] ?></h3>
                        </div>
                      </div>
                    </article>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Process section -->
      <section class="slide-section swiper-slide h-screen w-full">
        <div class="block-content py-16 lg:py-24 h-full flex-center gap-7 lg:gap-4 flex-col">
          <h2 class="font-khand uppercase bg-clip-text bg-text-black leading-none text-center text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl es:pt-2"><?= $trans('investors.process.title') ?></h2>
          <p class="text-base xl:text-xl text-center"><?= $trans('investors.process.text') ?></p>
          <div class="depth-slider block w-full md:w-9/10 mx-auto mt-6 lg:mt-10">
            <div class="depth-slides-wrap relative text-center perspective-distant transition-[height]">
              <?php foreach( $content['process'] as $k => $item): ?>
              <article class="slide-depth absolute flex-center gap-4 top-0 left-1/2 w-full h-fit bg-secondary-200 text-white p-4 lg:p-10 rounded-2xl text-xl md:text-4xl lg:text-6xl transition-op-trans duration-300" data-index="<?= $k ?>">
                <span class="font-khand flex-center rounded-full bg-secondary-50 size-12 text-center leading-none text-[80%]" ><?= $k + 1 ?></span>
                <p class="font-khand uppercase leading-tight text-pretty"><?= $item ?></p>
              </article>
              <?php endforeach; ?>
            </div>

            <div class="mt-4 lg:mt-12 flex-center gap-2">
              <button class="prevBtn lg:hidden flex-center bg-surface-100 text-secondary-50 hover:bg-brand-100 active:bg-brand-100 hover:text-white active:text-white p-1 rounded-full cursor-pointer">
                <svg class="size-7"><use href="#chevron-left"/></svg>
              </button>
              <div class="pagination flex gap-1 p-0.5 rounded-full w-fit bg-white"></div>
              <button class="nextBtn lg:hidden flex-center bg-surface-100 text-secondary-50 hover:bg-brand-100 active:bg-brand-100 hover:text-white active:text-white p-1 rounded-full cursor-pointer">
                <svg class="size-7"><use href="#chevron-right"/></svg>
              </button>
            </div>
          </div>
        </div>
      </section>

      <!-- Vision section -->
      <section class="slide-section swiper-slide group h-screen w-full">
        <div class="block-content py-16 lg:py-40 h-full flex-center gap-4 flex-col lg:flex-row">
          <div class="lg:w-1/2 text-center lg:text-left">
            <h2 class="font-khand uppercase bg-clip-text bg-text-black leading-none text-5xl xs:text-7xl sm:text-8xl md:text-11xl xl:text-12xl text-balance es:pt-2"><?= $trans('investors.vision.title') ?></h2>
            <p class="lg:text-xl text-secondary-200 text-balance"><?= $trans('investors.vision.text') ?></p>
            <a href="#" target="_blank" rel="noopener noreferrer" class="button leading-none rounded-full w-fit md:text-xl font-semibold mt-4 mx-auto lg:mt-8 lg:mx-0 px-7 py-4">
              <span class=""><?= $trans('investors.vision.button') ?></span>
            </a>
          </div>
          <div class="relative lg:w-1/2">
            <img src="/public/images/services/<?= $content['sales_images']['big'] ?>" alt="" class="rounded-xl md:rounded-2xl lg:min-w-[44vw] relative max-h-[45vh] h-full lg:max-h-none lg:h-auto lg:absolute lg:top-1/2 lg:left-1/5 opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 translate-y-12 group-[&.swiper-slide-fully-visible]:translate-y-0 lg:-translate-y-[calc(50%_-_--spacing(12))] lg:group-[&.swiper-slide-fully-visible]:-translate-y-1/2 transition-op-trans duration-500 delay-200" loading="lazy">
            <img src="/public/images/services/<?= $content['sales_images']['small'] ?>" alt="" class="absolute lg:relative rounded-xl md:rounded-2xl w-1/3 bottom-6 lg:bottom-0 -left-6 sm:-left-16 lg:left-0 lg:w-52 xl:w-auto shadow-lg lg:shadow-xl xl:shadow-serv opacity-0 group-[&.swiper-slide-fully-visible]:opacity-100 translate-y-12 group-[&.swiper-slide-fully-visible]:translate-y-0 lg:translate-y-22 lg:group-[&.swiper-slide-fully-visible]:translate-y-10 xl:translate-y-20 xl:group-[&.swiper-slide-fully-visible]:translate-y-8 transition-op-trans duration-500 delay-300" loading="lazy">
          </div>
        </div>
      </section>
    </div>
  </div>

</div>

<style>
  .slide-section:not(.swiper-slide-active){
    opacity: 0 !important;
    pointer-events: none !important;
    z-index: -1 !important;
  }
</style>

<?php require __DIR__ . '/../components/svgSprites.php'; ?>
