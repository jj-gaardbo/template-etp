			<!-- footer -->
			<footer class="footer row" role="contentinfo">

                <div class="container">

                    <div class="row">

                        <div class="footer-col col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <?php echo get_field('foot_col_1_'.pll_current_language( 'slug' ), 'option');?>
                        </div>

                        <div class="footer-col col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <?php echo get_field('foot_col_2_'.pll_current_language( 'slug' ), 'option'); ?>
                        </div>

                        <div class="footer-col col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <?php echo get_field('foot_col_3_'.pll_current_language( 'slug' ), 'option'); ?>
                        </div>

                    </div>

                </div>

			</footer>
			<!-- /footer -->

            <?php require_once get_template_directory() . '/sections/cookie.php';?>

        </div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>

		<!-- analytics -->
        <?php echo get_field('google_analytics','options');?>

    </body>
</html>
