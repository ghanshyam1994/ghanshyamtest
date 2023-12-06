<?php

if ( class_exists("Kirki")){

	Kirki::add_config('theme_config_id', array(
		'capability'   =>  'edit_theme_options',
		'option_type'  =>  'theme_mod',
	));

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'house_cleaning_logo_resizer',
		'label'       => esc_html__( 'Adjust Logo Size', 'house-cleaning' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_enable_logo_text',
		'section'     => 'title_tagline',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'house-cleaning' ) . '</h3>',
		'priority'    => 10,
	] );

  	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'house_cleaning_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'house-cleaning' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'house-cleaning' ),
			'off' => esc_html__( 'Disable', 'house-cleaning' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'house_cleaning_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'house-cleaning' ),
		'section'     => 'title_tagline',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'house-cleaning' ),
			'off' => esc_html__( 'Disable', 'house-cleaning' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_site_tittle_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Title Font Size', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'house_cleaning_site_tittle_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo a'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_site_tagline_font_heading',
		'section'     => 'title_tagline',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Site Tagline Font Size', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'house_cleaning_site_tagline_font_size',
		'type'        => 'number',
		'section'     => 'title_tagline',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.logo span'),
				'property' => 'font-size',
				'suffix' => 'px'
			),
		),
	) );

	// Theme Options Panel
	Kirki::add_panel( 'house_cleaning_theme_options_panel', array(
		'priority' => 10,
		'title'    => __( 'Theme Options', 'house-cleaning' ),
	) );

	// HEADER SECTION

	Kirki::add_section( 'house_cleaning_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'house-cleaning' ),
	    'description'    => esc_html__( 'Here you can add header information.', 'house-cleaning' ),
	    'panel'    => 'house_cleaning_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_enable_location_heading',
		'section'     => 'house_cleaning_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Location', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'house_cleaning_header_location',
		'section'  => 'house_cleaning_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_header_phone_number_heading',
		'section'     => 'house_cleaning_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Phone Number', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'house_cleaning_header_phone_number',
		'section'  => 'house_cleaning_section_header',
		'default'  => '',
		'sanitize_callback' => 'house_cleaning_sanitize_phone_number',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_header_email_heading',
		'section'     => 'house_cleaning_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Add Email', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'house_cleaning_header_email',
		'section'  => 'house_cleaning_section_header',
		'default'  => '',
		'sanitize_callback' => 'sanitize_email',
	] );
	
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_enable_button_heading',
		'section'     => 'house_cleaning_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Button Text', 'house-cleaning' ),
		'settings' => 'house_cleaning_header_button_text',
		'section'  => 'house_cleaning_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    =>  esc_html__( 'Button Link', 'house-cleaning' ),
		'settings' => 'house_cleaning_header_button_url',
		'section'  => 'house_cleaning_section_header',
		'default'  => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_enable_socail_link',
		'section'     => 'house_cleaning_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'house_cleaning_section_header',
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'house-cleaning' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'house-cleaning' ),
		'settings'     => 'house_cleaning_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'house-cleaning' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'house-cleaning' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'house-cleaning' ),
				'description' => esc_html__( 'Add the social icon url here.', 'house-cleaning' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 20
		],
	] );

	// WOOCOMMERCE SETTINGS

	Kirki::add_section( 'house_cleaning_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'house-cleaning' ),
		'description'    => esc_html__( 'Woocommerce Settings of themes', 'house-cleaning' ),
		'panel'    => 'woocommerce',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_shop_page_sidebar',
		'label'       => esc_html__( 'Enable/Disable Shop Page Sidebar', 'house-cleaning' ),
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layouts', 'house-cleaning' ),
		'settings'    => 'house_cleaning_shop_page_layout',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'house-cleaning' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'house-cleaning' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'house_cleaning_shop_page_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]

	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'label'       => esc_html__( 'Products Per Row', 'house-cleaning' ),
		'settings'    => 'house_cleaning_products_per_row',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => '3',
		'priority'    => 10,
		'choices'     => [
			'2' => '2',
			'3' => '3',
			'4' => '4',
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'label'       => esc_html__( 'Products Per Page', 'house-cleaning' ),
		'settings'    => 'house_cleaning_products_per_page',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => '9',
		'priority'    => 10,
		'choices'  => [
					'min'  => 0,
					'max'  => 50,
					'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_single_product_sidebar',
		'label'       => esc_html__( 'Enable / Disable Single Product Sidebar', 'house-cleaning' ),
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => 'true',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'label'       => esc_html__( 'Single Product Layout', 'house-cleaning' ),
		'settings'    => 'house_cleaning_single_product_sidebar_layout',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'house-cleaning' ),
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'house-cleaning' ),
		],
		'active_callback'  => [
			[
				'setting'  => 'house_cleaning_single_product_sidebar',
				'operator' => '===',
				'value'    => true,
			],
		]
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_products_button_border_radius_heading',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Products Button Border Radius', 'house-cleaning' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'house_cleaning_products_button_border_radius',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
		'choices'  => [
					'min'  => 1,
					'max'  => 50,
					'step' => 1,
				],
		'output' => array(
			array(
				'element'  => array('.woocommerce ul.products li.product .button',' a.checkout-button.button.alt.wc-forward','.woocommerce #respond input#submit', '.woocommerce a.button', '.woocommerce button.button','.woocommerce input.button','.woocommerce #respond input#submit.alt','.woocommerce button.button.alt','.woocommerce input.button.alt'),
				'property' => 'border-radius',
				'units' => 'px',
			),
		),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_sale_badge_position_heading',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Badge Position', 'house-cleaning' ) . '</h3>',
		'priority'    => 10,
	] );


	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'house_cleaning_sale_badge_position',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'     => 'right',
		'choices'     => [
			'right' => esc_html__( 'Right', 'house-cleaning' ),
			'left' => esc_html__( 'Left', 'house-cleaning' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_products_sale_font_size_heading',
		'section'     => 'house_cleaning_woocommerce_settings',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sale Font Size', 'house-cleaning' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'text',
		'settings'    => 'house_cleaning_products_sale_font_size',
		'section'     => 'house_cleaning_woocommerce_settings',
		'priority'    => 10,
		'output' => array(
			array(
				'element'  => array('.woocommerce span.onsale','.woocommerce ul.products li.product .onsale'),
				'property' => 'font-size',
				'units' => 'px',
			),
		),
	] );
	
	//ADDITIONAL SETTINGS

	Kirki::add_section( 'house_cleaning_additional_setting', array(
		'title'          => esc_html__( 'Additional Settings', 'house-cleaning' ),
		'description'    => esc_html__( 'Additional Settings of themes', 'house-cleaning' ),
		'panel'    => 'house_cleaning_theme_options_panel',
		'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_preloader_hide',
		'label'       => esc_html__( 'Here you can enable or disable your preloader.', 'house-cleaning' ),
		'section'     => 'house_cleaning_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );
 
	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'house-cleaning' ),
		'section'     => 'house_cleaning_additional_setting',
		'default'     => '0',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_single_page_layout_heading',
		'section'     => 'house_cleaning_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Page Layout', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'house_cleaning_single_page_layout',
		'section'     => 'house_cleaning_additional_setting',
		'default'     => 'One Column',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'house-cleaning' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'house-cleaning' ),
			'One Column' => esc_html__( 'One Column', 'house-cleaning' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_header_background_attachment_heading',
		'section'     => 'house_cleaning_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Attachment', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'house_cleaning_header_background_attachment',
		'section'     => 'house_cleaning_additional_setting',
		'default'     => 'scroll',
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'house-cleaning' ),
			'fixed' => esc_html__( 'Fixed', 'house-cleaning' ),
		],
		'output' => array(
			array(
				'element'  => '.header-image-box',
				'property' => 'background-attachment',
			),
		),
	 ) );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_header_overlay_heading',
		'section'     => 'house_cleaning_additional_setting',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Header Image Overlay', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_header_page_title',
		'label'       => esc_html__( 'Enable / Disable Header Image Page Title.', 'house-cleaning' ),
		'section'     => 'house_cleaning_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_header_breadcrumb',
		'label'       => esc_html__( 'Enable / Disable Header Image Breadcrumb.', 'house-cleaning' ),
		'section'     => 'house_cleaning_additional_setting',
		'default'     => '1',
		'priority'    => 10,
	] );

	// POST SECTION

	Kirki::add_section( 'house_cleaning_blog_post', array(
		'title'          => esc_html__( 'Post Settings', 'house-cleaning' ),
		'description'    => esc_html__( 'Here you can add post information.', 'house-cleaning' ),
		'panel'    => 'house_cleaning_theme_options_panel',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_post_layout_heading',
		'section'     => 'house_cleaning_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Layout', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'type'        => 'select',
		'settings'    => 'house_cleaning_post_layout',
		'section'     => 'house_cleaning_blog_post',
		'default'     => 'Right Sidebar',
		'choices'     => [
			'Left Sidebar' => esc_html__( 'Left Sidebar', 'house-cleaning' ),
			'Right Sidebar' => esc_html__( 'Right Sidebar', 'house-cleaning' ),
			'One Column' => esc_html__( 'One Column', 'house-cleaning' ),
			'Three Columns' => esc_html__( 'Three Columns', 'house-cleaning' ),
			'Four Columns' => esc_html__( 'Four Columns', 'house-cleaning' ),
		],
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_date_hide',
		'label'       => esc_html__( 'Enable / Disable Post Date', 'house-cleaning' ),
		'section'     => 'house_cleaning_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_author_hide',
		'label'       => esc_html__( 'Enable / Disable Post Author', 'house-cleaning' ),
		'section'     => 'house_cleaning_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_comment_hide',
		'label'       => esc_html__( 'Enable / Disable Post Comment', 'house-cleaning' ),
		'section'     => 'house_cleaning_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_blog_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Post Image', 'house-cleaning' ),
		'section'     => 'house_cleaning_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_length_setting_heading',
		'section'     => 'house_cleaning_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Blog Post Content Limit', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'house_cleaning_length_setting',
		'section'     => 'house_cleaning_blog_post',
		'default'     => '15',
		'priority'    => 10,
		'choices'  => [
					'min'  => -10,
					'max'  => 40,
		 			'step' => 1,
				],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Tag', 'house-cleaning' ),
		'settings'    => 'house_cleaning_single_post_tag',
		'section'     => 'house_cleaning_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'label'       => esc_html__( 'Enable / Disable Single Post Category', 'house-cleaning' ),
		'settings'    => 'house_cleaning_single_post_category',
		'section'     => 'house_cleaning_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'house_cleaning_single_post_featured_image',
		'label'       => esc_html__( 'Enable / Disable Single Post Image', 'house-cleaning' ),
		'section'     => 'house_cleaning_blog_post',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_single_post_radius',
		'section'     => 'house_cleaning_blog_post',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Single Post Image Border Radius(px)', 'house-cleaning' ) . '</h3>',
	] );

	Kirki::add_field( 'theme_config_id', array(
		'settings'    => 'house_cleaning_single_post_border_radius',
		'label'       => __( 'Enter a value in pixels. Example:15px', 'house-cleaning' ),
		'type'        => 'text',
		'section'     => 'house_cleaning_blog_post',
		'transport' => 'auto',
		'output' => array(
			array(
				'element'  => array('.post-img img'),
				'property' => 'border-radius',
			),
		),
	) );

	// FOOTER SECTION

	Kirki::add_section( 'house_cleaning_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'house-cleaning' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'house-cleaning' ),
        'panel'    => 'house_cleaning_theme_options_panel',
		'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_footer_text_heading',
		'section'     => 'house_cleaning_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'house-cleaning' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'house_cleaning_footer_text',
		'section'  => 'house_cleaning_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_footer_enable_heading',
		'section'     => 'house_cleaning_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'house-cleaning' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'house_cleaning_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'house-cleaning' ),
		'section'     => 'house_cleaning_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'house-cleaning' ),
			'off' => esc_html__( 'Disable', 'house-cleaning' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'house_cleaning_footer_background_widget_heading',
		'section'     => 'house_cleaning_footer_section',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Widget Background', 'house-cleaning' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id',
	[
		'settings'    => 'house_cleaning_footer_background_widget',
		'type'        => 'background',
		'section'     => 'house_cleaning_footer_section',
		'default'     => [
			'background-color'      => 'rgba(18,18,18,1)',
			'background-image'      => '',
			'background-repeat'     => 'no-repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		],
		'transport'   => 'auto',
		'output'      => [
			[
				'element' => '.footer-widget',
			],
		],
	]);
}
