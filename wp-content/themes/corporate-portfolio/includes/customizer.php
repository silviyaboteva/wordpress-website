<?php
/**
 * corporate-portfolio Theme Customizer.
 *
 * @package corporate-portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function corporate_portfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.logo a',
			'container_inclusive' => false,
			'render_callback' => 'corporate_portfolio_customize_partial_blogname',
		) );
	}


	/*    	
	=================================================
	General Settting
	=================================================
	*/
	$wp_customize->add_section( 'cp_basic_settings', array(
		'title'          => esc_html__( 'Basic Settings', 'corporate-portfolio' ),
		'priority'       => 49,
	) );

	// Setting for blog layout
	$wp_customize->add_setting( 'cp_blog_layout', array(
		'default' => 'blogright',
		'sanitize_callback' => 'corporate_portfolio_sanitize_bloglayout',
	) );
	// Control for blog layout	
	$wp_customize->add_control( 'cp_blog_layout', array(
	'label'   => esc_html__( 'Blog Layout', 'corporate-portfolio' ),
	'section' => 'cp_basic_settings',
	'priority' => 1,
	'type'    => 'radio',
		'choices' => array(
			'blogright' => esc_html__( 'Blog with Right Sidebar', 'corporate-portfolio' ),
			'blogleft' => esc_html__( 'Blog with Left Sidebar', 'corporate-portfolio' ),
			'blogwide' => esc_html__( 'Blog Full Width &amp; no Sidebars', 'corporate-portfolio' ),
		),
	));

	/*    	
	=================================================
	Color customzer
	=================================================
	*/

	$wp_customize->add_setting( 'cp_accentcolor', array(
		'default'        => '#00af81',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cp_accentcolor', array(
		'label'    => esc_html__( 'Link And Accent Color', 'corporate-portfolio' ),
		'section'  => 'colors',
		'description' => esc_html__( 'This changes both the link and accent color used in the theme.', 'corporate-portfolio' ),
		'priority'=> 1
	) ) );

	/*    	
	=================================================
	Home Page Customizer
	=================================================
	*/

	$wp_customize->add_panel( 'homepage_setting_panel', array( // General Panel
	    'priority'       => 51,
	    'capability'     => 'edit_theme_options',
	    'title'          => __('Home Page', 'corporate-portfolio'),
	    'description'    => __('Change the home page settings', 'corporate-portfolio' ),
	));

	/*HOME PAGE BANNER SETTING*/

	$wp_customize->add_section( 'home_page_banner' , array(
	    'title'       => esc_html__( 'Billboard Section', 'corporate-portfolio' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel'
	) );

    $wp_customize->add_setting( 'cp_button_link', array(
		'sanitize_callback' => 'corporate_portfolio_sanitize_url',
	) );

	$wp_customize->add_control( 'cp_button_link', array(
		'label'    => esc_html__( 'Button Link', 'corporate-portfolio' ),
		'section'  => 'home_page_banner',
		'type'     => 'text',
		'priority' => 1,
	) );

	//sub-heading
    $wp_customize->add_setting( 'cp_button_text', array(
		'default'        => '',
		'sanitize_callback' => 'corporate_portfolio_sanitize_text',
	) );

	$wp_customize->add_control( 'cp_button_text', array(
		'label'    => esc_html__( 'Button Text', 'corporate-portfolio' ),
		'section'  => 'home_page_banner',
		'type'     => 'textarea',
		'priority' => 2,
	) );

	/*Homepage slider section section */
	$wp_customize->add_section( 'cp_homepage_slider_post', array(
		'title'     => esc_html__( 'Homepage Slider', 'corporate-portfolio' ),
	  	'priority'    => 2,
	  	'panel' => 'homepage_setting_panel'
	) );

	//show featured post section on homepage
	$wp_customize->add_setting( 'homepage_show_slider_post', array(
		'default' => 0,
        'sanitize_callback' => 'corporate_portfolio_sanitize_checkbox',
    ) );

	$wp_customize->add_control( 'homepage_show_slider_post', array(
	    'section' => 'cp_homepage_slider_post',
	    'label' => esc_html__('Show Slider Section', 'corporate-portfolio' ),
	    'type' => 'checkbox',
	    'priority' => 1,
	) );

	//select number of post for slider
    $wp_customize->add_setting( 'home_slider_select_number_of_post', array(
		'default'        => 3,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'home_slider_select_number_of_post', array(
		'label'    => esc_html__( 'Total number of post to display', 'corporate-portfolio' ),
		'description' => esc_html__( 'This display total number of latest post published', 'corporate-portfolio' ),
		'section'  => 'cp_homepage_slider_post',
		'type'     => 'number',
		'priority' => 2,
	) );

  	$wp_customize->add_setting( 'homepage_slider_post', array(
        'sanitize_callback' => 'corporate_portfolio_sanitize_category_dropdown',
    ) );

	$wp_customize->add_control( new Corporate_portfolio_category_dropdown( $wp_customize, 'homepage_slider_post', array(
		'label' => esc_html__( 'Choose Post From Category', 'corporate-portfolio' ),
		'section' => 'cp_homepage_slider_post',
		'description' => esc_html__( 'Select Category to show Slider in Slider Section','corporate-portfolio'),
		'type' => 'select',
		'priority' => 3,
     
   ) ) );


	/*Homepage featured post section */
	$wp_customize->add_section( 'cp_homepage_featured_post', array(
		'title'     => esc_html__( 'Featured Post', 'corporate-portfolio' ),
	  	'priority'    => 3,
	  	'panel' => 'homepage_setting_panel'
	) );

	//show featured post section on homepage
	$wp_customize->add_setting( 'homepage_show_featured_post', array(
		'default' => 0,
        'sanitize_callback' => 'corporate_portfolio_sanitize_checkbox',
    ) );

	$wp_customize->add_control( 'homepage_show_featured_post', array(
	    'section' => 'cp_homepage_featured_post',
	    'label' => esc_html__('Show Featured Post', 'corporate-portfolio' ),
	    'type' => 'checkbox',
	    'priority' => 1,
	) );

	//select number of post for slider
    $wp_customize->add_setting( 'home_featured_select_number_of_post', array(
		'default'        => 3,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'home_featured_select_number_of_post', array(
		'label'    => esc_html__( 'Total number of post to display', 'corporate-portfolio' ),
		'description' => esc_html__( 'This display total number of latest post published', 'corporate-portfolio' ),
		'section'  => 'cp_homepage_featured_post',
		'type'     => 'number',
		'priority' => 2,
	) );

  	$wp_customize->add_setting( 'homepage_featured_post', array(
        'sanitize_callback' => 'corporate_portfolio_sanitize_category_dropdown',
    ) );

	$wp_customize->add_control( new Corporate_portfolio_category_dropdown( $wp_customize, 'homepage_featured_post', array(
		'label' => esc_html__( 'Choose Featured Post From Category', 'corporate-portfolio' ),
		'section' => 'cp_homepage_featured_post',
		'description' => esc_html__( 'Select Category to show posts in Featured Section','corporate-portfolio'),
		'type' => 'select',
		'priority' => 3,
     
   ) ) );

	/*blog post section */
	$wp_customize->add_section( 'cp_homepage_blog_section', array(
		'title'     => esc_html__( 'Blog Post Section', 'corporate-portfolio' ),
	  	'priority'    => 4,
	  	'panel' => 'homepage_setting_panel'
	) );

	//hide blog section from homepage
	$wp_customize->add_setting( 'homepage_hide_blog_section', array(
		'default' => 0,
        'sanitize_callback' => 'corporate_portfolio_sanitize_checkbox',
    ) );

	$wp_customize->add_control( 'homepage_hide_blog_section', array(
	    'section' => 'cp_homepage_blog_section',
	    'label' => esc_html__('Hide Blog Post Section', 'corporate-portfolio' ),
	    'type' => 'checkbox',
	    'priority' => 1,
	) );

	//select number of post for slider
    $wp_customize->add_setting( 'home_blog_select_number_of_post', array(
		'default'        => 3,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'home_blog_select_number_of_post', array(
		'label'    => esc_html__( 'Total number of post to display', 'corporate-portfolio' ),
		'description' => esc_html__( 'This display total number of latest post published', 'corporate-portfolio' ),
		'section'  => 'cp_homepage_blog_section',
		'type'     => 'number',
		'priority' => 2,
	) );


	/*    	
	=================================================
	Footer Customizer
	=================================================
	*/

	//foter basic setting
	$wp_customize->add_section( 'cp_footerbasicsetting' , array(
	    'title'       => __( 'Footer Setting', 'corporate-portfolio' ),
	    'priority'    => 51,
	) );

	//hide copyright section
	$wp_customize->add_setting( 'footer_hide_copyright_section', array(
		'default' => 0,
        'sanitize_callback' => 'corporate_portfolio_sanitize_checkbox',
    ) );

	$wp_customize->add_control( 'footer_hide_copyright_section', array(
	    'section' => 'cp_footerbasicsetting',
	    'label' => esc_html__('Hide copyright section', 'corporate-portfolio' ),
	    'type' => 'checkbox',
	    'priority' => 1,
	) );

	//footer top tagline
	$wp_customize->add_setting( 'cp_footer_copyright_text', array(
		'default'        => '',
		'sanitize_callback' => 'corporate_portfolio_sanitize_text',
	) );

	$wp_customize->add_control( 'cp_footer_copyright_text', array(
		'label'    => esc_html__( 'Footer Copyright Text', 'corporate-portfolio' ),
		'description' => esc_html__( 'This field changes the footer copyright text.', 'corporate-portfolio' ),
		'section'  => 'cp_footerbasicsetting',
		'type'     => 'textarea',
		'priority' => 2,
	) );

} //end of theme customizer

add_action( 'customize_register', 'corporate_portfolio_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function corporate_portfolio_customize_preview_js() {
	wp_enqueue_script( 'corporate_portfolio_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'corporate_portfolio_customize_preview_js' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since corporate-portfolio  1.0
 * @see corporate_portfolio_customize_partial_blogname()
 *
 * @return void
 */
function corporate_portfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * adds sanitization callback function : checkbox
 * @package corporate-portfolio 
*/
function corporate_portfolio_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}	

/**
 * adds sanitization callback function : URL
 * @package corporate-portfolio 
 * @version 1.0
*/
function corporate_portfolio_sanitize_url( $value) {
	$value = esc_url_raw( $value);
	return $value;
}

/**
 * adds sanitization callback function : TEXT
 * @package corporate-portfolio 
 * @version 1.0
*/
function corporate_portfolio_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitize radio checkbox
 * @since corporate-portfolio 1.0
 * @see corporate_portfolio_sanitize_bloglayout()
 * @return sanitiize data
 */
function corporate_portfolio_sanitize_bloglayout( $input ) {
    $valid = array(
				'blogright' => __( 'Blog with Right Sidebar', 'corporate-portfolio' ),
				'blogleft' => __( 'Blog with Left Sidebar', 'corporate-portfolio' ),
				'blogwide' => __( 'Blog Full Width &amp; no Sidebars', 'corporate-portfolio' ),
    );
 
     if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * adds sanitization callback function for numeric data : number
 * @package corporate-portfolio
 * @version 1.0
*/

function corporate_portfolio_sanitize_number( $value ) {
    $value = (int) $value; // Force the value into integer type.
    return ( 0 < $value ) ? $value : null;
}

/**
 * adds sanitization callback function for numeric data : category dropdown
 * @package corporate-portfolio
 * @version 1.0
*/
function corporate_portfolio_sanitize_category_dropdown( $input ) {
    return absint( $input );
    
}