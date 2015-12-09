<?php
/**
 * @file
 * Template for Zurb Foundation Two column stacked Display Suite layout.
 */
 
  // Denna template använs till: Områden, level2Visning
 
 
?>


  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <div class="row">   
    <?php if (!empty($header)): ?>
      <<?php print $header_wrapper ?> class="medium-12 columns <?php print $header_classes; ?>">
      <?php print $header; ?>
      </<?php print $header_wrapper ?>>
    <?php endif; ?>
 

  
    <<?php print $left_wrapper ?> class="medium-8 columns artmaincontent <?php print $left_classes; ?>">
    <?php print $left; ?>
    </<?php print $left_wrapper ?>>

    <<?php print $right_wrapper ?> class="medium-4 columns faktabox<?php print $right_classes; ?>">
    <?php print $right; ?>
    </<?php print $right_wrapper ?>>
 

  
    <?php if (!empty($footer)): ?>
      <<?php print $footer_wrapper ?> class="group-footer<?php print $footer_classes; ?>">
      <?php print $footer; ?>
      </<?php print $footer_wrapper ?>>
    <?php endif; ?>
  </div>



<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
