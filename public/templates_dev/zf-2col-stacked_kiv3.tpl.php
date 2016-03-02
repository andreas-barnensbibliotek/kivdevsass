<?php
/**
 * @file
 * Template for Zurb Foundation Two column stacked Display Suite layout.
 */
 // Denna template använs till: Sida för taxonomitermer områsdessida omoss box
?>




<<?php print $layout_wrapper; print $layout_attributes; ?> class="zf-2col-stacked <?php print $classes;?>">

  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>

  <?php if (!empty($topimage)): ?>
  	<div class="top-bild-wrapper">
  		<?php print $topimage; ?>
  	</div>
  <?php endif; ?>
	
    <div class="small-12 xtra">
    
    <?php if (!empty($header)): ?>
      <div class="row">	
      	<div class="medium-12 columns omossspace">
      		<?php print $header; ?>     
      	</div>
	  </div>
    <?php endif; ?>
    
  </div>

   <div class="large-12 columns omossContentBox2">
        <div class="row">    
			<<?php print $left_wrapper ?> class="medium-8 columns">
				<div id="omossContent">
					<?php print $left; ?>
				</div>
			</<?php print $left_wrapper ?>>

			<<?php print $right_wrapper ?> class="medium-4 columns">
				<div id="omossKontaktContent">
					<h3>Kontakt</h3>
					<?php print $right; ?>
				</div>
			</<?php print $right_wrapper ?>>	
			
			<?php if (!empty($footer)): ?>
				<<?php print $footer_wrapper ?> class="medium-12 columns snabblinks">
				<h3>Snabblänkar</h3>
					<?php print $footer; ?>
				</<?php print $footer_wrapper ?>>
			<?php endif; ?>
		</div>
	</div>

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
