<?php

use App\Models\Language;

return [
  'hero_images' => [
    'big' => 'investors_1_big.webp',
    'small' => 'investors_1_small.webp'
  ],
  'about1_images' => [
    'front' => 'investors_2_front.webp',
    'back' => 'investors_2_back.webp'
  ],
  'about2_images' => [
    'big' => 'investors_5_big.webp',
    'mid' => 'investors_5_mid.webp',
    'small' => 'investors_5_small.webp'
  ],
  'foundation' => [
    [
      'image' => 'investors-shareholders',
      'text' => Language::trans("investors.foundation.item1"),
    ],
    [
      'image' => 'investors-majorities',
      'text' => Language::trans("investors.foundation.item2"),
    ],
    [
      'image' => 'investors-protocols',
      'text' => Language::trans("investors.foundation.item3"),
    ],
    [
      'image' => 'investors-report',
      'text' => Language::trans("investors.foundation.item4"),
    ],
    [
      'image' => 'investors-resolution',
      'text' => Language::trans("investors.foundation.item5"),
    ]
  ],
  'oversight' => [
    [
      'image' => 'investors-separation',
      'text' => Language::trans("investors.oversight.item1"),
    ],
    [
      'image' => 'investors-exit',
      'text' => Language::trans("investors.oversight.item2"),
    ],
    [
      'image' => 'investors-risk',
      'text' => Language::trans("investors.oversight.item3"),
    ],
    [
      'image' => 'investors-framework',
      'text' => Language::trans("investors.oversight.item4"),
    ],
    [
      'image' => 'investors-evaluation',
      'text' => Language::trans("investors.oversight.item5"),
    ]
  ],
  'profile' => [
    [
      'image' => 'investors_6_1.webp',
      'text' => Language::trans("investors.profile.item1")
    ],
    [
      'image' => 'investors_6_2.webp',
      'text' => Language::trans("investors.profile.item2")
    ],
    [
      'image' => 'investors_6_3.webp',
      'text' => Language::trans("investors.profile.item3")
    ],
    [
      'image' => 'investors_6_4.webp',
      'text' => Language::trans("investors.profile.item4")
    ]
  ],
  'process' => [
    Language::trans("investors.process.item1"),
    Language::trans("investors.process.item2"),
    Language::trans("investors.process.item3"),
    Language::trans("investors.process.item4"),
    Language::trans("investors.process.item5")
  ],
  'governance_list' => [
    Language::trans("strategy.governance.item1"),
    Language::trans("strategy.governance.item2"),
    Language::trans("strategy.governance.item3"),
    Language::trans("strategy.governance.item4"),
    Language::trans("strategy.governance.item5")
  ],
  'risks_list' => [
    Language::trans("strategy.risks.item1"),
    Language::trans("strategy.risks.item2"),
    Language::trans("strategy.risks.item3"),
    Language::trans("strategy.risks.item4"),
    Language::trans("strategy.risks.item5")
  ],
  'sales_images' => [
    'big' => 'investors_8_big.webp',
    'small' => 'investors_8_small.webp'
  ]
];
