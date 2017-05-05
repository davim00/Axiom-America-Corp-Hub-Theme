<?php
/**
 * Axiom America Theme Customizer
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
	$wp_customize->remove_control('blogdescription');
	$wp_customize->remove_control('display_header_text');
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
 * Add the theme configuration
 */
axiom_america_Kirki::add_config( 'axiom_america', array(
	'option_type' => 'theme_mod',
	'capability'  => 'edit_theme_options',
) );

// Front Page panel

axiom_america_Kirki::add_panel( 'front_page', array(
    'priority'    => 160,
    'title'       => __( 'Front Page', 'axiom-america' ),
    'description' => __( 'You can customize the sections for the static front page.', 'axiom-america' ),
) );

	// Front page jumbotron
	axiom_america_Kirki::add_section( 'jumbotron_front', array(
	    'title'          => __( 'Hero Image' ),
	    'description'    => __( 'Specify options for a hero section on the front page.' ),
	    'panel'          => 'front_page',
	    'priority'       => 10,
	    'capability'     => 'edit_theme_options',
	) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_show',
				'label'    => __( 'Show the hero section on the front page', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'switch',
				'choices'	 => array(
					'on'	=>	esc_attr__( 'Show', 'axiom-america' ),
					'off'	=>	esc_attr__( 'Hide', 'axiom-america' ),
				),
				'priority' => 10,
				'default'  => '1'
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_header',
				'label'    => __( 'Hero Section Header Text', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'text',
				'priority' => 20,
				'default'  => 'We make great things.',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show',
						'operator' => '==',
						'value'    => true,
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_show_button',
				'label'    => __( 'Number of CTA buttons to display', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'select',
				'multiple' => 1,
				'priority' => 30,
				'choices'  => array(
					'none' => esc_attr__( 'None', 'axiom-america' ),
					'one' => esc_attr__( 'One', 'axiom_america' ),
					'two' => esc_attr__( 'Two', 'axiom_america' ),
				),
				'default'  => 'one',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show',
						'operator' => '==',
						'value'    => true
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_button_url',
				'label'    => __( 'Select a page for the button link', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'dropdown-pages',
				'multiple' => 1,
				'priority' => 40,
				'default'  => 'option-1',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show_button',
						'operator' => '==',
						'value'    => 'one'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_button_text',
				'label'    => __( 'Button text', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'text',
				'multiple' => 1,
				'priority' => 50,
				'default'  => 'Find out more',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show_button',
						'operator' => '==',
						'value'    => 'one'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_button1_url',
				'label'    => __( 'Select a page for the first button link', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'dropdown-pages',
				'multiple' => 1,
				'priority' => 60,
				'default'  => 'option-1',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show_button',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_button1_text',
				'label'    => __( 'First button text', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'text',
				'multiple' => 1,
				'priority' => 70,
				'default'  => 'Find out more',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show_button',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_button2_url',
				'label'    => __( 'Select a page for the second button link', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'dropdown-pages',
				'multiple' => 1,
				'priority' => 80,
				'default'  => 'option-1',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show_button',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'jumbotron_button2_text',
				'label'    => __( 'Second button text', 'axiom-america' ),
				'section'  => 'jumbotron_front',
				'type'     => 'text',
				'multiple' => 1,
				'priority' => 90,
				'default'  => 'Find out more',
				'active_callback' => array(
					array(
						'setting'  => 'jumbotron_show_button',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

	// Front page featured posts
	axiom_america_Kirki::add_section( 'featured_posts', array(
	    'title'          => __( 'Featured Posts' ),
	    'description'    => __( 'Featured blog posts on the front page.' ),
	    'panel'          => 'front_page',
	    'priority'       => 20,
	    'capability'     => 'edit_theme_options',
	) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'featured_posts_show',
				'label'    => __( 'Show featured posts', 'axiom-america' ),
				'section'  => 'featured_posts',
				'type'     => 'switch',
				'choices'	 => array(
					'on'	=>	esc_attr__( 'Show', 'axiom-america' ),
					'off'	=>	esc_attr__( 'Hide', 'axiom-america' ),
				),
				'priority' => 10,
				'default'  => '1'
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'featured_posts_cat',
				'label'    => __( 'Select the category of featured posts to show', 'axiom-america' ),
				'section'  => 'featured_posts',
				'type'     => 'select',
				'multiple' => 1,
				'choices'  => Kirki_Helper::get_terms( 'category' ),
				'default'  => 'option-1',
				'priority' => 10,
				'active_callback' => array(
					array(
						'setting'  => 'featured_posts_show',
						'operator' => '==',
						'value'    => true
					)
				)
		) );

	// Front page quotation
	axiom_america_Kirki::add_section( 'quote_front', array(
	    'title'          => __( 'Quote' ),
	    'description'    => __( 'Section for a quote or testimonial.' ),
	    'panel'          => 'front_page',
	    'priority'       => 30,
	    'capability'     => 'edit_theme_options',
	) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'quote_show',
				'label'    => __( 'Show a quote or testimonial', 'axiom-america' ),
				'section'  => 'quote_front',
				'type'     => 'switch',
				'choices'	 => array(
					'on'	=>	esc_attr__( 'Show', 'axiom-america' ),
					'off'	=>	esc_attr__( 'Hide', 'axiom-america' ),
				),
				'priority' => 10,
				'default'  => '1'
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'quote_text',
				'label'    => __( 'Quote text', 'axiom-america' ),
				'section'  => 'quote_front',
				'type'     => 'text',
				'priority' => 20,
				'default'  => 'Quisque malesuada enim a augue dictum, a fermentum enim volutpat. Nam ac tellus nec purus pretium vestibulum. Mauris ultricies sapien eget ornare porta. Aenean lacinia eros nibh, eget viverra lectus volutpat sed.',
				'active_callback' => array(
					array(
						'setting'  => 'quote_show',
						'operator' => '==',
						'value'    => true
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'cite_show',
				'label'    => __( 'Show the source of the quote', 'axiom-america' ),
				'section'  => 'quote_front',
				'type'     => 'checkbox',
				'priority' => 30,
				'default'  => '1',
				'active_callback' => array(
					array(
						'setting'  => 'quote_show',
						'operator' => '==',
						'value'    => true
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'cite_text',
				'label'    => __( 'Quote source text', 'axiom-america' ),
				'section'  => 'quote_front',
				'type'     => 'text',
				'priority' => 40,
				'default'  => 'John Doe, Acme Corp.',
				'active_callback' => array(
					array(
						'setting'  => 'cite_show',
						'operator' => '==',
						'value'    => true
					),
					array(
						'setting'  => 'quote_show',
						'operator' => '==',
						'value'    => true
					)
				)
		) );

	// Front page about section
	axiom_america_Kirki::add_section( 'about_front', array(
	    'title'          => __( 'Company Information' ),
	    'description'    => __( 'Comapny description on the front page.' ),
	    'panel'          => 'front_page',
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_show',
				'label'    => __( 'Show company information on the front page', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'switch',
				'choices'	 => array(
					'on'	=>	esc_attr__( 'Show', 'axiom-america' ),
					'off'	=>	esc_attr__( 'Hide', 'axiom-america' ),
				),
				'priority' => 10,
				'default'  => '1'
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_number',
				'label'    => __( 'Choose how many sections to show', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'radio',
				'choices'	 => array(
					'one'	=>	esc_attr__( '1 section', 'axiom-america' ),
					'two'	=>	esc_attr__( '2 sections', 'axiom-america' ),
				),
				'priority' => 20,
				'default'  => 'two',
				'active_callback' => array(
					array(
						'setting'  => 'about_show',
						'operator' => '==',
						'value'    => true
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_title',
				'label'    => __( 'Section title', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'text',
				'priority' => 30,
				'default'  => 'Who we are',
				'active_callback' => array(
					array(
						'setting'  => 'about_show',
						'operator' => '==',
						'value'    => true
					),
					array(
						'setting'  => 'about_number',
						'operator' => '==',
						'value'    => 'one'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_text',
				'label'    => __( 'Section text', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'text',
				'priority' => 40,
				'default'  => 'Nam imperdiet at elit eu tincidunt. Curabitur aliquet libero eget quam euismod, nec porttitor augue auctor. Vivamus quis orci vitae velit consectetur tincidunt in sit amet nisl. Donec ultricies sit amet urna eu tristique. Morbi sed aliquet ante. Vestibulum pulvinar et dolor id malesuada. Vestibulum in purus porttitor, placerat justo sit amet, interdum neque. Nulla et egestas velit.',
				'active_callback' => array(
					array(
						'setting'  => 'about_show',
						'operator' => '==',
						'value'    => true
					),
					array(
						'setting'  => 'about_number',
						'operator' => '==',
						'value'    => 'one'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_title1',
				'label'    => __( 'First section title', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'text',
				'priority' => 50,
				'default'  => 'Who we are',
				'active_callback' => array(
					array(
						'setting'  => 'about_show',
						'operator' => '==',
						'value'    => true
					),
					array(
						'setting'  => 'about_number',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_text1',
				'label'    => __( 'First section text', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'text',
				'priority' => 60,
				'default'  => 'Nam imperdiet at elit eu tincidunt. Curabitur aliquet libero eget quam euismod, nec porttitor augue auctor. Vivamus quis orci vitae velit consectetur tincidunt in sit amet nisl. Donec ultricies sit amet urna eu tristique. Morbi sed aliquet ante. Vestibulum pulvinar et dolor id malesuada. Vestibulum in purus porttitor, placerat justo sit amet, interdum neque. Nulla et egestas velit.',
				'active_callback' => array(
					array(
						'setting'  => 'about_show',
						'operator' => '==',
						'value'    => true
					),
					array(
						'setting'  => 'about_number',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_title2',
				'label'    => __( 'Second section title', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'text',
				'priority' => 70,
				'default'  => 'What we do',
				'active_callback' => array(
					array(
						'setting'  => 'about_show',
						'operator' => '==',
						'value'    => true
					),
					array(
						'setting'  => 'about_number',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

		axiom_america_Kirki::add_field( 'axiom_america', array(
				'settings' => 'about_text2',
				'label'    => __( 'Second section text', 'axiom-america' ),
				'section'  => 'about_front',
				'type'     => 'text',
				'priority' => 80,
				'default'  => 'Aliquam sollicitudin consequat felis, non ornare nibh ullamcorper a. Integer malesuada felis turpis, id imperdiet orci rhoncus ac. Aenean molestie dui in semper hendrerit. Nunc dolor sem, tincidunt in justo ac, semper vulputate velit. Proin in pellentesque elit. Morbi sit amet urna cursus, interdum nisi a, lobortis magna. Quisque fringilla ipsum tortor, non varius nisi molestie et.',
				'active_callback' => array(
					array(
						'setting'  => 'about_show',
						'operator' => '==',
						'value'    => true
					),
					array(
						'setting'  => 'about_number',
						'operator' => '==',
						'value'    => 'two'
					)
				)
		) );

		// Footer

		axiom_america_Kirki::add_section( 'footer', array(
		    'title'          => __( 'Footer Options' ),
		    'description'    => __( 'Specify options for the site footer.' ),
		    'priority'       => 170,
		    'capability'     => 'edit_theme_options',
		) );

			axiom_america_Kirki::add_field( 'axiom_america', array(
					'settings' => 'footer_text',
					'label'    => __( 'Text at the bottom of the footer', 'axiom-america' ),
					'section'  => 'footer',
					'type'     => 'text',
					'default'	 => esc_attr__( 'Axiom America LLC. All rights reserved.', 'axiom-america' ),
					'priority' => 10,
			) );

			axiom_america_Kirki::add_field( 'axiom_america', array(
					'settings' => 'footer_copyright',
					'label'    => __( 'Display the copyright year', 'axiom-america' ),
					'section'  => 'footer',
					'type'     => 'checkbox',
					'default'	 => '1',
					'priority' => 20,
			) );
