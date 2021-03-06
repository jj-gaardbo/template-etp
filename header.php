<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico?v=2" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">


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

	<body <?php body_class(); ?> data-page-post-type="<?php echo get_current_page_post_type(get_the_ID())?>">

    <!-- wrapper -->
    <div class="container-fluid">

        <?php require_once get_template_directory() . '/sections/topNavigation.php';?>

        <?php require_once get_template_directory() . '/sections/navigation.php';?>

        <?php require_once get_template_directory() . '/sections/headerDOM.php';?>