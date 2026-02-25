<?php

use App\Models\Language;

return [
  'hero_images' => [
    'big' => 'strategy_1_big.webp',
    'small' => 'strategy_1_small.webp'
  ],
  'about1_images' => [
    'front' => 'strategy_2_1.webp',
    'back' => 'strategy_2_2.webp'
  ],
  'about2_images' => [
    'big' => 'strategy_3_big.webp',
    'mid' => 'strategy_3_mid.webp',
    'small' => 'strategy_3_small.webp'
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
      'image' => 'strategy_5_1.webp',
      'title' => Language::trans("strategy.structure.item1.title"),
      'text' => Language::trans("strategy.structure.item1.text")
    ],
    [
      'image' => 'strategy_5_2.webp',
      'title' => Language::trans("strategy.structure.item2.title"),
      'list' => [
        Language::trans("strategy.structure.item2.text1"),
        Language::trans("strategy.structure.item2.text2"),
        Language::trans("strategy.structure.item2.text3")
      ],
      'list_type' => 'ol'
    ],
    [
      'image' => 'strategy_5_3.webp',
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
  'governance_images' => [
    'big' => 'strategy_7_big.webp',
    'small' => 'strategy_7_small.webp'
  ],
  'risks_list' => [
    Language::trans("strategy.risks.item1"),
    Language::trans("strategy.risks.item2"),
    Language::trans("strategy.risks.item3"),
    Language::trans("strategy.risks.item4"),
    Language::trans("strategy.risks.item5")
  ],
  'risks_images' => [
    'big' => 'strategy_8_big.webp',
    'small' => 'strategy_8_small.webp'
  ],
  'sales_images' => [
    'big' => 'strategy_9_big.webp',
    'small' => 'strategy_9_small.webp'
  ]
];
