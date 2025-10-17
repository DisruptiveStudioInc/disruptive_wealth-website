<?php
$pageTitle = $trans('home.title');
$heroSlides = array_merge($content['hero'], $content['hero'], $content['hero']);
$techSlides = array_merge($content['technologies'], $content['technologies'], $content['technologies']);
require __DIR__ . '/../layouts/header.php';
?>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-brand-100 to-brand-200 text-white w-full overflow-x-hidden">
  <img src="/public/images/home/hero.webp" alt="" class="background">
  <div class="block-content max-w-screen-lg min-h-dvh flex-center relative">
    <div id="hero-swiper" data-swiper-autoplay="2000" class="swiper flex w-full !overflow-visible">
      <div class="swiper-wrapper">
        <?php foreach($heroSlides as $slide): ?>
          <article class="swiper-slide !w-max group">
            <div class="relative flex-center flex-col text-center w-max">
              <h2 class="font-title leading-tight uppercase text-[9vw] opacity-30 group-[&.swiper-slide-active]:opacity-100 transition-opacity"><?= $slide['title'] ?></h2>
              <p class="absolute top-full left-1/2 -translate-x-1/2 w-full font-semibold md:text-xl lg:text-3xl opacity-0 group-[&.swiper-slide-active]:opacity-100 transition-opacity"><?= $slide['text'] ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Discover -->
<section class="bg-surface-100">
  <div class="block-content py-16 lg:py-40 min-h-dvh flex flex-col justify-center lg:justify-start">
    <h2 class="font-title leading-none uppercase text-4xl md:text-10xl lg:text-13xl max-w-[9ch] text-center text-secondary-200 mx-auto mb-4 lg:mb-12 slide-up-words"><?= $trans('home.discover') ?></h2>
    <div class="flex-center stagger-parent max-lg:flex-col">
      <ul id="discover-tabs" class="lg:space-y-2 bg-white rounded-4xl p-4 shrink-0 slide-up-stagger">
        <?php foreach($content['discover'] as $k => $item): ?>
          <li data-index="<?= $k ?>" class="discover-tab font-semibold rounded-full p-3 pr-4 flex items-center gap-2 leading-none hover:bg-secondary-100 hover:text-white [&.active]:bg-secondary-200 [&.active]:text-white transition-colors <?= $k === 0 ? 'active' : '' ?>">
            <span class="flex-center aspect-square rounded-full size-7 pt-1 text-white bg-brand-100 shrink-0"><?= $k+1; ?></span>
            <?= $item['title'] ?>
          </li>
        <?php endforeach; ?>
      </ul>
      <svg class="size-20 mx-30 text-secondary-50 slide-up-stagger"><use href="#double-arrow-r"/></svg>
      <div class="relative w-full max-w-xs">
        <div class="w-full lg:absolute top-0 left-0 lg:-translate-y-1/2">
          <aritcle
            id="discover-content"
            class="block w-full p-6 bg-brand-100 text-white text-center rounded-2xl slide-up-stagger"
            data-content="<?= htmlspecialchars(json_encode($content['discover']), ENT_QUOTES, 'UTF-8') ?>"
          >
            <svg class="size-16 mx-auto mb-4"><use href="#<?= $content['discover'][0]['icon'] ?>"/></svg>
            <h3 class="font-semibold text-xl mb-2"><?= $content['discover'][0]['title'] ?></h3>
            <p class=""><?= $content['discover'][0]['text'] ?></p>
          </aritcle>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Builder & About -->
