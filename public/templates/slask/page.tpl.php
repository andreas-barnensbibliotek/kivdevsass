
    <div class="inner-wrap">
        <nav class="tab-bar">
            <section class="left-small">
                <a class="left-off-canvas-toggle" href="#">
                    <span>MENY</span>
                </a>
            </section>

            <section class="left tab-bar-section tab-bar-logosection">
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
        <!-- drupal tabbmeny start --------------------------------------------------------------------- -->
        <main role="main" class="row l-main">
            <div class="<?php print $main_grid; ?> main columns">
                <?php if (!empty($page['highlighted'])): ?>
                <div class="highlight panel callout">
                    <?php print render($page['highlighted']); ?>
                </div>
                <?php endif; ?>

                <a id="main-content"></a>

                <?php if ($breadcrumb): print $breadcrumb; endif; ?>

                <?php if ($title && !$is_front): ?>
                <?php print render($title_prefix); ?>
                <h1 id="page-title" class="title"><?php print $title; ?></h1>
                <?php print render($title_suffix); ?>
                <?php endif; ?>

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


        <!-- drupal tabbmeny stopp --------------------------------------------------------------------- -->


        <?php print render($page['content']); ?>

        <footer class="footer">
            <div class="row">
                <div class="small-12 medium-6 columns kivfootcolleft">
                    <?php print render($page['footer_leftcolumn']); ?>
                </div>

                <div class="small-12 medium-3 columns kivfootmiddle">
                    <?php print render($page['footer_middlecolumn']); ?>
                </div>

                <div class="small-12 medium-3 columns kivfootcolright">
                    <?php print render($page['footer_rightcolumn']); ?>
                </div>
            </div>

            <div class="row">
                <div class="small-12 medium-12 columns kivfootbottom">
                    <?php print render($page['footer_bottomcolumn']); ?>
                </div>
            </div>
        </footer>

        <a href="#0" class="scroll-top">
            <i class="fi-arrow-up"></i>
        </a>


    </div>
    <!--/.page -->

    <script src="<?php print $base_path.$directory ?>/js/app.js"></script>
    <script src="<?php print $base_path.$directory ?>/js/isotope.pkgd.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            var $container = $('.kivisotope').isotope({
                itemSelector: '.item',
                masonry: {
                    columnWidth: '.columns'
                }
            });


        });
    </script>
