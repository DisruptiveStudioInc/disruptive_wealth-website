<?php
$pageTitle = $trans('home.title');
$heroSlides = array_merge($content['hero'], $content['hero'], $content['hero']);
$techSlides = array_merge($content['technologies'], $content['technologies'], $content['technologies']);
list($clients1, $clients2, $clients3, $clients4) = split_array_in_quarters($constants['clients']);
require __DIR__ . '/../layouts/header.php';
include __DIR__ . '/../components/sideDotsNavigation.php';
include __DIR__ . '/../components/fixedBackground.php';
?>

<!-- Hero Section -->
<section data-nav-index="0" class="nav-section relative text-secondary-200 w-full overflow-x-hidden">
  <div class="block-content max-w-screen-lg min-h-dvh flex-center relative">
    <div id="hero-swiper" data-swiper-autoplay="2000" class="swiper flex w-full !overflow-visible">
      <div class="swiper-wrapper">
        <?php foreach($heroSlides as $slide): ?>
          <article class="swiper-slide !w-max group">
            <div class="relative flex-center flex-col text-center w-max">
              <h2 class="font-title leading-tight uppercase bg-clip-text bg-text-black text-[9vw] opacity-30 group-[&.swiper-slide-active]:opacity-100 transition-opacity"><?= $slide['title'] ?></h2>
              <p class="absolute top-full left-1/2 -translate-x-1/2 w-full font-semibold md:text-xl lg:text-3xl opacity-0 group-[&.swiper-slide-active]:opacity-100 transition-opacity"><?= $slide['text'] ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- Discover -->
