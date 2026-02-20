<?php

use App\Models\Language;

return[
  'seoDescription' => Language::trans('legal_notice.description'),
  'section1' => [
    Language::trans('legal_notice.tex1'),
    Language::trans('legal_notice.tex2'),
    Language::trans('legal_notice.tex3'),
    Language::trans('legal_notice.tex4')
  ]
];
