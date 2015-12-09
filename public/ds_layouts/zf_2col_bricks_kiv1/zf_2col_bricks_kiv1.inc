<?php
/**
 * @file
 * Definition of Zurb Foundation Two column bricks Display Suite layout.
 */

function ds_zf_2col_bricks_kiv1() {
  return array(
    'label' => t('KiV Two column bricks'),
    'regions' => array(
      'topimage' => t('Image Top'),
      'top' => t('Top'),
      'balk' => t('Balk'),
      'tombalk' => t('Tom Balk'),
      'middle' => t('Middle'),
      'below_left' => t('Below Left'),
      'below_right' => t('Below Right'),
      'bottom' => t('Bottom'),
    ),
    'image' => TRUE,
  );
}