<section data-nav-index="1" class="nav-section bg-surface-100">
  <div class="block-content py-16 lg:py-40 min-h-dvh flex flex-col justify-center lg:justify-start">
    <h2 class="font-title leading-none uppercase text-4xl md:text-10xl lg:text-13xl max-w-[9ch] text-center mx-auto mb-4 lg:mb-12 xl:mb-20 slide-up-words-black"><?= $trans('home.discover') ?></h2>
    <div class="flex-center stagger-parent max-lg:flex-col">
      <ul id="discover-tabs" class="lg:space-y-2 bg-white rounded-4xl p-4 shrink-0 slide-up-stagger">
        <?php foreach($content['discover'] as $k => $item): ?>
          <li data-index="<?= $k ?>" data-animation="<?= $item['animation'] ?>" class="discover-tab font-semibold rounded-full p-3 pr-4 flex items-center gap-2 leading-none cursor-pointer lg:text-xl xl:text-2xl hover:bg-secondary-100 hover:text-white [&.active]:bg-secondary-200 [&.active]:text-white transition-colors <?= $k === 0 ? 'active' : '' ?>">
            <span class="flex-center aspect-square rounded-full size-7 lg:size-9 pt-1 text-white bg-brand-100 shrink-0"><?= $k+1; ?></span>
            <?= $item['title'] ?>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="slide-up-stagger">
        <svg class="size-36 lg:h-auto lg:w-60 xl:w-80 my-4 lg:my-0 lg:mx-6 max-lg:rotate-90" width="473" height="264" viewBox="0 0 473 264" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path id="motion-up" d="M0.167969 11.7738H58.2951C73.2068 11.7738 85.2951 23.8621 85.2951 38.7738V105C85.2951 119.912 97.3834 132 112.295 132H472" stroke="transparent"/>
          <path id="motion-down" d="M0.167969 252.226H58.2951C73.2068 252.226 85.2951 240.138 85.2951 225.226V159C85.2951 144.088 97.3834 132 112.295 132H472" stroke="transparent"/>
          <path d="M0.167969 11.2734V12.2734H58.2949C72.9304 12.2734 84.7947 24.138 84.7949 38.7734V105C84.7951 118.397 94.3757 129.554 107.059 132C94.3755 134.446 84.7949 145.603 84.7949 159V225.227C84.7949 239.862 72.9305 251.727 58.2949 251.727H0.167969V252.727H58.2949C73.4828 252.727 85.7949 240.415 85.7949 225.227V159C85.7949 144.364 97.6594 132.5 112.295 132.5H174.477V131.5H112.295C97.6595 131.5 85.7951 119.636 85.7949 105V38.7734C85.7947 23.5858 73.4826 11.2734 58.2949 11.2734H0.167969ZM382.479 131.5V132.5H472.215V131.5H382.479Z" fill="#979797"/>
          <path id="ball-last" class="hidden" d="M387.399 143.432C393.712 143.432 398.831 138.314 398.831 132C398.831 125.686 393.712 120.568 387.399 120.568C381.085 120.568 375.967 125.686 375.967 132C375.967 138.314 381.085 143.432 387.399 143.432Z" fill="#6937FF"/>
          <path id="ball-up" class="opacity-0" d="M11.5999 23.2057C17.9135 23.2057 23.0318 18.0875 23.0318 11.7738C23.0318 5.46016 17.9135 0.341919 11.5999 0.341919C5.2862 0.341919 0.167969 5.46016 0.167969 11.7738C0.167969 18.0875 5.2862 23.2057 11.5999 23.2057Z" fill="#6937FF"/>
          <path id="ball-down" class="opacity-0" d="M11.5999 263.626C17.9135 263.626 23.0318 258.508 23.0318 252.194C23.0318 245.88 17.9135 240.762 11.5999 240.762C5.2862 240.762 0.167969 245.88 0.167969 252.194C0.167969 258.508 5.2862 263.626 11.5999 263.626Z" fill="#6937FF"/>
          <g id="disr-coin-logo" class="max-lg:-rotate-90 max-lg:translate-y-10 max-lg:translate-x-10 origin-center">
            <path d="M358.479 132C358.479 87.8172 322.661 52 278.479 52C234.296 52 198.479 87.8172 198.479 132C198.479 176.183 234.296 212 278.479 212C322.661 212 358.479 176.183 358.479 132Z" fill="#6937FF"/>
            <path d="M315.53 107.592C314.875 106.891 314.197 106.19 313.52 105.511C308.5 100.454 302.75 95.8173 296.397 91.7309C289.98 87.6229 283.316 84.3343 276.587 81.9514C275.705 81.6387 274.824 81.3476 273.953 81.0673C265.709 78.4472 257.088 79.5686 249.693 84.2265C242.233 88.9059 236.966 96.5397 234.881 105.726C234.644 106.761 234.419 107.807 234.214 108.853C232.731 116.347 231.979 124.131 231.979 131.992C231.979 139.852 232.731 147.669 234.214 155.163C234.419 156.208 234.644 157.244 234.881 158.279C236.966 167.454 242.222 175.088 249.682 179.768C254.476 182.776 259.775 184.318 265.15 184.318C268.084 184.318 271.029 183.865 273.941 182.938C274.823 182.657 275.704 182.366 276.596 182.053C283.325 179.66 289.991 176.371 296.408 172.274C302.664 168.285 308.425 163.637 313.52 158.505C314.187 157.837 314.852 157.157 315.497 156.467C321.602 149.987 324.968 141.318 324.979 132.046C324.979 122.773 321.635 114.082 315.54 107.581L315.53 107.592ZM308.898 148.122C308.307 148.758 307.694 149.383 307.06 150.019C302.32 154.796 296.967 159.109 291.141 162.829C285.132 166.667 278.919 169.74 272.674 171.961C271.868 172.252 271.051 172.522 270.245 172.77C264.817 174.495 259.141 173.751 254.272 170.689C249.349 167.594 245.877 162.548 244.49 156.467C244.275 155.518 244.071 154.559 243.878 153.588C242.502 146.623 241.803 139.356 241.803 132.002C241.803 128.531 242.093 112.39 251.746 109.608C252.584 109.489 253.423 109.403 254.261 109.403C256.196 109.403 258.142 109.705 260.055 110.309C260.861 110.567 261.667 110.837 262.473 111.117C268.718 113.338 274.931 116.411 280.919 120.239C285.723 123.334 290.141 126.773 294.129 130.461C294.709 131.345 294.602 132.294 294.215 132.951C293.903 133.469 293.258 134.029 291.915 135.399C290.464 136.747 288.97 138.062 287.422 139.313C282.907 135.97 267.042 125.328 258.518 122.514C255.368 121.468 253.992 123.927 253.455 125.803C252.208 130.137 252.746 145.922 255.766 155.95C255.777 155.993 255.798 156.025 255.809 156.068C256.766 159.174 258.421 161.427 260.012 162.484C260.012 162.484 263.226 164.64 267.45 163.594C273.05 161.352 278.597 158.527 283.961 155.098C289.808 151.367 295.192 147.044 300.04 142.31C300.126 142.224 300.213 142.127 300.299 142.041C300.901 141.437 305.405 137.663 305.19 132.035C305.071 128.843 303.62 125.889 301.266 123.042C300.31 121.889 299.17 120.81 297.902 119.765C294.312 116.562 290.474 113.576 286.207 110.826C279.79 106.718 273.126 103.43 266.397 101.047C265.515 100.734 264.634 100.443 263.763 100.163C258.453 98.4805 253.004 98.4051 247.812 99.7744C249.403 97.2622 251.875 94.8469 254.283 93.3374C257.432 91.3643 260.915 90.3508 264.451 90.3508C266.386 90.3508 268.332 90.6527 270.245 91.2565C271.051 91.5152 271.857 91.7848 272.663 92.0651C278.908 94.2863 285.121 97.3592 291.109 101.187C297.031 105.004 302.395 109.317 307.049 114.007C307.683 114.643 308.296 115.29 308.909 115.937C312.929 120.228 315.143 125.954 315.143 132.067C315.143 138.17 312.918 143.884 308.887 148.154L308.898 148.122ZM277.027 146.634C275.189 147.755 273.341 148.812 271.47 149.782C271.158 149.933 270.846 150.084 270.566 150.214C270.566 150.214 265.579 152.596 264.536 149.329C262.612 143.313 263.579 137.836 263.579 137.836C263.579 137.836 270.471 141.491 277.027 146.623V146.634Z" fill="white"/>
          </g>
        </svg>
      </div>

      <div class="relative w-full max-w-3xs xl:max-w-2xs">
        <div class="w-full lg:absolute top-0 left-0 lg:-translate-y-1/2">
          <aritcle
            id="discover-content"
            class="block w-full p-6 bg-brand-100 text-white text-center rounded-2xl slide-up-stagger transform-3d"
            data-content="<?= htmlspecialchars(json_encode($content['discover']), ENT_QUOTES, 'UTF-8') ?>"
          >
            <div class="discover-content-wrap backface-hidden">
              <svg class="size-16 mx-auto mb-4"><use href="#<?= $content['discover'][0]['icon'] ?>"/></svg>
              <h3 class="font-semibold text-xl xl:text-2xl mb-2"><?= $content['discover'][0]['title'] ?></h3>
              <p class=""><?= $content['discover'][0]['text'] ?></p>
            </div>
          </aritcle>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Builder -->
