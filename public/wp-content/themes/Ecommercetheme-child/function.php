<?php
if ( ! function_exists( 'myfirsttheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * It is important to set up these functions before the init hook so
	 * that none of these features are lost.
	 *
	 * @since MyFirstTheme 1.0
	 */
	function myfirsttheme_setup() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'wp-block-styles' );
		add_editor_style('style.css');
	}
endif;
	add_action( 'after_setup_theme', 'myfirsttheme_setup' );
	add_theme_support( 'post-formats',  array( 'aside', 'gallery', 'quote', 'image', 'video' ) );

//function for style.css and block.css
if ( ! function_exists( 'learningWordPress_resources' ) ) :
	function learningWordPress_resources() {
		wp_enqueue_style('style', get_stylesheet_uri());
		wp_enqueue_style('style-blocks', get_template_directory_uri() . '/wp-content/themes/Ecommercetheme/blocks/blocks.css');
		
	}
endif;
	add_action('wp_enqueue_scripts', 'learningWordPress_resources');

// Navigation Menus
register_nav_menus(array(
	'primary' => __( 'Primary Menu'),
	'footer' => __( 'Footer Menu'),
));

// Get top ancestor
function get_top_ancestor_id() {
	
	global $post;
	
	if ($post->post_parent) {
		$ancestors = array_reverse(get_post_ancestors($post->ID));
		return $ancestors[0];
		
	}
	
	return $post->ID;
	
}

// Does page have children?
function has_children() {
	
	global $post;
	
	$pages = get_pages('child_of=' . $post->ID);
	return count($pages);
	
}








