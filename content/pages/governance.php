<?php

use App\Models\Language;

return [
  'hero_images' => [
    'big' => 'governance_1_big.webp',
    'small' => 'governance_1_small.webp'
  ],
  'about1_images' => [
    'front' => 'governance_2_front.webp',
    'back' => 'governance_2_back.webp'
  ],
  'about2_images' => [
    'big' => 'governance_3_big.webp',
    'mid' => 'governance_3_mid.webp',
    'small' => 'governance_3_small.webp'
  ],
  'design_steps' => [
    [
      'image' => 'governance_4_1.webp',
      'text' => Language::trans("governance.design.item1")
    ],
    [
      'image' => 'governance_4_2.webp',
      'text' => Language::trans("governance.design.item2")
    ],
    [
      'image' => 'governance_4_3.webp',
      'text' => Language::trans("governance.design.item3")
    ],
    [
      'image' => 'governance_4_4.webp',
      'text' => Language::trans("governance.design.item4")
    ]
  ],
  'protection_images' => [
    'big' => 'governance_5_big.webp',
    'mid' => 'governance_5_mid.webp',
    'small' => 'governance_5_small.webp'
  ],
  'keys' => [
    [
      'image' => 'governance_6_1.webp',
      'text' => Language::trans("governance.keys.item1")
    ],
    [
      'image' => 'governance_6_2.webp',
      'text' => Language::trans("governance.keys.item2")
    ],
    [
      'image' => 'governance_6_3.webp',
      'text' => Language::trans("governance.keys.item3")
    ],
    [
      'image' => 'governance_6_4.webp',
      'text' => Language::trans("governance.keys.item4")
    ],
    [
      'image' => 'governance_6_4.webp',
      'text' => Language::trans("governance.keys.item5")
    ]
  ],
  'transparency_images' => [
    'big' => 'governance_7_big.webp',
    'mid' => 'governance_7_mid.webp',
    'small' => 'governance_7_small.webp'
  ],
  'commitments' => [
    Language::trans("governance.commitments.item1"),
    Language::trans("governance.commitments.item2"),
    Language::trans("governance.commitments.item3"),
    Language::trans("governance.commitments.item4")
  ],
  'compliance_images' => [
    'big' => 'governance_9_big.webp',
    'mid' => 'governance_9_mid.webp',
    'small' => 'governance_9_small.webp'
  ],
  'implementations' => [
    [
      'image' => 'governance_10_1.webp',
      'text' => Language::trans("governance.implementation.item1")
    ],
    [
      'image' => 'governance_10_2.webp',
      'text' => Language::trans("governance.implementation.item2")
    ],
    [
      'image' => 'governance_10_3.webp',
      'text' => Language::trans("governance.implementation.item3")
    ],
    [
      'image' => 'governance_10_4.webp',
      'text' => Language::trans("governance.implementation.item4")
    ]
  ],
  'jurisdiction_images' => [
    'big' => 'governance_11_big.webp',
    'mid' => 'governance_11_mid.webp',
    'small' => 'governance_11_small.webp'
  ],
  'allow_items' => [
    Language::trans("governance.allow.item1"),
    Language::trans("governance.allow.item2"),
    Language::trans("governance.allow.item3"),
    Language::trans("governance.allow.item4")
  ]
];