<div class="lateral-sections w-[200%] flex">
  <section class="l-section relative w-full bg-secondary-50">
    <img src="/public/images/home/builders-bg.webp" alt="" class="background">
    <div class="block-content min-h-dvh flex-center flex-col text-white">
      <div class="builder-content flex-center flex-col text-center">
        <p class="uppercase md:text-lg lg:text-5xl mb-2"><?= $trans('home.builder') ?></p>
        <p class="font-title text-2xl md:text-3xl lg:text-7xl leading-tight uppercase mb-8"><?= $trans('home.builder_big') ?></p>
        <a href="<?= route('contact', $currentLang) ?>" class="button w-fit bg-brand-100 text-white text-lg lg:text-xl rounded-full font-semibold px-7 py-3 hover:bg-brand-200 transition-colors">
          <?= $trans('common.learn_more') ?>
        </a>
      </div>
    </div>
  </section>

  <section class="section-about l-section w-full relative overflow-hidden">
    <div class="block-content min-h-dvh flex max-lg:flex-col max-lg:justify-center lg:items-center">
      <div class="about-content sm:w-4/5 lg:w-2/5 py-16">
        <h2 class="font-title uppercase text-3xl md:text-7xl lg:text-11xl leading-none text-secondary-200"><?= $trans('home.about.title') ?></h2>
        <p class="my-6 lg:text-xl"><?= $trans('home.about.text') ?></p>
        <p class="font-title uppercase text-lg md:text-xl lg:text-3xl leading-tight text-secondary-200"><?= $trans('home.about.big') ?></p>
      </div>
      <div class="w-[60vw] lg:absolute left-1/2 top-1/2 translate-y-1/4 lg:-translate-y-1/2">
        <img src="/public/images/home/about.webp" alt="" class="about-image rounded-4xl">
      </div>
    </div>
  </section>
</div>

<!-- Tech -->
<section class="bg-brand-100 w-full overflow-x-hidden">
  <div class="block-content min-h-dvh py-12 lg:py-40 flex-center flex-col">
    <h2 class="font-title leading-none uppercase text-4xl md:text-10xl lg:text-13xl text-center text-white mb-4 lg:mb-12 slide-up-words"><?= $trans('home.technology') ?></h2>
    <div id="tech-swiper" class="swiper flex w-full max-w-screen-md !overflow-visible">
      <div class="swiper-wrapper !h-full">
        <?php foreach($techSlides as $slide): ?>
          <article class="swiper-slide group !h-auto flex ">
            <div class="relative flex-center flex-col h-full text-center bg-secondary-100/80 text-white p-10 rounded-2xl group-[&.swiper-slide-active]:bg-secondary-200 transition-colors">
              <h2 class="font-title leading-tight uppercase text-2xl md:text-3xl lg:text-5xl opacity-30 group-[&.swiper-slide-active]:opacity-100 transition-opacity"><?= $slide['title'] ?></h2>
              <p class="md:text-xl lg:text-3xl opacity-30 group-[&.swiper-slide-active]:opacity-100 transition-opacity"><?= $slide['text'] ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Banner -->
<section class="bg-secondary-200 text-white">
  <div class="block-content py-16 lg:py-40">
    <h2 class="font-title leading-none uppercase text-4xl md:text-10xl lg:text-13xl slide-up-words"><?= $trans('home.we_are') ?></h2>
  </div>
</section>

<!-- Team -->
<section>
  <div class="block-content py-16 lg:py-40">
    <p class="font-title uppercase text-brand-100 text-4xl text-center mb-6 slide-up"><?= $trans('home.team') ?></p>
    <h2 class="font-title leading-none uppercase text-4xl md:text-10xl lg:text-12xl xl:text-13xl text-center text-secondary-200 mb-4 lg:mb-12 slide-up-words"><?= $trans('home.team_big') ?></h2>
    <ul class="flex-center max-lg:flex-wrap gap-4 lg:gap-7 stagger-parent max-w-md md:max-w-none mx-auto">
      <?php foreach($content['team'] as $item): ?>
        <li class="relative aspect-member flex items-end slide-up-stagger w-full md:w-[calc(50%_-_--spacing(2))] lg:w-full drop-shadow-xl drop-shadow-grey-100/50 rounded-2xl after:absolute after:w-full after:h-full after:bg-gradient-to-t after:from-black/60 after:from-20% after:to-black/0 after:to-60% after:mix-blend-multiply overflow-hidden">
          <img src="/public/images/<?= 'daniel-cruz' ?>.png" alt="<?= $item['name'] ?>" class="background">
          <div class="relative p-4 md:p-6 xl:p-10 text-white z-1">
            <h3 class="font-title text-lg lg:text-xl"><?= $item['name'] ?></h3>
            <p class="my-2 lg:my-6"><?= $item['job'] ?></p>
            <p class="hidden sm:block"><?= $item['text'] ?></p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- Stats -->
