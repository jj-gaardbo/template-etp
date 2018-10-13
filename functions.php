<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/
if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('slider-size', 2000, 1000, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/
function custom_nav()
{
    wp_nav_menu( array(
        'theme_location'    => 'header-menu',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'menu-{menu slug}-container collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
        'menu_class'        => 'menu nav navbar-nav',
        'echo'              => true,
        'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
        'walker'            => new WP_Bootstrap_Navwalker(),
    ) );
}

add_filter( 'nav_menu_css_class', 'menu_item_classes', 10, 4 );

function menu_item_classes( $classes, $item, $args, $depth ) {

    $classes[] = get_current_page_post_type(url_to_postid($item->url), true);

    return $classes;
}

function header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

/*        wp_register_script('jquery', get_template_directory_uri() . '/js/lib/jquery-3.3.1.min.js', array(), '2.7.1'); // jQuery
        wp_enqueue_script('jquery'); // Enqueue it!*/


        wp_register_script('bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.min.js', array('jquery')); // bootstrap
        wp_enqueue_script('bootstrap'); // Enqueue it!

        wp_register_script('bxslider', get_template_directory_uri() . '/js/lib/jquery.bxslider.min.js', array('jquery'), '4.2.12'); // bxslider slider
        wp_enqueue_script('bxslider'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load styles
function load_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrapcss'); // Enqueue it!

    /*wp_register_style('fontawesome', get_template_directory_uri() . '/css/fontawesome.css', array(), '5.3.1', 'all');
    wp_enqueue_style('fontawesome'); // Enqueue it!*/

    wp_register_style('maincss', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('maincss'); // Enqueue it!
}

function load_admin_styles(){
    wp_register_style( 'etp_admin_css', get_template_directory_uri() . '/css/etp-admin.css', false, '1.0.0' );
    wp_enqueue_style('etp_admin_css'); // Enqueue it!
}


// Register Navigation
function register_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'etp-consult'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'etp-consult'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'etp-consult') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Pagination
function pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'etp-consult') . '</a>';
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'header_scripts');
add_action('wp_enqueue_scripts', 'load_styles');
add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
add_action('init', 'register_menu');
add_action('init', 'create_post_type_cases');
add_action('init', 'create_post_type_references');
add_action('init', 'create_post_type_expertises');
add_action('init', 'create_post_type_employees');
add_action('init', 'pagination');

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('custom_short_code', 'custom_short_code');

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/
function create_post_type_cases()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('cases', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Cases', 'etp-consult'), // Rename these to suit
            'singular_name' => __('Cases', 'etp-consult'),
            'add_new' => __('Add New', 'etp-consult'),
            'add_new_item' => __('Add New Case', 'etp-consult'),
            'edit' => __('Edit', 'etp-consult'),
            'edit_item' => __('Edit Case', 'etp-consult'),
            'new_item' => __('New Case', 'etp-consult'),
            'view' => __('View Case', 'etp-consult'),
            'view_item' => __('View Case', 'etp-consult'),
            'search_items' => __('Search Cases', 'etp-consult'),
            'not_found' => __('No Cases found', 'etp-consult'),
            'not_found_in_trash' => __('No Cases found in Trash', 'etp-consult')
        ),
        'public' => true,
        'hierarchical' => true,
        'has_archive' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ),
        'can_export' => true,
        'taxonomies' => array(
            'post_tag',
            'category'
        )
    ));
}

function create_post_type_references()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('references', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('References', 'etp-consult'), // Rename these to suit
                'singular_name' => __('References', 'etp-consult'),
                'add_new' => __('Add New', 'etp-consult'),
                'add_new_item' => __('Add New Reference', 'etp-consult'),
                'edit' => __('Edit', 'etp-consult'),
                'edit_item' => __('Edit Reference', 'etp-consult'),
                'new_item' => __('New Reference', 'etp-consult'),
                'view' => __('View Reference', 'etp-consult'),
                'view_item' => __('View Reference', 'etp-consult'),
                'search_items' => __('Search References', 'etp-consult'),
                'not_found' => __('No References found', 'etp-consult'),
                'not_found_in_trash' => __('No References found in Trash', 'etp-consult')
            ),
            'public' => true,
            'hierarchical' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ),
            'can_export' => true,
            'taxonomies' => array(
                'post_tag',
                'category'
            )
        ));
}

function create_post_type_expertises()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('expertises', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Expertises', 'etp-consult'), // Rename these to suit
                'singular_name' => __('Expertises', 'etp-consult'),
                'add_new' => __('Add New', 'etp-consult'),
                'add_new_item' => __('Add New Expertise', 'etp-consult'),
                'edit' => __('Edit', 'etp-consult'),
                'edit_item' => __('Edit Expertise', 'etp-consult'),
                'new_item' => __('New Expertise', 'etp-consult'),
                'view' => __('View Expertise', 'etp-consult'),
                'view_item' => __('View Expertise', 'etp-consult'),
                'search_items' => __('Search Expertises', 'etp-consult'),
                'not_found' => __('No Expertises found', 'etp-consult'),
                'not_found_in_trash' => __('No Expertises found in Trash', 'etp-consult')
            ),
            'public' => true,
            'hierarchical' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ),
            'can_export' => true,
            'taxonomies' => array(
                'post_tag',
                'category'
            )
        ));
}

