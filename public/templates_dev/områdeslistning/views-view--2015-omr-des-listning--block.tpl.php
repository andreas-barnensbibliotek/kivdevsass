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
<div class="row mosaikblockheader">
    <div class="small-8 medium-9 columns">
    <div class="row">
      <div class="small-12 columns">
        <div class="filterbreadcrumbbox">
            <ul class="omradesnamn" >
              <li>
                <?php print t(drupal_get_title())?>				
              </li>
			
            </ul>
            <ul id="breadcrumbval">
            </ul>
            
        </div>
      </div>
    </div>
    
    
        <div id="contentfilterblock">
            <select id="drpFilter" class=" custom dropdown small" name="Avgransa">
            </select>
            <select id="drpSortering" class="custom dropdown small" name="Sortering" style="display:none!important;" >
				<option value="alla">Sortera</option>
                <option value="datum">Datum</option>
                <option value="titel">Titel</option>
				<option value="aktuellt">Aktuellt</option>
            </select>
        </div>
    </div>
    <div class="small-4 medium-3 columns text-right">
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

<div class="row">
    <div id="kivisotope" class="kivisotope clearfix">
        <div class="wrapper kivlistview">

         
          

          <?php if ($exposed): ?>
            <div class="view-filters">
              <?php print $exposed; ?>
            </div>
          <?php endif; ?>

          <?php if ($attachment_before): ?>
            <div class="attachment attachment-before">
              <?php print $attachment_before; ?>
            </div>
          <?php endif; ?>

          <?php if ($rows): ?>
    
              <?php print $rows; ?>
    
          <?php elseif ($empty): ?>
            <div class="view-empty">
              <?php print $empty; ?>
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
        </div> 
    </div>
</div>
<div class="row">
    <div class="small-12">
        <?php /* class view */ ?>
        <?php if ($pager): ?>
        <?php print $pager; ?>
        <?php endif; ?>
    </div>
</div>
<?php if ($header): ?>
<div class="view-header"style="display:none;">
    <?php print $header; ?>
</div>
<?php endif; ?>