<?php
/**
 * @file
 * Template for Zurb Foundation Two column stacked Display Suite layout.
 */
?>


  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <?php if (!empty($header)): ?>
    <div class="<?php print $zf_wrapper_classes; ?>">
      <<?php print $header_wrapper ?> class="group-header<?php print $header_classes; ?>">
      <?php print $header; ?>
      </<?php print $header_wrapper ?>>
    </div>
  <?php endif; ?>
 <div class="large-12 columns  omossContentBox">
  <div class="row">    
 <div class="medium-12 columns ">
  <?php if (!empty($left) || !empty($right)): ?>
    
      <<?php print $left_wrapper ?> class="group-left<?php print $left_classes; ?>">
      <?php print $left; ?>
      </<?php print $left_wrapper ?>>

      <<?php print $right_wrapper ?> class="group-right<?php print $right_classes; ?>">
      <?php print $right; ?>
      </<?php print $right_wrapper ?>>
   
  <?php endif; ?>

  <?php if (!empty($footer)): ?>
   
      <<?php print $footer_wrapper ?> class="group-footer<?php print $footer_classes; ?>">
      <?php print $footer; ?>
      </<?php print $footer_wrapper ?>>
   
  <?php endif; ?>
här1
</div>
</div>

här2
<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