<section data-nav-index="2" class="nav-section relative w-full bg-secondary-50">
  <img src="/public/images/home/hero.webp" alt="" class="background" loading="lazy">
  <div class="background bg-black/40"></div>
  <div class="block-content min-h-dvh flex-center flex-col text-white">
    <div class="stagger-parent flex-center flex-col text-center">
      <p class="uppercase md:text-lg lg:text-5xl mb-2 slide-up-stagger"><?= $trans('home.builder') ?></p>
      <p class="font-title bg-clip-text bg-text-white text-white/30 text-2xl md:text-3xl lg:text-7xl leading-tight uppercase mb-8 slide-up-stagger"><?= $trans('home.builder_big') ?></p>
      <?php if(false): ?>
        <a href="<?= route('contact', $currentLang) ?>" class="button w-fit bg-brand-100 text-white text-lg lg:text-xl rounded-full font-semibold px-7 py-3 hover:bg-brand-200 transition-colors slide-up-stagger">
          <?= $trans('common.learn_more') ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- About -->
<section data-nav-index="3" class="nav-section section-about l-section w-full relative bg-white/60 backdrop-blur-sm overflow-hidden">
  <div class="block-content about-content min-h-dvh flex-center flex-col text-center">
    <h2 class="font-title uppercase text-3xl md:text-7xl lg:text-13xl leading-none pl-0.5 slide-up-words-black"><?= $trans('home.about.title') ?></h2>
    <p class="max-w-[46ch] mx-auto my-6 lg:text-xl slide-up"><?= $trans('home.about.text') ?></p>
    <p class="font-title uppercase text-lg md:text-xl lg:text-3xl leading-tight text-secondary-200 max-w-[28ch] mx-auto slide-up"><?= $trans('home.about.big') ?></p>
  </div>
