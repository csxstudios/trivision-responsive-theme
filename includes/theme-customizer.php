<?php
new theme_customizer();

class theme_customizer
{
    public function __construct()
    {
        add_action ('admin_menu', array(&$this, 'customizer_admin'));
        add_action( 'customize_register', array(&$this, 'trivision_customizer' ));
    }

    /**
     * Add the Customize link to the admin menu
     * @return void
     */
    public function customizer_admin() {
        add_theme_page( 'Customize', 'Theme Options', 'edit_theme_options', 'customize.php' );
    }

    /**
     * Customizer manager
     * @param  WP_Customizer_Manager $wp_manager
     * @return void
     */
    public function trivision_customizer( $wp_manager )
    {
        $this->demo_section( $wp_manager );
    }

    public function demo_section( $wp_manager )
    {
		$themedir = get_template_directory_uri();
		$themelogo = $themedir.'/images/trivision-logo.png';
		$themelogoscroll = $themedir.'/images/trivision-logo-scroll.png';
		$themelogofavicon = $themedir.'/favicon.png';
		$themesearch = $themedir.'/images/heading-about.jpg';
		$themelogofooter = $themedir.'/images/logo-footer-bug.png';

        $wp_manager->add_section( 'customiser_demo_section', array(
            'title'          => 'TriVision Theme Controls',
            'priority'       => 35,
        ) );

        // WP_Customize_Image_Control
        $wp_manager->add_setting( 'logo_main', array(
            'default'        => $themelogo,
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'logo_main', array(
            'label'   => 'Main Logo',
            'section' => 'customiser_demo_section',
            'settings'   => 'logo_main',
            'priority' => 1,
			'description' => 'Maximum logo dimensions should be 120px high. Default logo is 260x120 with 35px gap at top and bottom.'
        ) ) );
		
		// WP_Customize_Image_Control
        //$wp_manager->add_setting( 'logo_scroll', array(
        //    'default'        => $themelogoscroll,
        //) );

        //$wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'logo_scroll', //array(
        //    'label'   => 'Scroll Logo',
        //    'section' => 'customiser_demo_section',
        //    'settings'   => 'logo_scroll',
        //    'priority' => 2,
		//	'description' => 'Logo dimensions should be 73px high. Default logo is 194x73 with 10px gap at top and bottom.'
        //) ) );
		
		// WP_Customize_Image_Control
        $wp_manager->add_setting( 'logo_footer', array(
            'default'        => $themelogofooter,
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'logo_footer', array(
            'label'   => 'Footer Watermark Logo',
            'section' => 'customiser_demo_section',
            'settings'   => 'logo_footer',
            'priority' => 3,
			'description' => 'Demo watermark PNG size is 629x242 that is already cropped in the bottom.'
        ) ) );
		
		// WP_Customize_Image_Control
        $wp_manager->add_setting( 'logo_favicon', array(
            'default'        => $themelogofavicon,
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'logo_favicon', array(
            'label'   => 'Favicon',
            'section' => 'customiser_demo_section',
            'settings'   => 'logo_favicon',
            'priority' => 3,
			'description' => ''
        ) ) );
		
		// Select control
        $wp_manager->add_setting( 'font_setting', array(
            'default'        => 'Open Sans',
        ) );

        $wp_manager->add_control( 'font_setting', array(
            'label'   => 'Select Font',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("Titillium Web" => "Titillium Web", "Open Sans" => "Open Sans", "Lato" => "Lato", "Montserrat" => "Montserrat", "PT Sans" => "PT Sans"),
            'priority' => 4,
			'description' => ''
        ) );
		
		// Select control
        $wp_manager->add_setting( 'symbol_setting', array(
            'default'        => "circle",
        ) );

        $wp_manager->add_control( 'symbol_setting', array(
            'label'   => 'Select Symbol',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("circle" => "fa-circle", "star" => "fa-star", "angle-right" => "fa-angle-right", "play-triangle" => "fa-play", "none" => "none"),
            'priority' => 4,
			'description' => 'Font Awesome Symbol'
        ) );
		
		// Select control
        $wp_manager->add_setting( 'invert_setting', array(
            'default'        => "color",
        ) );

        $wp_manager->add_control( 'invert_setting', array(
            'label'   => 'Scroll Logo Effect',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("color" => "Full Color", "knockout" => "Knockout"),
            'priority' => 4,
			'description' => 'Show knockout of logo in white on scroll'
        ) );
		
		// Color control
        $wp_manager->add_setting( 'color_links', array(
            'default'        => '#231f20',
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'color_links', array(
            'label'   => 'Links Color',
            'section' => 'customiser_demo_section',
            'settings'   => 'color_links',
            'priority' => 4,
			'description' => 'Menu and Hyperlinks Color'
        ) ) );
		
		// Color control
        $wp_manager->add_setting( 'color_accent', array(
            'default'        => '#FAB702',
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'color_accent', array(
            'label'   => 'Accent Color',
            'section' => 'customiser_demo_section',
            'settings'   => 'color_accent',
            'priority' => 5,
			'description' => 'Hover accent color'
        ) ) );
		
		// Color control
        $wp_manager->add_setting( 'color_menu', array(
            'default'        => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'color_menu', array(
            'label'   => 'Menu Background Color',
            'section' => 'customiser_demo_section',
            'settings'   => 'color_menu',
            'priority' => 5,
			'description' => ''
        ) ) );
		
		// Color control
        $wp_manager->add_setting( 'color_footer', array(
            'default'        => '#111111',
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'color_footer', array(
            'label'   => 'Footer BG',
            'section' => 'customiser_demo_section',
            'settings'   => 'color_footer',
            'priority' => 6,
			'description' => ''
        ) ) );
		
		// Color control
        $wp_manager->add_setting( 'color_copyright', array(
            'default'        => '#0b0b0b',
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'color_copyright', array(
            'label'   => 'Copyright BG',
            'section' => 'customiser_demo_section',
            'settings'   => 'color_copyright',
            'priority' => 7,
			'description' => ''
        ) ) );
		
		// Color control
        $wp_manager->add_setting( 'color_preloader', array(
            'default'        => '#000000',
			'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_manager->add_control( new WP_Customize_Color_Control( $wp_manager, 'color_preloader', array(
            'label'   => 'Preloader Background Color',
            'section' => 'customiser_demo_section',
            'settings'   => 'color_preloader',
            'priority' => 7,
			'description' => ''
        ) ) );
		