<section class="bg-linear-to-t from-white via-surface-50 via-50% to-white">
  <div class="block-content py-16 lg:py-40">
    <h2 class="font-title text-center leading-tight uppercase text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-secondary-200 lg:mb-4 slide-up-words"><?= $trans('home.statistics.title') ?></h2>
    <p class="text-center lg:text-xl text-secondary-200 mb-10 lg:mb-28"><?= $trans('home.statistics.text') ?></p>
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 max-w-md md:max-w-none mx-auto">
      <?php foreach($content['stats'] as $item): ?>
        <li class="bg-white rounded-2xl p-4 md:p-6 lg:p-10 drop-shadow-lg drop-shadow-grey-100/10">
          <h2 class="text-center font-bold mb-4 leading-tight">
            <span class="block text-7xl lg:text-9xl text-brand-100"><?= $item['number'] ?></span>
            <span class="block text-3xl lg:text-5xl text-secondary-200"><?= $item['title'] ?></span>
          </h2>
          <p class="md:font-light text-xl"><?= $item['text'] ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- Ecosystem -->
<section>
  <div class="block-content py-16 lg:py-40">
    <h2 class="font-title text-center leading-tight uppercase text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-secondary-200 lg:mb-4 slide-up-words"><?= $trans('home.ecosystem.title') ?></h2>
    <p class="text-center lg:text-xl text-secondary-200 mx-auto max-w-[72ch]"><?= $trans('home.ecosystem.text') ?></p>

    <div class="flex-center flex-col my-10 lg:my-28 relative pt-12 lg:py-30">
      <div class="flex-center relative w-full mb-10 lg:mb-0">
        <div class="absolute top-1/2 left-1/2 -translate-1/2 aspect-square rounded-full w-2/5 bg-brand-100/10"></div>
        <div class="absolute top-1/2 left-1/2 -translate-1/2 aspect-square rounded-full w-3/10 bg-brand-100/10"></div>
        <div class="relative flex-center bg-brand-100 text-white aspect-square rounded-full p-4 w-1/5 min-w-41">
          <p class="font-light leading-tight text-center text-lg md:text:xl lg:text-3xl xl:text-4xl"><?= $trans('home.ecosystem.circle') ?></p>
        </div>
      </div>
      <ul class="[--radius:240px] lg:[--radius:340px] max-lg:grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 gap-5" style="--total:<?= count($ecosystem); ?>">
        <?php foreach($ecosystem as $k => $item): ?>
          <li class="disr-vertical lg:absolute lg:top-1/2 lg:left-1/2 max-lg:transform-none" style="--i:<?= $k+1; ?><?= ($k === 0 || $k === 3) ? ';--r-alt:-40px' : '' ?>">
            <a href="<?= serviceRoute($item['key'], $currentLang) ?>">
              <div class="bg-white rounded-2xl px-5 py-4 drop-shadow-lg drop-shadow-grey-100/10 origin-center hover:ring-3 ring-brand-100 transition-shadow">
                <svg width="379" height="99" class="h-10 lg:h-13 w-auto"><use href="#disruptive-<?= $item['key'] ?>-logo" /></svg>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <p class="font-bold text-center text-xl sm:text-3xl lg:text-5xl text-secondary-200 mx-auto max-w-[24ch]"><?= $trans('home.ecosystem.big') ?></p>
  </div>
