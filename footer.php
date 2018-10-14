			<!-- footer -->
			<footer class="footer row" role="contentinfo">

                <div class="container">

                    <div class="row">

                        <div class="footer-col col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <?php echo get_field('foot_col_1', 'option'); ?>
                        </div>

                        <div class="footer-col col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <?php echo get_field('foot_col_2', 'option'); ?>
                        </div>

                        <div class="footer-col col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <?php echo get_field('foot_col_3', 'option'); ?>
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
		<script>
		(function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
		(f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
		l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
		ga('send', 'pageview');
		</script>

    </body>
</html>
