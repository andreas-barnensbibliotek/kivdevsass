<div class="inner-wrap">
    <nav class="tab-bar">
        <section class="left-small">
            <a class="left-off-canvas-toggle" href="#">
                <span>MENY</span>
            </a>
        </section>

        <section class="right tab-bar-section tab-bar-logosection">
            <?php if ($linked_logo): print $linked_logo; endif; ?>
        </section>

        <section class="right-small">
            <a href="#">
                <span>SÖK</span>
            </a>
        </section>
    </nav>
    <aside class="left-off-canvas-menu">
        <!--<?php print ($alt_main_menu); ?>-->
        <?php print render($page['offcanvas_meny']); ?>
    </aside>

    <a class="exit-off-canvas"></a>
    
    <div class="searchMainWrapper searh-opener">
        <div class="small-12 columns">
            <div class="row">
                <div class="small-12 columns">
                    <div class="searchmainContent">
                        <?php print render($page['search_top']); ?>
                    </div>
                 </div>
            </div>              
        </div>
    </div>
    
    <!-- drupal tabbmeny start -->
    <main role="main" class="row l-main">
        <div class="<?php print $main_grid; ?> main columns">
            <?php if (!empty($page['highlighted'])): ?>
            <div class="highlight panel callout">
                <?php print render($page['highlighted']); ?>
            </div>
            <?php endif; ?>

            <!--<a id="main-content"></a>

            <?php if ($breadcrumb): print $breadcrumb; endif; ?>

            <?php if ($title && !$is_front): ?>
            <?php print render($title_prefix); ?>
            <h1 id="page-title" class="title">
                <?php print $title; ?>
            </h1>
            <?php print render($title_suffix); ?>
            <?php endif; ?>-->

            <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
            <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
            <?php endif; ?>

            <?php if ($action_links): ?>
            <ul class="action-links">
                <?php print render($action_links); ?>
            </ul>
            <?php endif; ?>

        </div>
        <!--/.main region -->
        <?php if (!empty($page['featured'])): ?>
        <!--/.featured -->
        <section class="l-featured row">
            <div class="large-12 columns">
                <?php print render($page['featured']); ?>
            </div>
        </section>
        <!--/.l-featured -->
        <?php endif; ?>
        <?php if (!empty($page['sidebar_first'])): ?>
        <aside role="complementary" class="<?php print $sidebar_first_grid; ?> sidebar-first columns sidebar">
            <?php print render($page['sidebar_first']); ?>
        </aside>
        <?php endif; ?>

        <?php if (!empty($page['sidebar_second'])): ?>
        <aside role="complementary" class="<?php print $sidebar_sec_grid; ?> sidebar-second columns sidebar">
            <?php print render($page['sidebar_second']); ?>
        </aside>
        <?php endif; ?>
    </main>
    <?php if (!empty($page['triptych_first']) || !empty($page['triptych_middle']) || !empty($page['triptych_last'])): ?>
    <!--.triptych-->
    <section class="l-triptych row">
        <div class="triptych-first large-4 columns">
            <?php print render($page['triptych_first']); ?>
        </div>
        <div class="triptych-middle large-4 columns">
            <?php print render($page['triptych_middle']); ?>
        </div>
        <div class="triptych-last large-4 columns">
            <?php print render($page['triptych_last']); ?>
        </div>
    </section>
    <!--/.triptych -->
    <?php endif; ?>


    <!-- drupal tabbmeny stopp  -->
    
    
	<?php if ($breadcrumb):?>
	<div class="small-12 columns">
		<div class="row">
			<div class="menybreadcrumb">
				 <?php print $breadcrumb; ?> 
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($content_second):?>
		<div class="row">
			<div class="small-12 medium-12 small-12 columns">
				<?php print render($page['content_second_top']); ?>
			</div>
		</div>
		<div class="row">
			<div class="small-12 medium-12 small-12 columns">	
				<?php print render($page['content_second']); ?>
			</div>
	    </div>
    <?php endif; ?>
    
    
    <?php $sokvag = url($_GET['q']);?>
    <?php $soksidapath = '/search';?>
    
    <?php if($sokvag == $soksidapath):?>
    	<div class="row">
    		<div class="large-9 medium-9 small-12 columns">
	  <?php endif; ?>   
    			<?php print render($page['content']); ?>
		
			
	<?php if($sokvag == $soksidapath):?>
        </div>
			<div class="large-3 medium-3 small-12 columns">	
				<?php print render($page['search_right']); ?>
			</div>
		</div>
	<?php endif; ?>


	<?php if (!empty($page['xtra_content'])): ?>
		<?php print render($page['xtra_content']); ?>
	<?php endif; ?>