</section>

<!-- Tech -->
<section data-nav-index="4" class="nav-section bg-brand-100 w-full overflow-x-hidden">
  <div class="block-content min-h-dvh py-12 lg:py-40 flex-center flex-col">
    <h2 class="font-title leading-none uppercase text-4xl md:text-10xl lg:text-13xl text-center text-white mb-4 lg:mb-12 slide-up-words-white"><?= $trans('home.technology') ?></h2>
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
<section data-nav-index="5" class="nav-section bg-secondary-200 text-white">
  <div class="block-content py-16 lg:py-40">
    <h2 class="banner-text font-title leading-none uppercase text-4xl md:text-10xl lg:text-13xl slide-up-words-white"><?= $trans('home.we_are') ?></h2>
  </div>
</section>

<!-- Team -->
<section data-nav-index="6" class="nav-section bg-white/60 backdrop-blur-sm">
  <div class="block-content py-16 lg:py-40">
    <p class="font-title uppercase text-brand-100 text-4xl text-center mb-6 slide-up"><?= $trans('home.team') ?></p>
    <h2 class="font-title leading-none uppercase text-4xl md:text-10xl lg:text-12xl xl:text-13xl text-center text-secondary-200 mb-4 lg:mb-12 slide-up-words"><?= $trans('home.team_big') ?></h2>
    <ul class="flex-center flex-wrap gap-7">
      <?php foreach($content['team_members'] as $item): ?>
        <li class="relative group aspect-member flex items-end w-full xs:w-[calc(50%_-_--spacing(3.5))] md:w-[calc(30%_-_--spacing(3.5))] lg:w-[calc(19%_-_--spacing(3.5))] drop-shadow-xl drop-shadow-grey-100/50 rounded-2xl after:absolute after:w-full after:h-full after:bg-gradient-to-t after:from-black/60 after:from-20% after:to-black/0 after:to-60% after:mix-blend-multiply overflow-hidden">
          <img src="/public/images/team/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" class="background" loading="lazy">
          <div class="relative p-4 xl:p-6 text-white z-1">
            <h3 class="font-title text-lg xl:text-xl"><?= $item['name'] ?></h3>
            <p class="text-base xs:text-xs lg:text-base"><?= $item['job'] ?></p>
            <div class="grid grid-rows-[0fr] group-hover:grid-rows-[1fr] transition-grid-rows duration-300">
              <div class="overflow-hidden">
                <p class="text-xs xl:text-sm hidden lg:block pt-4"><?= $item['description'] ?></p>
              </div>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- Stats -->