</section>

<!-- Services -->
<section class="bg-brand-100 text-white overflow-x-hidden">
  <div class="block-content lg:min-h-dvh lg:max-w-none lg:px-0 py-16 lg:py-40 flex-center flex-col lg:flex-row lg:justify-end gap-10 lg:gap-0">
    <div class="half max-lg:max-w-none lg:pr-12 w-full lg:w-1/2 text-center lg:text-left">
      <h2 class="font-title uppercase leading-tight text-2xl md:text-6xl lg:text-9xl xl:text-11xl slide-up-words"><?= $trans('home.our_services') ?></h2>
      <p class="lg:text-2xl slide-up"><?= $trans('home.services_text') ?></p>
      <nav class="flex gap-2 justify-center lg:justify-start">
        <button class="subcategories-button-prev cursor-pointer text-secondary-100/80 hover:text-white active:text-white [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-30 p-2 transition-opacity">
          <svg class="size-8 transition-colors"><use href="#arrow-left"/></svg>
        </button>
        <button class="subcategories-button-next cursor-pointer text-secondary-100/80 hover:text-white active:text-white [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-30 p-2 transition-opacity">
          <svg class="size-8 transition-colors"><use href="#arrow-right"/></svg>
        </button>
      </nav>
    </div>
    <div class="w-full lg:w-1/2 px-2 lg:pl-0 lg:pr-[27%] lg:py-34 lg:overflow-x-hidden overflow-y-visible h-full max-lg:min-h-110 max-w-lg lg:max-w-none flex items-end">
      <div id="subcategories-swiper" data-swiper-autoplay="2000" class="swiper flex w-full !overflow-visible items-end lg:items-center">
        <div class="swiper-wrapper !h-full !overflow-visible">
          <?php foreach($subcategories as $slide): ?>
            <article class="swiper-slide group !h-auto !overflow-visible">
              <div class="relative flex flex-col rounded-2xl h-full bg-secondary-200 p-10 !overflow-visible group-[&.swiper-slide-active]:translate-y-7/20 transition-transform">
                <img src="" alt="cover" class="aspect-video w-full absolute top-0 left-0 rounded-2xl bg-grey-100 opacity-0 group-[&.swiper-slide-active]:opacity-100 group-[&.swiper-slide-active]:-translate-y-[calc(100%_-_--spacing(6))] transition-op-trans duration-300">
                <h2 class="font-title leading-tight uppercase text-xl mb-4"><?= $slide['name'] ?></h2>
                <p class=""><?= $slide['description'] ?></p>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- IP -->
<section class="bg-brand-100 text-white">
  <div class="block-content pt-12 pb-16 lg:pb-40">
    <h2 class="font-title uppercase leading-tight text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-center slide-up-words"><?= $trans('home.ip.title') ?></h2>
    <p class="lg:text-2xl text-center my-6 slide-up"><?= $trans('home.ip.text') ?></p>
    <p class="font-bold text-center text-xl sm:text-3xl lg:text-5xl mb-6 lg:mb-12"><?= $trans('home.ip.big') ?></p>

    <div id="ips-swiper" data-swiper-autoplay="2000" class="swiper w-full bg-white text-grey-100 rounded-2xl lg:rounded-4xl">
      <div class="swiper-wrapper">
        <?php foreach($ips as $slide): ?>
          <article class="swiper-slide">
            <div class="p-4 md:p-10 flex flex-col lg:flex-row-reverse items-center">
              <img src="/public/images/home/about.webp" alt="" class="w-full lg:w-1/2 rounded-2xl">
              <div class="w-full lg:w-1/2 lg:pr-10 text-center lg:text-left mt-4 md:mt-10 lg:mt-0">
                <h2 class="font-title leading-tight uppercase text-secondary-200 text-2xl md:text-4xl lg:text-6xl"><?= $slide['meta']['meta_title'] ?></h2>
                <p class="lg:text-xl mb-4"><?= $slide['meta']['meta_description'] ?></p>
                <a href="<?= serviceRoute($slide['key'], $currentLang) ?>" class="button w-fit bg-brand-100 text-white text-lg lg:text-xl rounded-full font-semibold px-7 py-3 mx-auto lg:mx-0 hover:bg-brand-200 transition-colors">
                  <?= $trans('common.view_more') ?>
                </a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="ips-pagination !transform-none mx-auto mt-4 [--swiper-pagination-bullet-size:1rem] [--swiper-pagination-color:var(--color-glow)]"></div>
  </div>
