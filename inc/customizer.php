<?php
/**
 * hepouf Theme Customizer
 */


function hepouf_customize_register( $wp_customize ) {
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 */	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	//___General___//
    $wp_customize->add_section(
        'hepouf_general',
        array(
            'title' => __('General', 'hepouf'),
            'priority' => 9,
        )
    );
	//Logo Upload
	$wp_customize->add_setting(
		'site_logo',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_logo',
            array(
               'label'          => __( 'Upload your logo', 'hepouf' ),
			   'type' 			=> 'image',
               'section'        => 'hepouf_general',
               'settings'       => 'site_logo',
			   'priority' => 9,
            )
        )
    );
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon', 'hepouf' ),
			   'type' 			=> 'image',
               'section'        => 'hepouf_general',
               'settings'       => 'site_favicon',
            )
        )
    );
	//Apple touch icon 144
	$wp_customize->add_setting(
		'apple_touch_144',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'hepouf' ),
			   'type' 			=> 'image',
               'section'        => 'hepouf_general',
               'settings'       => 'apple_touch_144',
            )
        )
    );
	//Apple touch icon 114
	$wp_customize->add_setting(
		'apple_touch_114',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'hepouf' ),
			   'type' 			=> 'image',
               'section'        => 'hepouf_general',
               'settings'       => 'apple_touch_114',
            )
        )
    );
	//Apple touch icon 72
	$wp_customize->add_setting(
		'apple_touch_72',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'hepouf' ),
			   'type' 			=> 'image',
               'section'        => 'hepouf_general',
               'settings'       => 'apple_touch_72',
            )
        )
    );
	//Apple touch icon 57
	$wp_customize->add_setting(
		'apple_touch_57',
		array(
			'default-image' => '',
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'hepouf' ),
			   'type' 			=> 'image',
               'section'        => 'hepouf_general',
               'settings'       => 'apple_touch_57',
            )
        )
    );

	// Home
	$wp_customize->add_setting(
		'hepouf_home_excerpt',
		array(
			'sanitize_callback' => 'hepouf_sanitize_checkbox',
		)		
	);
	$wp_customize->add_control(
		'hepouf_home_excerpt',
		array(
			'type' => 'checkbox',
			'label' => __('Blog index', 'hepouf'),
			'section' => 'hepouf_excerpt',
		)
	);
	// Archive
	$wp_customize->add_setting(
		'hepouf_arch_excerpt',
		array(
			'sanitize_callback' => 'hepouf_sanitize_checkbox',
		)		
	);
	$wp_customize->add_control(
		'hepouf_arch_excerpt',
		array(
			'type' => 'checkbox',
			'label' => __('Archives, tags, categories, author', 'hepouf'),
			'section' => 'hepouf_excerpt',
		)
	);	
	// Search
	$wp_customize->add_setting(
		'hepouf_search_excerpt',
		array(
			'sanitize_callback' => 'hepouf_sanitize_checkbox',
		)		
	);
	$wp_customize->add_control(
		'hepouf_search_excerpt',
		array(
			'type' => 'checkbox',
			'label' => __('Search', 'hepouf'),
			'section' => 'hepouf_excerpt',
		)
	);                  

	$wp_customize->add_control(
		'body_fonts',
		array(
			'type' => 'select',
			'label' => __('Select your desired font for the body.', 'hepouf'),
			'section' => 'hepouf_typography',
			'choices' => $font_choices
		)
	);		

}
add_action( 'customize_register', 'hepouf_customize_register' );

/**
 * Sanitization
 */
function hepouf_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hepouf_customize_preview_js() {
	wp_enqueue_script( 'hepouf_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'hepouf_customize_preview_js' );
