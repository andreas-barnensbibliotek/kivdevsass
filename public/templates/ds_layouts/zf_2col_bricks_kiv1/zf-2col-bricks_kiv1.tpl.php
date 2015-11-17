<?php
/**
 * @file
 * Template for Zurb Foundation Two column bricks Display Suite layout.
 */
?>
<<?php print $layout_wrapper; print $layout_attributes; ?> class="zf-2col-bricks <?php print $classes;?>">

  <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
  <?php endif; ?>
	<!--Stora bilden logger i ds region "topimage"(Image Top)-->
<div class="large-12">
	  <?php if (!empty($topimage)): ?>
	    <?php print $topimage; ?>     
	  <?php endif; ?>
	  
	<!--Sidans titel logger i ds region "Top(Överst)-->
	<!--Bilden och balken skall ligga ovanpå bilden-->
		<div class="row">
		<?php if (!empty($top)): ?>
		  <div class="medium-12 columns omossspace">	
		  <?php print $top; ?>     
			  </div>
		<?php endif; ?>
		</div>
		<div class="row">
		<!--Balken logger i ds region "Balk-->
		<?php if (!empty($middle)): ?> <!--Döljer balken om nodmeny är tom-->
		  <div class="medium-12 columns omossspace">	
		  <?php print $balk; ?>     
			  </div>
		<?php endif; ?>
		</div>
</div>

  <!--Nodmeny logger i ds region "Middle"-->
  <?php if (!empty($middle)): ?>
  	<div class="row-node-top-menu">
    <!--<div class="<?php print $zf_wrapper_classes; ?>">-->
      <!--<<?php print $middle_wrapper ?> class="group-middle<?php print $middle_classes; ?>">-->
      <?php print $middle; ?>
      <!--</<?php print $middle_wrapper ?>>-->
    <!--</div>-->
    </div>
  <?php endif; ?>
<!--Klart hit fredag 13/11-->

<!--Övriga fält som som tillhör noden, ligger i vänster och högerspalterna below left och below right-->

  <?php if (!empty($below_left) || !empty($below_right)): ?>
    <div class="<?php print $zf_wrapper_classes; ?>">
      <<?php print $below_left_wrapper ?> class="group-below-left<?php print $below_left_classes; ?>">
      <?php print $below_left; ?>
      </<?php print $below_left_wrapper ?>>

      <<?php print $below_right_wrapper ?> class="group-below-right<?php print $below_right_classes; ?>">
      <?php print $below_right; ?>
      </<?php print $below_right_wrapper ?>>
    </div>
  <?php endif; ?>

  <?php if (!empty($bottom)): ?>
    <div class="<?php print $zf_wrapper_classes; ?>">
      <<?php print $bottom_wrapper ?> class="group-bottom<?php print $bottom_classes; ?>">
      <?php print $bottom; ?>
      </<?php print $bottom_wrapper ?>>
    </div>
  <?php endif; ?>

<!--Underligande noder ligger som ett eget block utanför ds, se admin/structure/block i ett block, "View: 2015-supporting-articles"
Inget taggnings eller ccs är gjort på den vyn ännu-->

</<?php print $layout_wrapper ?>>

<?php if (!empty($drupal_render_children)): ?>
  <?php print $drupal_render_children ?>
<?php endif; ?>