		// Radio control
        $wp_manager->add_setting( 'option_preloader', array(
            'default'        => '1',
        ) );

        $wp_manager->add_control( 'option_preloader', array(
            'label'   => 'Show Preloader',
            'section' => 'customiser_demo_section',
            'type'    => 'radio',
            'choices' => array("1" => "On", "0" => "Off"),
            'priority' => 7,
			'description' => 'Show preloader setting.'
        ) );
		
		// Select control
        $wp_manager->add_setting( 'header_position', array(
            'default'        => 'ontop',
        ) );

        $wp_manager->add_control( 'header_position', array(
            'label'   => 'Header Setting',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("ontop" => "On Top", "above" => "Above"),
            'priority' => 7,
			'description' => 'Whether the header is ontop of the slider or above.'
        ) );
		
		// Select control
        $wp_manager->add_setting( 'title_align', array(
            'default'        => 'left',
        ) );

        $wp_manager->add_control( 'title_align', array(
            'label'   => 'Page Title Align Setting',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("left" => "Left", "center" => "Center", "right" => "Right"),
            'priority' => 7,
			'description' => ''
        ) );
		
		// Select control
        $wp_manager->add_setting( 'menu_width', array(
            'default'        => 'container',
        ) );

        $wp_manager->add_control( 'menu_width', array(
            'label'   => 'Menu Container/Full-Width',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("container" => "Container", "container-fluid" => "Full-Width"),
            'priority' => 7,
			'description' => ''
        ) );
		
		// Select control
        $wp_manager->add_setting( 'topnav_display', array(
            'default'        => "On",
        ) );

        $wp_manager->add_control( 'topnav_display', array(
            'label'   => 'Display Top Nav',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("on" => "On", "off" => "Off (hamburger menu)", "menu" => "Off"),
            'priority' => 7,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_opacity1', array(
            'default'        => "0",
        ) );

        $wp_manager->add_control( 'text_opacity1', array(
            'label'   => 'Default Menu Opacity',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 7,
			'description' => 'Use decimal values of opacity percentage. For 50% opacity, type 0.5 in the box. Default is 0.8 which is the same as 80% opacity.'
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_opacity2', array(
            'default'        => "0.8",
        ) );

        $wp_manager->add_control( 'text_opacity2', array(
            'label'   => 'Scrolling Menu Opacity',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 7,
			'description' => 'Opacity of the menu when scrolling down. Default is 0.8 which is the same as 80% opacity.'
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_facebook', array(
            'default'        => "https://www.facebook.com/",
        ) );

