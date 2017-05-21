<?php
/**
 * This file loads the content when called.
 *
 * @version 1.4.8
 */

$template_location = apply_filters('alnp_template_location', ''); // e.g. "template-parts/post/"

if ( have_posts() ) :

	// Load content before the loop.
	do_action('alnp_load_before_loop');

	// Check that there are posts to load.
	while (have_posts()) : the_post();

		$post_format = get_post_format(); // Post Format e.g. video

		// Load content before the post content.
		do_action('alnp_load_before_content');

		get_template_part($template_location . 'content', 'single');

    understrap_post_nav();

		// Load content after the post content.
		do_action('alnp_load_after_content');

	// End the loop.
	endwhile;

		// Load content after the loop.
		do_action('alnp_load_after_loop');

else :

	// Load content if there are no more posts.
	do_action('alnp_no_more_posts');

endif; // END if have_posts()
