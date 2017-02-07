<?php
/**
 * Add the site logo section to customizer.

 * @package RokoPhoto
 */

/**
 * Hook the logo controls to the customizer.
 *
 * @param object $wp_customize The wp_customize object.
 */
function rokophotolite_site_logo_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'rokophotolite_logo_section', array(
		'priority' => 25,
		'title'    => __( 'Site Logo', 'rokophotolite' ),
	) );

	$wp_customize->add_setting( 'rokophotolite_logo_image', array(
		'default'           => get_template_directory_uri() . '/img/logo.png',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rokophotolite_logo_image', array(
		'label'    => __( 'Site Logo Image', 'rokophotolite' ),
		'section'  => 'rokophotolite_logo_section',
		'priority' => 5,
		'settings' => 'rokophotolite_logo_image',
	) ) );
}

add_action( 'customize_register', 'rokophotolite_site_logo_customize_register' );