<section data-nav-index="7" class="nav-section bg-linear-to-t from-white via-surface-50 via-50% to-white">
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
<section data-nav-index="8" class="nav-section bg-white/60 backdrop-blur-sm">
  <div class="block-content py-16 lg:py-40">
    <h2 class="font-title text-center leading-tight uppercase text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-secondary-200 lg:mb-4 slide-up-words"><?= $trans('home.ecosystem.title') ?></h2>
    <p class="text-center lg:text-xl text-secondary-200 mx-auto max-w-[72ch] slide-up"><?= $trans('home.ecosystem.text') ?></p>

    <div class="flex-center flex-col my-10 lg:my-28 relative pt-12 lg:py-36">
      <div class="flex-center relative w-full mb-10 lg:mb-0">
        <div class="circle-expansion absolute top-1/2 left-1/2 -translate-1/2 aspect-square rounded-full w-2/5 bg-brand-100/10"></div>
        <div class="circle-expansion absolute top-1/2 left-1/2 -translate-1/2 aspect-square rounded-full w-3/10 bg-brand-100/10"></div>
        <div id="ecosystem-circle" class="relative flex-center bg-brand-100 text-white aspect-square rounded-full p-4 w-1/5 min-w-41 z-2">
          <p class="font-light leading-tight text-center text-lg md:text:xl lg:text-3xl xl:text-4xl"><?= $trans('home.ecosystem.circle') ?></p>
        </div>
      </div>
      <ul id="disr-verticals" class="[--radius:380px] max-lg:grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 gap-5" style="--total:<?= count($ecosystem); ?>">
        <?php foreach($ecosystem as $k => $item): ?>
          <li class="disr-vertical lg:absolute lg:top-1/2 lg:left-1/2 max-lg:transform-none" style="--i:<?= $k+1; ?>
            <?= ($k === 0 || $k === 3 || $k === 4) ? ';--r-alt:-60px' : '' ?>"
          >
            <a href="<?= serviceRoute($item['key'], $currentLang) ?>">
              <div class="bg-white rounded-2xl px-5 py-4 drop-shadow-lg drop-shadow-grey-100/10 origin-center hover:ring-3 ring-brand-100 transition-shadow">
                <svg width="379" height="99" class="h-10 lg:h-13 w-auto">
                  <use href="#disruptive-<?= $item['key'] ?>-logo" />
                  <?php if($item['key'] === 'corpsyte'): ?>
                  <defs>
                    <linearGradient id="linear_grad_corpsyte" x1="67.6632" y1="94.8276" x2="67.6632" y2="27.4456" gradientUnits="userSpaceOnUse">
                      <stop stop-color="#16A9F3"/>
                      <stop offset="1" stop-color="#11E6D0"/>
                    </linearGradient>
                    <mask id="mask_corpsyte" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="45" y="27" width="45" height="68">
                      <path d="M78.5814 27.4448C72.3886 27.4448 67.3602 32.4727 67.3602 38.6912V72.3573C67.3602 84.5819 57.627 94.4994 45.498 94.8272C53.4585 94.7083 60.9101 92.5452 67.3602 88.8182C74.1812 84.8619 79.8624 79.1807 83.8216 72.3573C87.6395 65.7684 89.8278 58.0851 89.8278 49.9124V27.4448H78.5814Z" fill="white"/>
                    </mask>
                  </defs>
                  <?php endif; ?>
                </svg>
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
<section data-nav-index="9" class="nav-section bg-brand-100 text-white w-full overflow-x-hidden">
  <div class="block-content lg:max-w-none lg:px-0 py-16 lg:py-40 flex-center flex-col lg:flex-row lg:justify-end gap-4 lg:gap-0">
    <div class="half max-lg:max-w-none lg:pr-12 w-full lg:w-1/2 text-center lg:text-left">
      <h2 class="font-title uppercase leading-tight text-2xl md:text-6xl lg:text-9xl xl:text-11xl slide-up-words"><?= $trans('home.our_services') ?></h2>
      <p class="lg:text-2xl lg:en:max-w-[32ch] slide-up mb-6 slide-up"><?= $trans('home.services_text') ?></p>
      <nav class="flex gap-2 justify-center lg:justify-start slide-up">
        <button class="subcategories-button-prev cursor-pointer text-secondary-100/80 hover:text-white active:text-white [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-30 p-2 transition-opacity">
          <svg class="size-8 transition-colors"><use href="#arrow-left"/></svg>
        </button>
        <button class="subcategories-button-next cursor-pointer text-secondary-100/80 hover:text-white active:text-white [&.swiper-button-disabled]:pointer-events-none [&.swiper-button-disabled]:opacity-30 p-2 transition-opacity">
          <svg class="size-8 transition-colors"><use href="#arrow-right"/></svg>
        </button>
      </nav>
    </div>
    <div class="w-full lg:w-1/2 px-2 lg:pl-0 lg:pr-[18%] lg:overflow-x-hidden h-full max-lg:min-h-110 max-w-lg lg:max-w-none flex items-end">
      <div id="subcategories-swiper" data-swiper-autoplay="2000" class="swiper flex w-full !overflow-visible items-end lg:items-center">
        <div class="swiper-wrapper !h-full !overflow-visible">
          <?php foreach($subcategories as $slide): ?>
            <article class="swiper-slide group h-auto flex items-end pt-53.5 lg:pt-65.5">
              <div class="relative flex flex-col rounded-2xl h-full p-10 bg-secondary-200 -translate-y-1/2 lg:-translate-y-3/5 group-[&.swiper-slide-active]:translate-y-0 group-[&.swiper-slide-active]:rounded-t-none transition-transform">
                <h2 class="font-title leading-tight uppercase text-xl mb-4"><?= $slide['name'] ?></h2>
                <p class=""><?= $slide['description'] ?></p>
              </div>
              <img src="/public/images/services/subcategories/<?= $slide['key'] ?>.webp" alt="cover" loading="lazy" class="absolute object-cover top-0 left-0 w-full h-56 lg:h-68 rounded-2xl bg-grey-100 opacity-0 translate-y-1/2 -mb-56 lg:-mb-68 group-[&.swiper-slide-active]:opacity-100 group-[&.swiper-slide-active]:translate-y-0 transition-op-trans duration-300">
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- IP -->
<section data-nav-index="10" class="nav-section bg-brand-100 text-white">
  <div class="block-content pt-12 pb-16 lg:pb-40">
    <h2 class="font-title uppercase leading-tight text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-center slide-up-words"><?= $trans('home.ip.title') ?></h2>
    <p class="lg:text-2xl text-center my-6 slide-up"><?= $trans('home.ip.text') ?></p>
    <p class="font-bold text-center text-xl sm:text-3xl lg:text-5xl mb-6 lg:mb-12"><?= $trans('home.ip.big') ?></p>

    <div id="ips-swiper" data-swiper-autoplay="2000" class="swiper w-full bg-white text-grey-100 rounded-3xl md:rounded-4xl max-w-xl lg:max-w-none">
      <div class="swiper-wrapper">
        <?php foreach($ips as $slide): ?>
          <article class="swiper-slide">
            <div class="p-4 md:p-10 flex flex-col lg:flex-row-reverse items-center">
              <img src="/public/images/home/about.webp" alt="" loading="lazy" class="w-full lg:w-1/2 rounded-2xl">
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
<section data-nav-index="11" class="nav-section cases-section bg-secondary-200 text-brand-100">
  <div class="block-content py-16">
    <h2 class="font-title uppercase leading-tight text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-white text-center slide-up-words"><?= $trans('home.cases.title') ?></h2>
  </div>
  <?php foreach($content['cases'] as $item): ?>
    <article class="case lg:hover:bg-brand-100 group transition-colors py-12 lg:py-16 min-h-[30dvh] flex flex-col lg:flex-row items-center relative duration-300 z-1 isolate">
      <h3 class="lg:absolute lg:top-1/2 lg:left-0 lg:-translate-y-1/2 lg:pt-4 xl:pt-7 font-title uppercase text-center text-4xl lg:text-[9.5vw] leading-none w-full lg:group-hover:opacity-0 lg:group-hover:pointer-events-none transition-opacity -z-1"><?= $item['name'] ?></h3>
      <div class="block-content max-w-screen-lg flex flex-col lg:flex-row w-full lg:pointer-events-none lg:opacity-0 lg:group-hover:opacity-100 lg:group-hover:pointer-events-auto lg:translate-y-2 lg:group-hover:translate-y-0 transition-op-trans duration-300">
        <div class="w-full lg:w-1/2 relative my-6 lg:my-0">
          <div class="case-image w-1/2 lg:w-4/5 max-w-52 lg:max-w-none lg:absolute lg:top-1/2 left-1/2 lg:-translate-1/2 flex-center p-4 rounded-full aspect-square bg-white drop-shadow-xl drop-shadow-black/40 mx-auto lg:mx-0 z-5">
            <img src="/public/images/study-cases/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" loading="lazy">
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
<section data-nav-index="12" class="nav-section pb-16 lg:pb-40 overflow-x-hidden bg-white/60 backdrop-blur-sm">
  <div class="block-content pb-12 pt-16 lg:pt-40">
    <h2 class="font-title text-center leading-tight uppercase text-2xl md:text-6xl lg:text-9xl xl:text-11xl text-secondary-200 lg:mb-4 slide-up-words"><?= $trans('home.clients.title') ?></h2>
    <p class="text-center md:text-lg lg:text-2xl text-secondary-200 mx-auto max-w-[58ch]"><?= $trans('home.clients.text') ?></p>
  </div>
  <ul id="clients1-swiper" class="clients-odd-swiper swiper !overflow-visible linear-swiper mask-x-from-70% mask-x-to-90%">
    <div class="swiper-wrapper">
      <?php foreach($clients1 as $slide): ?>
        <li class="swiper-slide">
          <img src="/public/images/clients/<?= $slide['logo'] ?>" alt="<?= $slide['name'] ?>" loading="lazy">
        </li>
      <?php endforeach; ?>
    </div>
  </ul>
  <ul id="clients2-swiper" class="clients-even-swiper swiper !overflow-visible linear-swiper mask-x-from-85% mask-x-to-95%">
    <div class="swiper-wrapper">
      <?php foreach($clients2 as $slide): ?>
        <li class="swiper-slide">
          <img src="/public/images/clients/<?= $slide['logo'] ?>" alt="<?= $slide['name'] ?>" loading="lazy">
        </li>
      <?php endforeach; ?>
    </div>
  </ul>
  <ul id="clients3-swiper" class="clients-odd-swiper swiper !overflow-visible linear-swiper mask-x-from-70% mask-x-to-90%">
    <div class="swiper-wrapper">
      <?php foreach($clients3 as $slide): ?>
        <li class="swiper-slide">
          <img src="/public/images/clients/<?= $slide['logo'] ?>" alt="<?= $slide['name'] ?>" loading="lazy">
        </li>
      <?php endforeach; ?>
    </div>
  </ul>
  <ul id="clients4-swiper" class="clients-even-swiper swiper !overflow-visible linear-swiper mask-x-from-85% mask-x-to-95%">
    <div class="swiper-wrapper">
      <?php foreach($clients4 as $slide): ?>
        <li class="swiper-slide">
          <img src="/public/images/clients/<?= $slide['logo'] ?>" alt="<?= $slide['name'] ?>" loading="lazy">
        </li>
      <?php endforeach; ?>
    </div>
  </ul>