        $wp_manager->add_control( 'text_facebook', array(
            'label'   => 'Facebook Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_twitter', array(
            'default'        => "https://www.twitter.com/",
        ) );

        $wp_manager->add_control( 'text_twitter', array(
            'label'   => 'Twitter Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_youtube', array(
            'default'        => "https://www.youtube.com/",
        ) );

        $wp_manager->add_control( 'text_youtube', array(
            'label'   => 'YouTube Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_yelp', array(
            'default'        => "https://www.yelp.com/",
        ) );

        $wp_manager->add_control( 'text_yelp', array(
            'label'   => 'Yelp Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_google', array(
            'default'        => "https://plus.google.com/",
        ) );

        $wp_manager->add_control( 'text_google', array(
            'label'   => 'Google+ Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_pinterest', array(
            'default'        => "https://www.pinterest.com/",
        ) );

        $wp_manager->add_control( 'text_pinterest', array(
            'label'   => 'Pinterest Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_instagram', array(
            'default'        => "https://www.instagram.com/",
        ) );

        $wp_manager->add_control( 'text_instagram', array(
            'label'   => 'Instagram Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_linkedin', array(
            'default'        => "https://www.linkedin.com/",
        ) );

        $wp_manager->add_control( 'text_linkedin', array(
            'label'   => 'LinkedIn Link',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_envelope', array(
            'default'        => "",
        ) );

        $wp_manager->add_control( 'text_envelope', array(
            'label'   => 'Email',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_phone', array(
            'default'        => "",
        ) );

        $wp_manager->add_control( 'text_phone', array(
            'label'   => 'Phone',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 8,
			'description' => ''
        ) );
		
		// Select control
        $wp_manager->add_setting( 'copyright_div', array(
            'default'        => 'separate',
        ) );

        $wp_manager->add_control( 'copyright_div', array(
            'label'   => 'Copyright Separation Setting',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("separate" => "Separate", "combined" => "Combined"),
            'priority' => 97,
			'description' => 'Whether copyright text should be in a separate colored section or combined into one footer.'
        ) );
		
		// Radio control
        $wp_manager->add_setting( 'copyright_setting', array(
            'default'        => '0',
        ) );

        $wp_manager->add_control( 'copyright_setting', array(
            'label'   => 'Copyright Year Setting',
            'section' => 'customiser_demo_section',
            'type'    => 'radio',
            'choices' => array("0" => "Current Year Only", "1" => "Year Range"),
            'priority' => 98,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_year', array(
            'default'        => "1999",
        ) );

        $wp_manager->add_control( 'text_year', array(
            'label'   => 'Copyright Start Year',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 99,
			'description' => ''
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_copyright', array(
            'default'        => "Company Name, LLC. All Rights Reserved.",
        ) );

        $wp_manager->add_control( 'text_copyright', array(
            'label'   => 'Copyright Text',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 100,
			'description' => ''
        ) );
		
		// Radio control
        $wp_manager->add_setting( 'copyright_credit', array(
            'default'        => '1',
        ) );

        $wp_manager->add_control( 'copyright_credit', array(
            'label'   => 'Copyright Credit',
            'section' => 'customiser_demo_section',
            'type'    => 'radio',
            'choices' => array("1" => "On", "0" => "Off"),
            'priority' => 101,
			'description' => 'Marketing & Web Development by TriVision Creative'
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_404', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( 'text_404', array(
            'label'   => '404 Text',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 101,
			'description' => ''
        ) );
		
		// Select control
        $wp_manager->add_setting( 'footer_columns', array(
            'default'        => '3',
        ) );

        $wp_manager->add_control( 'footer_columns', array(
            'label'   => 'Footer Columns',
            'section' => 'customiser_demo_section',
            'type'    => 'select',
            'choices' => array("3" => "3", "4" => "4", "2" => "2", "1" => "1", "5" => "5"),
            'priority' => 102,
			'description' => ''
        ) );
		
		// WP_Customize_Image_Control
        $wp_manager->add_setting( 'search_image', array(
            'default'        => $themesearch,
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'search_image', array(
            'label'   => 'Search Banner',
            'section' => 'customiser_demo_section',
            'settings'   => 'search_image',
            'priority' => 103,
			'description' => 'Banner image for search results page.'
        ) ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_status', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( 'text_status', array(
            'label'   => 'Status Text',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 104,
			'description' => 'Top menu title for status link with badge.'
        ) );
		
		// Textbox control
        $wp_manager->add_setting( 'text_status_slug', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( 'text_status_slug', array(
            'label'   => 'Status Loop Slug',
            'section' => 'customiser_demo_section',
            'type'    => 'text',
            'priority' => 105,
			'description' => 'Slug for the type of posts to count in badge.'
        ) );
		
		// Radio control
        $wp_manager->add_setting( 'option_badge', array(
            'default'        => '0',
        ) );

        $wp_manager->add_control( 'option_badge', array(
            'label'   => 'Status Badge Display',
            'section' => 'customiser_demo_section',
            'type'    => 'radio',
            'choices' => array("1" => "On", "0" => "Off"),
            'priority' => 106,
			'description' => 'Show badge next to Status link in top nav.'
        ) );
		
		// WP_Customize_Image_Control
        $wp_manager->add_setting( 'cta_image', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'cta_image', array(
            'label'   => 'CTA Image',
            'section' => 'customiser_demo_section',
            'settings'   => 'cta_image',
            'priority' => 107,
			'description' => 'Sticky block image on bottom right for a custom call to action.'
        ) ) );
		
    }

}

?>