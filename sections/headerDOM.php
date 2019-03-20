<!-- header -->
<header class="header row clear" role="banner">

    <div class="container">

        <div class="row">

            <div class="<?php echo get_full_width_classes();?>">

                <!-- logo -->
                <div class="logo">

                    <?php $homeUrl = home_url(); ?>

                    <?php if ( get_theme_mod( 'etp_logo' ) ) : ?>
                        <a href="<?php echo $homeUrl; ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                            <h1>
                                <img src="<?php echo esc_url( get_theme_mod( 'etp_logo' ) ); ?>" alt='<?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?>' class="logo-img">
                                &nbsp;
                            </h1>
                        </a>
                    <?php else : ?>
                        <a href="<?php echo $homeUrl; ?>" title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="logo-img">
                        </a>
                    <?php endif; ?>

                </div>
                <!-- /logo -->

            </div>

        </div>

    </div>

</header>
<!-- /header -->