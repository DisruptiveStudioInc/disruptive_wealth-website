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
  'areas' => [
    [
      'image' => 'gear',
      // 'image' => 'strategy-',
      'text' => Language::trans("strategy.areas.item1"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'strategy-',
      'text' => Language::trans("strategy.areas.item2"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'strategy-',
      'text' => Language::trans("strategy.areas.item3"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'strategy-',
      'text' => Language::trans("strategy.areas.item4"),
    ],
    [
      'image' => 'gear',
      // 'image' => 'strategy-',
      'text' => Language::trans("strategy.areas.item5"),
    ],
  ],
  'structure' => [
    [
      'image' => 'accounting_s1.webp',
      'title' => Language::trans("strategy.structure.item1.title"),
      'text' => Language::trans("strategy.structure.item1.text")
    ],
    [
      'image' => 'accounting_s2.webp',
      'title' => Language::trans("strategy.structure.item2.title"),
      'list' => [
        Language::trans("strategy.structure.item2.text1"),
        Language::trans("strategy.structure.item2.text2"),
        Language::trans("strategy.structure.item2.text3")
      ],
      'list_type' => 'ol'
    ],
    [
      'image' => 'accounting_s3.webp',
      'title' => Language::trans("strategy.structure.item3.title"),
      'list' => [
        Language::trans("strategy.structure.item3.text1"),
        Language::trans("strategy.structure.item3.text2"),
        Language::trans("strategy.structure.item3.text3"),
        Language::trans("strategy.structure.item3.text4"),
        Language::trans("strategy.structure.item3.text5")
      ],
      'list_type' => 'ul'
    ],
  ],
  'plans' => [
    Language::trans("strategy.plans.item1"),
    Language::trans("strategy.plans.item2"),
    Language::trans("strategy.plans.item3"),
    Language::trans("strategy.plans.item4")
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
