<?php

use App\Models\Language;

return [
  'hero_images' => [
    'big' => 'accounting_1_big.webp',
    'small' => 'accounting_1_small.webp'
  ],
  'about1_images' => [
    'front' => 'accounting_2_front.webp',
    'back' => 'accounting_2_back.webp'
  ],
  'about2_images' => [
    'big' => 'accounting_3_big.webp',
    'mid' => 'accounting_3_mid.webp',
    'small' => 'accounting_3_small.webp'
  ],
  'foundation' => [
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.foundation.item1"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.foundation.item2"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.foundation.item3"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.foundation.item4"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.foundation.item5"),
    ]
  ],
  'oversight' => [
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.oversight.item1"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.oversight.item2"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.oversight.item3"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.oversight.item4"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'investors-',
      'text' => Language::trans("investors.oversight.item5"),
    ]
  ],
  'profile' => [
    [
      'image' => 'accounting_s1.webp',
      'text' => Language::trans("investors.profile.item1")
    ],
    [
      'image' => 'accounting_s2.webp',
      'text' => Language::trans("investors.profile.item2")
    ],
    [
      'image' => 'accounting_s3.webp',
      'text' => Language::trans("investors.profile.item3")
    ],
    [
      'image' => 'accounting_s4.webp',
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
    'big' => 'accounting_7_big.webp',
    'small' => 'accounting_7_small.webp'
  ]
];
