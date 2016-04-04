<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>
<div class="<?php print $classes; ?> small-12 large-12 columns">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  
  <div class="row" style="margin-bottom: 2rem;">
	  
	  <?php if ($exposed): ?>
	    <div class="view-filters small-12 medium-12 columns">
	      <?php print $exposed; ?>
	    </div>
	  <?php endif; ?>
	  
	  <?php if ($header): ?>
	    <div class="view-header small-12 medium-12 columns text-right">
	      <?php print $header; ?>
	    </div>
	  <?php endif; ?>
	
	  
	</div>
  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>
  <!-- H�r startar listblocket -->
  <div class="row mosaikblockheader kulturkat">
    <div class="small-8 medium-9 columns">    
    </div>
    <div class="small-4 medium-3 columns text-right ">
        <span id="filtersortering">
            <a id="kivmozaik" href="">
                <img src="/<?php print $base_path.$directory ?>/images/Mosaik44.png" alt="Visa mosaikvy"/>
            </a>
            <a id="kivlist" href="">
                <img src="/<?php print $base_path.$directory ?>/images/Lista44.png" alt="Visa listvy" />
            </a>                                                      
        </span>
    </div>
 </div>
 <!-- H�r Slutar listblocket -->

<div class="row">
 <div id="kivisotope" class="kivisotope clearfix">
  	
  <?php if ($rows): ?> 
		<div class="view-content">
  			<div class="wrapper kivlistview"> 
    			<?php print $rows; ?>
    		</div>
      </div>
      
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>
  </div>
  </div>


  <?php if ($pager): ?>
  <div class="row">
    <?php print $pager; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>