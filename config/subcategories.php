<?php

/**
 * Service subcategories with translations
 * Used for megamenu labels
 */

use App\Models\Language;

return [
  'blockchain' => [
    'es' => 'Blockchain',
    'en' => 'Blockchain',
    'description' => Language::trans('servsub.blockchain')
  ],
  'custom-software' => [
    'es' => 'Custom software',
    'en' => 'Custom software',
    'description' => Language::trans('servsub.custom_software')
  ],
  'payment-processing' => [
    'es' => 'Procesamiento de pagos',
    'en' => 'Payment processing',
    'description' => Language::trans('servsub.payment_processing')
  ],
  'referral-marketing' => [
    'es' => 'Marketing de referidos',
    'en' => 'Referral marketing',
    'description' => Language::trans('servsub.referral_marketing')
  ],
  'creative-services' => [
    'es' => 'Servicios creativos',
    'en' => 'Creative services',
    'description' => Language::trans('servsub.creative_services')
  ],
  'hr' => [
    'es' => 'RR. HH.',
    'en' => 'HR',
    'description' => Language::trans('servsub.hr')
  ],
];