<div class="small-12 columns footencol">
    <footer class="footer">
    	<div class="row">
	        <div class="small-12 medium-12 large-12 columns">
	            <div class="vglogo">
	                <a href="http://www.vgregion.se" target="_blank">
	                    <img alt="Västra Götalandsregionen" src="/sites/all/themes/kivnew/images/vg_logo_white.png">
	                </a>
	            </div>
	        </div>
        </div>
        <div class="row annonsrow">
            <div class="small-12 medium-6 large-3 columns">
                <?php print render($page['footer_leftcolumn']); ?>
            </div>

            <div class="small-12 medium-6 large-3 columns">
                <?php print render($page['footer_middleleftcolumn']); ?>
            </div>

            <div class="small-12 medium-6 large-3 columns">
                <?php print render($page['footer_middlerightcolumn']); ?>
            </div>
            
            <div class="small-12 medium-6 large-3 columns">
                <?php print render($page['footer_rightcolumn']); ?>
            </div>
            
        </div>
		<div class="row footdelare">
			<div class="small-12 medium-6 large-6 columns">
				<div class="foot-kivlogo-container">
				    <a href="/"><img alt="Kultur i Väst" src="/sites/all/themes/kivnew/images/kivlogo.png"></a>
				</div>
			</div>
			<div class="small-12 medium-6 large-6 columns">
				<div class="foot-social-container">
                    <ul class="socialiconlist">
                        <li>
                            <a href="http://facebook.se" target="_blank"><img src="/sites/all/themes/kivnew/images/FACEBOOKlogga.png"></a>
                        </li>
                        <li>
                            <a href="http://twitter.se" target="_blank"><img src="/sites/all/themes/kivnew/images/TWITTERlogga.png"></a>
                        </li>
                        <li>
                            <a href="http://instagram.com" target="_blank"><img src="/sites/all/themes/kivnew/images/INSTAGRAMlogga.png"></a>
                        </li>
                    </ul>
                </div>
			</div>
			<div class="small-12 columns footdelarehrbox">
				<hr>
			</div>
		</div>
        <div class="row adressrow">
            <!--<div class="small-12 medium-12 columns kivfootbottom">-->
                <?php print render($page['footer_bottomcolumn']); ?>
            <!--</div>-->
        </div>
    </footer>
</div>
    <a href="#0" class="scroll-top">
        <i class="fi-arrow-up"></i>
    </a>


</div>
<?php print $term->tid; ?>
<!--/.page -->
<script src="https://use.typekit.net/qpl5lxd.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script src="<?php print $base_path.$directory ?>/js/app.js"></script>
<script src="<?php print $base_path.$directory ?>/js/isotope.pkgd.min.js"></script>
<script type="text/javascript">

        jQuery(function ($) {

            var $container = $('.kivisotope').isotope({
                itemSelector: '.item',
                masonry: {
                    // use element for option
                    columnWidth: 250
                }
            });
            
			var $container = $('.kivisotope-webbtv').isotope({
			    itemSelector: '.item',
			    masonry: {
			        // use element for option
			        columnWidth: 330
			    }
			});

        });
        
</script>
