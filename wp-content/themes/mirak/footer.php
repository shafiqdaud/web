<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mirak
 */

/**
 *
 * @hooked mirak_mustread_section
 */
if (is_home()) {

	do_action( 'mirak_action_mustread' );
}

/**
 *
 * @hooked mirak_footer_start
 */
do_action( 'mirak_action_before_footer' );

/**
 * Hooked - mirak_footer_top_section -10
 * Hooked - mirak_footer_section -20
 */
do_action( 'mirak_action_footer' );

/**
 * Hooked - mirak_footer_end. 
 */
do_action( 'mirak_action_after_footer' );

wp_footer(); ?>

</body>  
</html>