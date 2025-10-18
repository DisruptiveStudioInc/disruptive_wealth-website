<!DOCTYPE html>
<html lang="<?= $currentLang ?>" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $pageTitle ?? $trans('home.title') ?></title>

  <?php if (isset($metaDescription)): ?>
    <meta name="description" content="<?= htmlspecialchars($metaDescription) ?>">
  <?php endif; ?>

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
  <link rel="stylesheet" href="/public/assets/css/styles.css">

  <?php if (!empty($includeRecaptcha)): ?>
    <!-- reCAPTCHA v3 -->
    <script src="https://www.google.com/recaptcha/api.js?render=<?= $config['recaptcha']['site_key'] ?>"></script>
  <?php endif; ?>

  <!-- GSAP -->
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js"></script>

  <!-- Swiper -->


  <!-- Main JS -->
  <script type="module" src="/public/assets/js/main.js"></script>

  <!-- Favicon -->
  <link rel="icon" type="image/svg+xml" href="/public/favicon.svg">
</head>

<body class="bg-white text-grey-100 antialiased overflow-x-hidden">
<header class="bg-white border-b border-surface-300 w-full fixed top-0 left-0 z-50">
  <nav class="w-full">
    <div class="flex justify-between items-center lg:items-stretch gap-4 w-full px-7">
      <div class="flex items-center lg:shrink-0 border-r border-surface-300 gap-2 lg:gap-4">
        <!-- Logo -->
        <a href="<?= route('home', $currentLang, $config['languages']['default']) ?>" class="text-2xl font-bold text-gray-800">
          <svg width="379" height="99" class="h-8 lg:h-10 w-auto text-secondary-50"><use href="#disruptive-studio-logo"/></svg>
        </a>

        <!-- Language switcher -->
        <?php include(__DIR__.'/../components/langSwitcher.php') ?>
      </div>

      <!-- Mobile menu button -->
      <button id="mobile-menu-button" class="lg:hidden p-1.5 rounded-lg bg-brand-100 text-white active:bg-brand-200" aria-label="Open menu">
        <svg class="size-7" fill="none"><use href="#bars-menu"/></svg>
      </button>

      <!-- Desktop Navigation -->
      <?php include(__DIR__.'/../components/navDesktop.php') ?>

      <a href="<?= route('contact', $currentLang) ?>" class="button self-center rounded-lg font-bold hidden lg:flex">
        <?= $trans('nav.contact') ?>
      </a>
    </div>

    <!-- Mobile Navigation -->
    <div id="mobile-menu" class="lg:hidden fixed top-0 left-0 w-full h-dvh overflow-y-auto bg-white -translate-y-full transition-transform duration-500">
      <div class="p-7 flex flex-col items-end gap-2">
        <button id="close-mobile-button" class="p-1.5 rounded-lg bg-surface-100 text-brand-100 active:bg-brand-200 active:text-white" aria-label="Close menu">
          <svg class="size-7" fill="none"><use href="#arrow-up"/></svg>
        </button>

        <ul id="mobile-nav" class="w-full accordion-container">
          <?php foreach ($navigationMenu as $index => $item): ?>
            <li class="border-b border-surface-300 last:border-b-0 <?= $item['hasSubmenu'] ? 'relative' : '' ?>">
              <?php if(isset($item['url'])): ?>
                <a href="<?= $item['url'] ?>" class="flex items-center py-3 px-2 text-xl text-grey-100 active:text-brand-100 transition-colors">
                  <?= $item['label'] ?>
                </a>
              <?php else: ?>
                <span data-target="acc-content-<?= $index ?>" class="acc-trigger group flex items-center justify-between px-2 py-3 text-xl [&.open]:text-brand-100 transition-colors">
                  <?= $item['label'] ?>
                  <svg class="size-6 group-[.open]:rotate-180 transition-transform"><use href="#chevron-down"/></svg>
                </span>
                <div id="acc-content-<?= $index ?>" class="grid grid-rows-[0fr] [&.open]:grid-rows-[1fr] transition-grid-rows duration-500">
                  <ul class="bg-surface-100/70 flex flex-col overflow-hidden">
                    <?php foreach($item['submenu'] as $sub): ?>
                      <li class="<?= $item['isMegamenu'] ? 'px-4 pt-4 pb-1.5 border-b border-surface-300/40 last:border-b-0' : 'first:pt-1.5 last:pb-1.5' ?>">
                        <?php if($item['isMegamenu']): ?>
                          <h3 class="text-xl font-bold mb-1 text-secondary-100"><?= $sub['name'] ?></h3>
                          <ul class="flex flex-col">
                            <?php foreach($sub['list'] as $subItem): ?>
                              <a href="<?= $subItem['url'] ?>" class="py-2.5 text-grey-100/70 text-xl active:text-brand-100 transition-colors"><?= $subItem['label'] ?></a>
                            <?php endforeach; ?>
                          </ul>
                        <?php else: ?>
                          <a href="<?= serviceRoute($sub['meta']['slug'], $currentLang) ?>" class="block py-2.5 px-4 text-grey-100/70 text-xl rounded hover:bg-surface-100/80 hover:text-brand-100 transition-colors">
                            <?= $sub['meta']['meta_title'] ?>
                          </a>
                        <?php endif; ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>

        </ul>
      </div>
    </div>
  </nav>
</header>

<main>
