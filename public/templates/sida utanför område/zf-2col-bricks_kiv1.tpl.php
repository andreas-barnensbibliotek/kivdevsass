<?php
/**
 * @file
 * Template for Zurb Foundation Two column bricks Display Suite layout.
 */
?>

<<?php print $layout_wrapper; print $layout_attributes; ?> class="zf-2col-bricks <?php print $classes;?> artikelMainContainer">
    <?php if (isset($title_suffix['contextual_links'])): ?>
    <?php print render($title_suffix['contextual_links']); ?>
    <?php endif; ?>
    <!--Stora bilden logger i ds region "topimage"(Image Top)-->
    <?php if (!empty($topimage)): ?>
    <div class=" large-12 artikeltopImage">
        <?php print $topimage; ?>
    </div>
    <?php endif; ?>

    <!--Sidans titel logger i ds region "Top(Överst)-->
    <!--Bilden och balken skall ligga ovanpå bilden-->
    <!-- artMenu START -->
    <div class="row">
    
        <?php if (!empty($top)): ?>
        <div class="medium-12 columns omossspace">
        
            <?php print $top; ?>
            <?php endif; ?> <!--Balken logger i ds region "Balk-->
            <?php if (!empty($middle)): ?> <!--Döljer balken om nodmeny är tom-->
            	<?php print $balk; ?>
			<?php else: ?>   
				<?php print $tombalk; ?>
			<?php endif; ?>
            
        </div>
    </div>
        <div class="large-12 omossContentBox2">
            <!--Nodmeny logger i ds region "Middle"-->
            <?php if (!empty($middle)): ?>
            <div class="row-node-top-menu">
                <div class="row">
                <!--<div class="<?php print $zf_wrapper_classes; ?>">-->
                <!--<<?php print $middle_wrapper ?> class="group-middle<?php print $middle_classes; ?>">-->
                <?php print $middle; ?>
                <!--</<?php print $middle_wrapper ?>>-->
                <!--</div>-->
            </div>
            </div>
            <?php endif; ?>
        </div>
    
    <!-- artMenu END -->
    <!-- lv1 START -->
    <div class="artikelwrapper level1">
        <div class="row">
           
            <!--Övriga fält som som tillhör noden, ligger i vänster och högerspalterna below left och below right-->
            <?php if (!empty($below_left) || !empty($below_right)): ?>           
                <<?php print $below_left_wrapper ?> class="medium-8 columns artmaincontent <?php print $below_left_classes; ?>">
                    <?php print $below_left; ?>
                    </<?php print $below_left_wrapper ?>>

                    <<?php print $below_right_wrapper ?> class="medium-4 columns <?php print $below_right_classes; ?>">
                    
                    <?php if (!empty($form_right)): ?>
                    	<?php print $form_right; ?>
                    <?php endif; ?>
                    
                    <?php if (!empty($fakta_right)): ?>
                    	<div class="artikelFakta artsidecontainer">
                    		<h3>Fakta</h3>
                    		<?php if (!empty($evenemang_right)): ?>
                    			<div class="evenemang_wrapper">
                    				<?php print $evenemang_right; ?>
                    			</div>
                    		<?php endif; ?>
                    	<?php print $fakta_right; ?>
                    	</div>
                    <?php endif; ?>
                    
                    
                    
                        <?php print $below_right; ?>
                        
                        
                    </<?php print $below_right_wrapper ?>>
            
            <?php endif; ?>
            <!--<?php if (!empty($bottom)): ?>
            <div class="<?php print $zf_wrapper_classes; ?>">
                <<?php print $bottom_wrapper ?> class="group-bottom<?php print $bottom_classes; ?>">
                   <?php print $bottom; ?>
                    </<?php print $bottom_wrapper ?>>
            </div>
            <?php endif; ?>-->
            <!--Underligande noder ligger som ett eget block utanför ds, se admin/structure/block i ett block, "View: 2015-supporting-articles"
            Inget taggnings eller ccs är gjort på den vyn ännu-->
            </<?php print $layout_wrapper ?>>

            <?php if (!empty($drupal_render_children)): ?>
            <?php print $drupal_render_children ?>
            <?php endif; ?>
        </div>
        <?php if (!empty($bottom)): ?>
        	<?php print $bottom; ?>
        <?php endif; ?>
    </div>
    <!-- lv1 END -->