</section>

<!-- Partners -->
<section data-nav-index="13" class="nav-section bg-brand-100 text-white">
  <div class="block-content py-16 lg:py-40">
    <h2 class="font-title text-center leading-tight uppercase text-2xl md:text-6xl lg:text-9xl xl:text-11xl lg:mb-4 slide-up-words"><?= $trans('home.partners.title') ?></h2>
    <p class="text-center md:text-lg lg:text-2xl mx-auto max-w-[52ch] mb-12"><?= $trans('home.partners.text') ?></p>

    <ul class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
      <?php foreach ($constants['partners'] as $item): ?>
        <li class="bg-white p-2 rounded-xl opacity-80 hover:opacity-100 transition-opacity duration-300">
          <img class="" src="/public/images/partners/<?= $item['logo'] ?>" alt="<?= $item['name'] ?>" loading="lazy">
        </li>
      <?php endforeach; ?>
    </ul>

  </div>
</section>

<!-- Certifications -->
<section data-nav-index="14" class="nav-section bg-linear-to-b from-15% from-brand-100 to-15% to-secondary-100">
  <div class="block-content max-w-screen-lg pb-16 lg:pb-40">
    <div class="bg-white rounded-2xl text-center p-4 md:p-8 lg:p-12 overflow-x-hidden">
      <h2 class="font-title leading-tight uppercase text-secondary-200 text-2xl md:text-4xl lg:text-6xl mb-4"><?= $trans('home.certifications.title') ?></h2>
      <p class="lg:text-xl mb-4 lg:mb-8"><?= $trans('home.certifications.text') ?></p>
      <ul id="certifications-swiper" class="swiper !overflow-visible linear-swiper mask-x-from-70% mask-x-to-90%">
        <div class="swiper-wrapper">
          <?php foreach($constants['certifications'] as $item): ?>
            <li class="swiper-slide">
              <img src="/public/images/certifications/<?= $item ?>" alt="certification" loading="lazy">
            </li>
          <?php endforeach; ?>
        </div>
      </ul>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
