<?php
/**
 * Template Name: Two column
 * Template Post Type: post, page
 */

if ( is_single() ) {
	get_template_part( 'single' );
} else {
	get_template_part( 'page' );
}