</section>

<!-- Cases -->
<section id="cases-section" class="bg-secondary-200 text-brand-100">
  <div class="block-content py-16">
    <h2 class="font-title uppercase leading-tight text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-white text-center slide-up-words"><?= $trans('home.cases.title') ?></h2>
  </div>
  <?php foreach($content['cases'] as $item): ?>
    <article class="case lg:hover:bg-brand-100 group transition-colors py-12 lg:py-16 min-h-[30dvh] flex flex-col lg:flex-row items-center relative duration-300 z-1 isolate">
      <h3 class="lg:absolute lg:top-1/2 lg:left-0 lg:-translate-y-1/2 lg:pt-4 xl:pt-7 font-title uppercase text-center text-4xl lg:text-[9.5vw] leading-none w-full lg:group-hover:opacity-0 lg:group-hover:pointer-events-none transition-opacity -z-1"><?= $item['name'] ?></h3>
      <div class="block-content max-w-screen-lg flex flex-col lg:flex-row w-full lg:pointer-events-none lg:opacity-0 lg:group-hover:opacity-100 lg:group-hover:pointer-events-auto lg:translate-y-2 lg:group-hover:translate-y-0 transition-op-trans duration-300">
        <div class="w-full lg:w-1/2 relative my-6 lg:my-0">
          <div class="case-image w-1/2 lg:w-4/5 max-w-52 lg:max-w-none lg:absolute lg:top-1/2 left-1/2 lg:-translate-1/2 flex-center p-4 rounded-full aspect-square bg-white drop-shadow-xl drop-shadow-black/40 mx-auto lg:mx-0 z-5">
            <img src="/public/images/clients/<?= $item['image'] ?>.png" alt="<?= $item['name'] ?>">
          </div>
        </div>
        <div class="w-full lg:w-1/2">
          <div class="text-white">
            <p class="hidden lg:block font-title uppercase leading-tight text-lg lg:text-2xl mb-4"><?= $item['name'] ?></p>
            <p class="text-lg lg:text-2xl text-center lg:text-left max-w-[40ch] lg:max-w-none mx-auto lg:mx-0"><?= $item['text'] ?></p>
          </div>
        </div>
      </div>
    </article>
  <?php endforeach; ?>
</section>

<!-- Clients -->
<section>
  <div class="block-content py-16 lg:py-40">
    <h2 class="font-title text-center leading-tight uppercase text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-secondary-200 lg:mb-4 slide-up-words"><?= $trans('home.clients.title') ?></h2>
    <p class="text-center md:text-lg lg:text-2xl text-secondary-200 mx-auto max-w-[58ch]"><?= $trans('home.clients.text') ?></p>


  </div>
</section>

<!-- Clients -->
<section class="bg-brand-100 text-white">
  <div class="block-content py-16 lg:py-40">
    <h2 class="font-title text-center leading-tight uppercase text-2xl md:text-6xl lg:text-9xl xl:text-11xl lg:mb-4 slide-up-words"><?= $trans('home.partners.title') ?></h2>
    <p class="text-center md:text-lg lg:text-2xl mx-auto max-w-[52ch]"><?= $trans('home.partners.text') ?></p>


  </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
