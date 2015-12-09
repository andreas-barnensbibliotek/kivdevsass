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
<div class="row mosaikblockheader"><div class="small-12 columns">
    <ul id="breadcrumbval"></ul>
</div>
    <div class="small-9 columns">
        <div id="contentfilterblock">
            <select id="drpFilter" class=" custom dropdown small">
            </select>
            <select id="drpSortering" class=" custom dropdown small">
                <option>Nyast</option>
                <option>Fallande</option>
            </select>
        </div>
    </div>
    <div class="small-3 columns text-right">
        <span id="filtersortering">
            <a id="kivmozaik" href="">
                <img src="<?php print $base_path.$directory ?>/images/mosaikicon.png" />
            </a>
            <a id="kivlist" href="">
                <img src="<?php print $base_path.$directory ?>/images/listicon.png" />
            </a>                                                      
        </span>
    </div>
</div>
Hallå sven how to handle this views-exposed-form ?? jag skulle vilja ha in det i filtret ovan.
	<div class="row evenemang">
		<div id="kivisotope" class="kivisotope clearfix">  
		<?php print render($title_prefix); ?>
		  <?php if ($title): ?>
		    <?php print $title; ?>
		  <?php endif; ?>
		  <?php print render($title_suffix); ?>
		  <?php if ($header): ?>
		    <div class="view-header">
		      <?php print $header; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($exposed): ?>
		    <div class="wrapper kivlistview">
		      <?php print $exposed; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($attachment_before): ?>
		    <div class="attachment attachment-before">
		      <?php print $attachment_before; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($rows): ?>
		    <div class="wrapper kivlistview">
		      <?php print $rows; ?>
		    </div>
		  <?php elseif ($empty): ?>
		    <div class="view-empty">
		      <?php print $empty; ?>
		    </div>
		  <?php endif; ?>
		
		  <?php if ($pager): ?>
		    <?php print $pager; ?>
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
		</div>
	</div>

<?php /* class view */ ?>