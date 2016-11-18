<?php
/**
 * Axiom America Theme Customizer.
 *
 * @package Axiom_America
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function axiom_america_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->remove_section('header_image');
}
add_action( 'customize_register', 'axiom_america_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function axiom_america_customize_preview_js() {
	wp_enqueue_script( 'axiom_america_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'axiom_america_customize_preview_js' );

/**
 * Custom Customizer controls and options.
 */

 // Hero image section
 axiomamerica_Kirki::add_section( 'hero_image', array(
   'title' => __( 'Hero Section' ),
   'description' => __( 'Show a hero section on the home page.' ),
	 'capability'	=> 'edit_theme_options',
   'priority' => 61
 ) );

axiomamerica_Kirki::add_field( 'hero_image_toggle', array(
	'settings' => 'hero_image_toggle',
	'label'    => __( 'Turn the hero section on or off', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'switch',
	'default'  => '0',
	'priority' => 10
) );

axiomamerica_Kirki::add_field( 'hero_image_background_color', array(
	'settings' => 'hero_image_background_color',
	'label'    => __( 'Select a solid background color', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'color',
	'default'  => '#50526d',
	'priority' => 20,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_background_image', array(
	'settings' => 'hero_image_background_image',
	'label'    => __( 'Select a background image', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'image',
	'default'  => '',
	'priority' => 21,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_foreground_image', array(
	'settings' => 'hero_image_foreground_image',
	'label'    => __( 'Select a foreground image', 'axiomamerica' ),
	'description' => __( 'PNG or SVG format images with transparent backgrounds work best', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'image',
	'default'  => '',
	'priority' => 22,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_title', array(
	'settings' => 'hero_image_title',
	'label'    => __( 'Text for the title of the hero section', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'text',
	'default'  => esc_attr__( 'A Remarkable Website', 'axiomamerica' ),
	'priority' => 30,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_button_01', array(
	'settings' => 'hero_image_button_01',
	'label'    => __( 'Show one button under the title', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'switch',
	'default'  => '0',
	'choices' => array(
    'on'  => esc_attr__( 'Show', 'axiomamerica' ),
    'off' => esc_attr__( 'Hide', 'axiomamerica' )
	),
	'priority' => 40,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_button_01_text', array(
	'settings' => 'hero_image_button_01_text',
	'label'    => __( 'Button text', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'text',
	'default'  => esc_attr__( 'Button 1', 'axiomamerica' ),
	'priority' => 41,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_button_01',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_button_01_link', array(
	'settings' => 'hero_image_button_01_link',
	'label'    => __( 'URL or page for the button link', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'text',
	'default'  => '#',
	'priority' => 42,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_button_01',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_button_02', array(
	'settings' => 'hero_image_button_02',
	'label'    => __( 'Show second button under the title', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'switch',
	'default'  => '0',
	'choices' => array(
    'on'  => esc_attr__( 'Show', 'axiomamerica' ),
    'off' => esc_attr__( 'Hide', 'axiomamerica' )
	),
	'priority' => 50,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_button_02_text', array(
	'settings' => 'hero_image_button_02_text',
	'label'    => __( 'Button text', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'text',
	'default'  => esc_attr__( 'Button 1', 'axiomamerica' ),
	'priority' => 51,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_button_02',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_button_02_link', array(
	'settings' => 'hero_image_button_02_link',
	'label'    => __( 'URL or page for the button link', 'axiomamerica' ),
	'section'  => 'hero_image',
	'type'     => 'text',
	'default'  => '#',
	'priority' => 52,
	'active_callback' => array(
		array(
			'setting'  => 'hero_image_button_02',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'hero_image_visibility', array(
	'settings'		=> 'hero_image_visibility',
	'label'			=> __( 'Visibility', 'axiomamerica' ),
	'description'	=> __( 'Select where the hero section should be visible.', 'axiomamerica' ),
	'section'		=> 'hero_image',
	'type'			=> 'select',
	'choices'		=> array(
		'homepage'	=> __( 'Homepage', 'axiomamerica' ),
		'frontpage'	=> __( 'Front Page', 'axiomamerica' )
	),
	'default'		=> 'homepage',
	'priority'  => 60
) );



// Featured posts section
axiomamerica_Kirki::add_section( 'featured_posts', array(
	'title' => __( 'Featured Posts' ),
	'description' => __( 'Show Featured posts thumbnails on the home page.' ),
	'capability'	=> 'edit_theme_options',
	'priority' => 71
) );

axiomamerica_Kirki::add_field( 'featured_posts_toggle', array(
	'settings' => 'featured_posts_toggle',
	'label'    => __( 'Show or hide the Featured posts', 'axiomamerica' ),
	'section'  => 'featured_posts',
	'type'     => 'switch',
	'choices' => array(
    'on'  => esc_attr__( 'Show', 'axiomamerica' ),
    'off' => esc_attr__( 'Hide', 'axiomamerica' )
	),
	'default'  => '0',
	'priority' => 10
) );

axiomamerica_Kirki::add_field( 'featured_posts_category', array(
	'settings' => 'featured_posts_category',
	'label'    => __( 'Select a category to feature on the home page.', 'axiomamerica' ),
	'section'  => 'featured_posts',
	'type'     => 'select',
	'multiple' => 1,
	'choices'  => Kirki_Helper::get_terms( 'category' ),
	'default'  => 'option-1',
	'priority' => 11,
	'active_callback' => array(
		array(
			'setting'  => 'featured_posts_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

axiomamerica_Kirki::add_field( 'featured_posts_number', array(
	'settings' => 'featured_posts_number',
	'label'    => __( 'Number of featured posts to show', 'axiomamerica' ),
	'section'  => 'featured_posts',
	'type'     => 'text',
	'default'  => esc_attr__( 3, 'axiomamerica' ),
	'priority' => 12,
	'active_callback' => array(
		array(
			'setting'  => 'featured_posts_toggle',
			'operator' => '==',
			'value'    => '1',
		),
	),
) );

// Footer copyright area
axiomamerica_Kirki::add_section( 'footer_options', array(
	'title' => __( 'Footer Options' ),
	'description' => __( 'Display options for the footer.' ),
	'capability'	=> 'edit_theme_options',
	'priority' => 81
) );

axiomamerica_Kirki::add_field( 'copyright_text', array(
	'settings' => 'copyright_text',
	'label'    => __( 'Text for the copyright after the year', 'axiomamerica' ),
	'section'  => 'footer_options',
	'type'     => 'text',
	'default'  => '',
	'priority' => 10
) );
