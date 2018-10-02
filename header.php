<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Source+Serif+Pro" rel="stylesheet">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

        <nav class="navigation row clear">

            <div class="container">

                <div class="col-md-12 col-xl-12">

                    <?php custom_nav(); ?>

                </div>

            </div>

        </nav>

        <!-- header -->
        <header class="header row clear" role="banner">

            <div class="container">

                <div class="col-md-12 col-xl-12">

                    <!-- logo -->
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
                        </a>
                    </div>
                    <!-- /logo -->

                </div>

            </div>

        </header>
        <!-- /header -->

		<!-- wrapper -->
		<div class="wrapper">
