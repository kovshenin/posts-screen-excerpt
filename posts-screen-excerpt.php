<?php
/*
 * Plugin Name: Posts Screen Excerpt
 * Plugin URI: http://github.com/kovshenin/posts-screen-excerpt/
 * Description: This plugin allows you to add the post excerpt as one of the columns when in the edit posts screen.
 * Version: 1.0
 * Author: kovshenin
 * Author URI: http://kovshenin.com
 * License: GPL2
 */

add_filter( 'manage_edit-post_columns', 'show_excerpt_post_columns' );
function show_excerpt_post_columns( $columns ) {
	$column_excerpt = array( 'show_excerpt' => 'Excerpt' );
	$columns = array_slice( $columns, 0, 2, true ) + $column_excerpt + $columns;
	return $columns;
}

add_action( 'manage_posts_custom_column', 'show_excerpt_custom_columns' );
function show_excerpt_custom_columns( $column ) {
	if ( 'show_excerpt' == $column )
		the_excerpt();
}