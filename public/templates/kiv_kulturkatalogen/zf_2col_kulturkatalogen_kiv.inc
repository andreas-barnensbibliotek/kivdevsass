<?php
/**
 * @file
 * Definition of Zurb Foundation Two column bricks Display Suite layout.
 */

function ds_zf_2col_kulturkatalogen_kiv() {
  return array(
    'label' => t('Kulturkatalogen'),
    'regions' => array(
      'topimage' => t('Image Top'),
      'top' => t('Top'),
      'balk' => t('Balk'),
      'tombalk' => t('Tom Balk'),
      'middle' => t('Middle'),
      'below_right' => t('Below Right'),
      'below_left' => t('Below Left'),
      'fakta_right' => t('Fakta Right'),
      'lokal_right' => t('Lokal Right'),
      'ekonomi_right' => t('Ekonomi Right'),
      'kontakt_right' => t('Kontakt Right'),
      'ovrigt_right' => t('Övrigt Right'),
      'button_right' => t('Knappar Right'),
      'bottom' => t('Bottom'),
    ),
    'image' => TRUE,
  );
}
