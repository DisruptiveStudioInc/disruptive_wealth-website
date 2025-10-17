<?php

use App\Models\Language;

return[
  'hero' => [
    [
      'title' => Language::trans('home.hero.slide1.title'),
      'text' => Language::trans('home.hero.slide1.text')
    ],
    [
      'title' => Language::trans('home.hero.slide2.title'),
      'text' => Language::trans('home.hero.slide2.text')
    ],
    [
      'title' => Language::trans('home.hero.slide3.title'),
      'text' => Language::trans('home.hero.slide3.text')
    ],
    [
      'title' => Language::trans('home.hero.slide4.title'),
      'text' => Language::trans('home.hero.slide4.text')
    ]
  ],
  'discover' => [
    [
      'title' => Language::trans('home.discover_list.item1.title'),
      'text' => Language::trans('home.discover_list.item1.text'),
      'icon' => 'grow'
    ],
    [
      'title' => Language::trans('home.discover_list.item2.title'),
      'text' => Language::trans('home.discover_list.item2.text'),
      'icon' => 'smart-ecosystem'
    ],
    [
      'title' => Language::trans('home.discover_list.item3.title'),
      'text' => Language::trans('home.discover_list.item3.text'),
      'icon' => 'total-impact'
    ],
    [
      'title' => Language::trans('home.discover_list.item4.title'),
      'text' => Language::trans('home.discover_list.item4.text'),
      'icon' => 'digital-inteligence'
    ]
  ],
  'technologies' => [
    [
      'title' => Language::trans('home.tech_list.item1.title'),
      'text' => Language::trans('home.tech_list.item1.text')
    ],
    [
      'title' => Language::trans('home.tech_list.item2.title'),
      'text' => Language::trans('home.tech_list.item2.text')
    ],
    [
      'title' => Language::trans('home.tech_list.item3.title'),
      'text' => Language::trans('home.tech_list.item3.text')
    ]
  ],
  'team' => [
    [
      'name' => 'Daniel Cruz',
      'job' => Language::trans('home.team_jobs.ceo'),
      'text' => Language::trans('home.team_description.daniel')
    ],
    [
      'name' => 'Geovanni Alvarado',
      'job' => Language::trans('home.team_jobs.cto'),
      'text' => Language::trans('home.team_description.geovanni')
    ],
    [
      'name' => 'Eduardo Maldonado',
      'job' => Language::trans('home.team_jobs.lawyer'),
      'text' => Language::trans('home.team_description.eduardo')
    ]
  ],
  'stats' => [
    [
      'number' => '+5',
      'title' => Language::trans('home.statistics.list.item1.feature'),
      'text' => Language::trans('home.statistics.list.item1.text')
    ],
    [
      'number' => '+16',
      'title' => Language::trans('home.statistics.list.item2.feature'),
      'text' => Language::trans('home.statistics.list.item2.text')
    ],
    [
      'number' => '+100',
      'title' => Language::trans('home.statistics.list.item3.feature'),
      'text' => Language::trans('home.statistics.list.item3.text')
    ],
    [
      'number' => Language::trans('home.statistics.list.item4.number'),
      'title' => Language::trans('home.statistics.list.item4.feature'),
      'text' => Language::trans('home.statistics.list.item4.text')
    ],
    [
      'number' => '+400',
      'title' => Language::trans('home.statistics.list.item5.feature'),
      'text' => Language::trans('home.statistics.list.item5.text')
    ],
    [
      'number' => Language::trans('home.statistics.list.item6.number'),
      'title' => Language::trans('home.statistics.list.item6.feature'),
      'text' => Language::trans('home.statistics.list.item6.text')
    ]
  ],
  'ecosystem' => [
    [
      'logo' => 'disruptive-mindz',
      'name' => 'Disruptive Mindz',
      'text' => Language::trans('home.ecosystem.verticals.mindz')
    ],
    [
      'logo' => 'disruptive-crea',
      'name' => 'Disruptive Crea',
      'text' => Language::trans('home.ecosystem.verticals.crea')
    ],
    [
      'logo' => 'disruptive-exchange',
      'name' => 'Disruptive Exchange',
      'text' => Language::trans('home.ecosystem.verticals.exchange')
    ],
    [
      'logo' => 'disruptive-payments',
      'name' => 'Disruptive Payments',
      'text' => Language::trans('home.ecosystem.verticals.payments')
    ],
    [
      'logo' => 'disruptive-talent',
      'name' => 'Disruptive Talent',
      'text' => Language::trans('home.ecosystem.verticals.talent')
    ],
    [
      'logo' => 'disruptive-corpsyte',
      'name' => 'Corpsyte',
      'text' => Language::trans('home.ecosystem.verticals.corpsyte')
    ]
  ],
  'cases' => [
    [
      'name' => 'Darevita',
      'text' => Language::trans('home.cases.darevita'),
      'image' => 'clientes-28'
    ],
    [
      'name' => 'Apolus',
      'text' => Language::trans('home.cases.apolus'),
      'image' => 'clientes-05'
    ],
    [
      'name' => 'Doctors Net',
      'text' => Language::trans('home.cases.doctors_net'),
      'image' => 'clientes-74'
    ],
    [
      'name' => 'EXMA',
      'text' => Language::trans('home.cases.exma'),
      'image' => 'clientes-73'
    ],
    [
      'name' => 'EVO',
      'text' => Language::trans('home.cases.evo'),
      'image' => 'clientes-41'
    ]
  ],
  'partners' => [
    [
      'image' => 'a',
      'alt' => ''
    ]
  ],
  'certifications' => [
    [
      'name' => '',
      'image' => '',
      'link' => ''
    ],
  ]
];