function create_post_type_employees()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('employees', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('Employees', 'etp-consult'), // Rename these to suit
                'singular_name' => __('Employees', 'etp-consult'),
                'add_new' => __('Add New', 'etp-consult'),
                'add_new_item' => __('Add New Employee', 'etp-consult'),
                'edit' => __('Edit', 'etp-consult'),
                'edit_item' => __('Edit Employee', 'etp-consult'),
                'new_item' => __('New Employee', 'etp-consult'),
                'view' => __('View Employee', 'etp-consult'),
                'view_item' => __('View Employee', 'etp-consult'),
                'search_items' => __('Search Employees', 'etp-consult'),
                'not_found' => __('No Employees found', 'etp-consult'),
                'not_found_in_trash' => __('No Employees found in Trash', 'etp-consult')
            ),
            'public' => true,
            'hierarchical' => true,
            'has_archive' => false,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail'
            ),
            'can_export' => true,
            'taxonomies' => array(
                'post_tag',
                'category'
            )
        ));
}

function change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = __('News', 'etp-consult');
    $submenu['edit.php'][5][0] = __('News', 'etp-consult');
    $submenu['edit.php'][10][0] = __('Add News', 'etp-consult');
    $submenu['edit.php'][16][0] = __('News Tags', 'etp-consult');
}
function change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = __('News', 'etp-consult');
    $labels->singular_name = __('News', 'etp-consult');
    $labels->add_new = __('Add News', 'etp-consult');
    $labels->add_new_item = __('Add News', 'etp-consult');
    $labels->edit_item = __('Edit News', 'etp-consult');
    $labels->new_item = __('News item', 'etp-consult');
    $labels->view_item = __('View News', 'etp-consult');
    $labels->search_items = __('Search News', 'etp-consult');
    $labels->not_found = __('No News found', 'etp-consult');
    $labels->not_found_in_trash = __('No News found in Trash', 'etp-consult');
    $labels->all_items = __('All News', 'etp-consult');
    $labels->menu_name = __('News', 'etp-consult');
    $labels->name_admin_bar = __('News', 'etp-consult');
}

add_action( 'admin_menu', 'change_post_label' );
add_action( 'init', 'change_post_object' );

add_filter( 'comments_open', '__return_false', 10, 2 );

/*------------------------------------*\
	Admin menu customization
\*------------------------------------*/
function custom_menu_page_removing() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' );

function wpse_custom_menu_order( $menu_ord ) {
    if ( !$menu_ord ) return true;

    return array(
        'index.php', // Dashboard
        'separator1', // First separator
        'edit.php', // Posts
        'edit.php?post_type=page', // Pages
        'edit.php?post_type=cases', // Cases
        'edit.php?post_type=references', // References
        'edit.php?post_type=expertises', // Expertises
        'edit.php?post_type=employees', // Employees
        'separator2', // Second separator
        'upload.php', // Media
        'link-manager.php', // Links
        'themes.php', // Appearance
        'plugins.php', // Plugins
        'users.php', // Users
        'separator-last', // Last separator
        'options-general.php', // Settings
        'tools.php', // Tools
    );
}
add_filter( 'custom_menu_order', 'wpse_custom_menu_order', 10, 1 );
add_filter( 'menu_order', 'wpse_custom_menu_order', 10, 1 );

//todo:add_filter('acf/settings/show_admin', '__return_false');

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function custom_shortcode($atts, $content = null)
{
    return '<div class="custom-shortcode">' . do_shortcode($content) . '</div>';
}

/**
 * Loads all the needed files for setting up the theme
 */
//require "plugins/advanced-custom-fields/acf.php";


if ( ! file_exists( get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php' ) ) {
    // file does not exist... return an error.
    return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
    // file exists... require it.
    require_once get_template_directory() . '/includes/class-wp-bootstrap-navwalker.php';
}

function custom_vars() {

    global $wp_query;
    $vars = array(
        'pageTemplate' => get_page_template_slug(),
    );

    wp_localize_script( 'html5blankscripts', 'GlobalVars', $vars );
}

add_action ('wp_enqueue_scripts', 'custom_vars');

require_once get_template_directory() . '/includes/common.php';
require_once get_template_directory() . '/includes/markup.php';

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png);
            height:126px;
            width:201px;
            background-size: 201px 126px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

if( function_exists('acf_add_options_page') ) {

    $args = array(
        'page_title' => 'Standard indhold',
        'menu_title' => 'Standard indhold',
        'update_button'		=> __('Update', 'etp-consult'),
        'updated_message'	=> __("Updated", 'etp-consult'),

    );
    acf_add_options_page($args);
}

add_action( 'after_setup_theme', 'language_setup' );
function language_setup(){
    load_theme_textdomain( 'etp-consult', get_template_directory() . '/languages' );
}

add_filter( 'get_archives_link', function( $link_html, $url, $text, $format, $before, $after ) {

    if ( 'accordion' == $format ) {
        $link_html = get_accordion_DOM_news($link_html, $url, $text, $format, $before, $after);
    }

    return $link_html;

}, 10, 6 );
