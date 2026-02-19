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
  'design_steps' => [
    [
      'image' => 'accounting_s1.webp',
      'text' => Language::trans("governance.design.item1")
    ],
    [
      'image' => 'accounting_s2.webp',
      'text' => Language::trans("governance.design.item2")
    ],
    [
      'image' => 'accounting_s3.webp',
      'text' => Language::trans("governance.design.item3")
    ],
    [
      'image' => 'accounting_s4.webp',
      'text' => Language::trans("governance.design.item4")
    ]
  ],
  'keys' => [
    [
      'image' => 'accounting_s1.webp',
      'text' => Language::trans("governance.keys.item1")
    ],
    [
      'image' => 'accounting_s2.webp',
      'text' => Language::trans("governance.keys.item2")
    ],
    [
      'image' => 'accounting_s3.webp',
      'text' => Language::trans("governance.keys.item3")
    ],
    [
      'image' => 'accounting_s4.webp',
      'text' => Language::trans("governance.keys.item4")
    ],
    [
      'image' => 'accounting_s4.webp',
      'text' => Language::trans("governance.keys.item5")
    ]
  ],
  'commitments' => [
    Language::trans("governance.commitments.item1"),
    Language::trans("governance.commitments.item2"),
    Language::trans("governance.commitments.item3"),
    Language::trans("governance.commitments.item4")
  ],
  'implementations' => [
    [
      'image' => 'accounting_s1.webp',
      'text' => Language::trans("governance.implementation.item1")
    ],
    [
      'image' => 'accounting_s2.webp',
      'text' => Language::trans("governance.implementation.item2")
    ],
    [
      'image' => 'accounting_s3.webp',
      'text' => Language::trans("governance.implementation.item3")
    ],
    [
      'image' => 'accounting_s4.webp',
      'text' => Language::trans("governance.implementation.item4")
    ]
  ],
  'allow_items' => [
    Language::trans("governance.allow.item1"),
    Language::trans("governance.allow.item2"),
    Language::trans("governance.allow.item3"),
    Language::trans("governance.allow.item4")
  ]
];
