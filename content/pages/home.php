<?php

use App\Models\Language;

return[
  'seoDescription' => Language::trans('home.description'),
  'hero_ctas' => [
    [
      'text' => Language::trans('home.hero.cta_main'),
      'link' => route('strategy', Language::getCurrentLanguage()),
    ],
    [
      'text' => Language::trans('home.hero.cta_secondary1'),
      'link' => route('governance', Language::getCurrentLanguage()),
      'style' => 'secondary'
    ],
    [
      'text' => Language::trans('home.hero.cta_secondary2'),
      'link' => route('investors', Language::getCurrentLanguage()),
      'style' => 'secondary'
    ]
  ],
  'we_do' => [
    [
      'image' => 'hero.webp',
      'text' => Language::trans('home.we_do.item1'),
      'containerStyle' => 'lg:row-span-2 lg:pb-6'
    ],
    [
      'image' => 'hero.webp',
      'text' => Language::trans('home.we_do.item2'),
      'containerStyle' => 'lg:pt-0'
    ],
    [
      'image' => 'hero.webp',
      'text' => Language::trans('home.we_do.item3'),
      'containerStyle' => 'lg:pt-6 lg:pb-12'
    ]
  ],
  'edge' => [
    [
      'image' => 'about.webp',
      'text' => Language::trans('home.edge.item1')
    ],
    [
      'image' => 'about.webp',
      'text' => Language::trans('home.edge.item2')
    ],
    [
      'image' => 'about.webp',
      'text' => Language::trans('home.edge.item3')
    ],
    [
      'image' => 'about.webp',
      'text' => Language::trans('home.edge.item4')
    ],
    [
      'image' => 'about.webp',
      'text' => Language::trans('home.edge.item5')
    ]
  ],
  'portfolio' => [
    [
      'title' => Language::trans('home.portfolio.card1.title'),
      'text' => Language::trans('home.portfolio.card1.text'),
      'containerStyle' => 'lg:col-span-2'
    ],
    [
      'title' => Language::trans('home.portfolio.card2.title'),
      'text' => Language::trans('home.portfolio.card2.text')
    ],
    [
      'title' => Language::trans('home.portfolio.card3.title'),
      'text' => Language::trans('home.portfolio.card3.text'),
      'containerStyle' => 'lg:row-span-2'
    ],
    [
      'title' => Language::trans('home.portfolio.card4.title'),
      'text' => Language::trans('home.portfolio.card4.text')
    ],
    [
      'title' => Language::trans('home.portfolio.card5.title'),
      'text' => Language::trans('home.portfolio.card5.text')
    ],
    [
      'title' => Language::trans('home.portfolio.card6.title'),
      'text' => Language::trans('home.portfolio.card6.text')
    ]
  ]
];
