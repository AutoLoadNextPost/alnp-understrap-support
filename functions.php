<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();

    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
}

/*
 * Enable Support for Auto Load Next Post.
 *
 * This provides support for Auto Load Next Post 2.0 and up.
 *
 * @since 1.0.0
 */
function alnp_understrap_support() {
	add_theme_support('auto-load-next-post', array(
		'content_container' => 'main.site-main',
		'title_selector' => 'h1.entry-title',
		'navigation_container' => 'nav.post-navigation',
		'comments_container' => 'div#comments',
	));

	// Removes the post navigation from Auto Load Next Post template file.
	remove_action('alnp_load_after_content', 'auto_load_next_post_navigation', 1, 10);
}
add_action('after_setup_theme', 'alnp_understrap_support');

function understrap_alnp_template_location() {
  return 'loop-templates/';
}
add_filter('alnp_template_location', 'understrap_alnp_template_location');
