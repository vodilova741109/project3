<?php
if ( class_exists( 'Kirki' ) ) {
    /*=====================================================
        Config
    =====================================================*/
    Kirki::add_config( 'wt', array(
        'capability'    => 'edit_theme_options',
        'option_type'   => 'theme_mod',
    ) );
    /*=====================================================
        Home page settings
    =====================================================*/
    /* panel - home settings */
	Kirki::add_panel( 'wt_home_settings', array(
	    'priority'    => 50,
	    'title'       => esc_html__( 'Homepage Layout Settings', 'world-times' ),
	    'description' => esc_html__( 'Homepage related settings', 'world-times' ),
    ) );
    /* section - featured */
    Kirki::add_section( 'featured_settings', array(
		'title'          => esc_attr__( 'Featured Area Options', 'world-times' ),
		'priority'       => 10,
		'panel'       => 'wt_home_settings',
		'capability'     => 'edit_theme_options',
    ) );
    /* fields - featured */
    Kirki::add_field( 'wt', array(
		'type'        => 'toggle',
		'settings'    => 'featured_section',
		'label'       => esc_attr__( 'Featured Section', 'world-times' ),
		'description' => esc_attr__( 'Show / hide the Featured section at the top of content area in homrpage.', 'world-times' ),
		'section'     => 'featured_settings',
		'default'     => true,
		'priority'    => 10,
    ) );
    Kirki::add_field( 'wt', array(
		'type'        => 'radio',
		'settings'    => 'post_type',
		'label'       => esc_attr__( 'Post type', 'world-times' ),
		'description' => esc_attr__( 'Choose which type of post you want to show "Featured posts" or "latest posts"', 'world-times' ),
		'section'     => 'featured_settings',
		'default'     => 'featured',
        'priority'    => 10,
        'choices'     => array(
            'featured'   => esc_attr('Featured Posts', 'world-times'),
            'latest'   => esc_attr('Latest Posts', 'world-times'),
        ),
    ) );
    Kirki::add_field( 'wt', array(
		'type'        => 'number',
		'settings'    => 'post_count',
		'label'       => esc_attr__( 'Post Count', 'world-times' ),
		'description' => esc_attr__( 'Number of post to be show in featured area.', 'world-times' ),
		'section'     => 'featured_settings',
		'default'     => 5,
		'priority'    => 10,
    ));
    /* section - latest */
    Kirki::add_section( 'latest_settings', array(
		'title'          => esc_attr__( 'Latest Post Section', 'world-times' ),
		'priority'       => 10,
		'panel'       => 'wt_home_settings',
		'capability'     => 'edit_theme_options',
    ) );
    /* fields - latest */
    Kirki::add_field( 'wt', array(
		'type'        => 'toggle',
		'settings'    => 'latest_section',
		'label'       => esc_attr__( 'Latest Section', 'world-times' ),
		'description' => esc_attr__( 'Show / hide the latest post section at the top of content area in homrpage.', 'world-times' ),
		'section'     => 'latest_settings',
		'default'     => true,
		'priority'    => 10,
    ) );
    Kirki::add_field( 'wt', array(
        'type'        => 'radio-image',
        'settings'    => 'latest_section_layout',
        'label'       => esc_html__( 'Latest Section Layout', 'world-times' ),
        'section'     => 'latest_settings',
        'default'     => 'layout1',
        'priority'    => 10,
        'choices'     => array(
            'layout1'   => get_template_directory_uri() . '/assets/images/layout1.jpg',
            'layout2'   => get_template_directory_uri() . '/assets/images/layout2.jpg',
            'layout3'   => get_template_directory_uri() . '/assets/images/layout3.jpg',
        ),
    ));
    Kirki::add_field( 'wt', array(
        'type'        => 'text',
        'settings'    => 'latest_section_title',
        'label'       => esc_attr__( 'Latest Section Title', 'world-times' ),
        'description' => esc_attr__( 'This will be the Title of the section.', 'world-times' ),
        'section'     => 'latest_settings',
        'default'     => '',
    ));
    Kirki::add_field( 'wt', array(
        'type'        => 'number',
        'settings'    => 'latest_section_post_count',
        'label'       => esc_attr__( 'Number of Post', 'world-times' ),
        'description' => esc_attr__( 'Number of post to be shown in this section.', 'world-times' ),
        'section'     => 'latest_settings',
        'default'     => 7,
    ));
    /* section - category */
    Kirki::add_section( 'category_settings', array(
		'title'          => esc_attr__( 'Category Area Options', 'world-times' ),
		'priority'       => 10,
		'panel'       => 'wt_home_settings',
		'capability'     => 'edit_theme_options',
    ) );
    /* fields - category */
    Kirki::add_field( 'wt', array(
        'type'        => 'repeater',
        'row_label' => array(
            'type'  => 'field',
            'value' => esc_html__('your custom value', 'world-times' ),
            'field' => 'category_section_title',
        ),
        'button_label' => esc_html__('Add new Category Section', 'world-times' ),
		'settings'    => 'category_area',
		'label'       => esc_attr__( 'Category Area', 'world-times' ),
		'description' => esc_attr__( 'Category section settings. Add or remove as many Section as you want.', 'world-times' ),
		'section'     => 'category_settings',
        'priority'    => 10,
        'transport'   => 'postMessage',
        'default'     => array(
            array(
                'category_section_layout' => 'layout1',
                'category_section_title' => 'Section Title',
                'category_section_category'  => '',
                'category_section_post_count' => 4,
            ),
        ),
        'fields' => array(
            'category_section_layout' => array(
                'type'        => 'radio-image',
                'label'       => esc_html__( 'Category Section Layout', 'world-times' ),
                'default'     => 'layout1',
                'priority'    => 10,
                'choices'     => array(
                    'layout1'   => get_template_directory_uri() . '/assets/images/layout1.jpg',
                    'layout2'   => get_template_directory_uri() . '/assets/images/layout2.jpg',
                    'layout3'   => get_template_directory_uri() . '/assets/images/layout3.jpg',
                ),
            ),
            'category_section_title' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Category Section Title', 'world-times' ),
				'description' => esc_attr__( 'This will be the Title of the section.', 'world-times' ),
				'default'     => '',
			),
			'category_section_category' => array(
				'type'        => 'select',
				'label'       => esc_attr__( 'Post Category', 'world-times' ),
				'description' => esc_attr__( 'Choose a category. The posts in that category will be shown in this section.', 'world-times' ),
				'default'     => '',
				'choices'     => get_categories_select(),
			),
            'category_section_post_count' => array(
				'type'        => 'text',
				'label'       => esc_attr__( 'Number of Post', 'world-times' ),
				'description' => esc_attr__( 'Number of post to be shown in this section.', 'world-times' ),
				'default'     => 4,
			),
        ),
    ) );
    /* section - single post */
    Kirki::add_section( 'single_post', array(
		'title'          => esc_attr__( 'Single Post Settings', 'world-times' ),
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
    ) );
    /* fields - single post */
    Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'share_links',
		'label'       => esc_attr__( 'Share Links', 'world-times' ),
		'description' => esc_attr__( 'Show / hide the share section in single post view.', 'world-times' ),
		'section'     => 'single_post',
		'default'     => true,
		'priority'    => 10,
	) );
	Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'prev_next_post',
		'label'       => esc_attr__( 'Previous Next Post section', 'world-times' ),
		'description' => esc_attr__( 'Show / hide the Previous & Next Post section in single post view.', 'world-times' ),
		'section'     => 'single_post',
		'default'     => true,
		'priority'    => 10,
    ) );
    Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'related_posts',
		'label'       => esc_attr__( 'Related posts section', 'world-times' ),
		'description' => esc_attr__( 'Show / hide the Related Posts section in single post view.', 'world-times' ),
		'section'     => 'single_post',
		'default'     => true,
		'priority'    => 10,
    ) );
    Kirki::add_field( 'dn', array(
		'type'        => 'number',
		'settings'    => 'related_posts_count',
		'label'       => esc_attr__( 'Number of Related Posts', 'world-times' ),
		'description' => esc_attr__( 'Number of Posts to be shown in related posts section.', 'world-times' ),
		'section'     => 'single_post',
		'default'     => 3,
		'priority'    => 10,
    ) );
    /* section - footer */
    Kirki::add_section( 'footer_settings', array(
		'title'          => esc_attr__( 'Footer Settings', 'world-times' ),
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
    ) );
    /* fields - footer */
    Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'footer_widget',
		'label'       => esc_attr__( 'Footer Widget Area', 'world-times' ),
		'description' => esc_attr__( 'Show / hide the widget arean in footer.', 'world-times' ),
		'section'     => 'footer_settings',
		'default'     => true,
		'priority'    => 10,
    ) );
    Kirki::add_field( 'dn', array(
		'type'        => 'toggle',
		'settings'    => 'custom_copyright',
		'label'       => esc_attr__( 'Custom Copyright text', 'world-times' ),
		'description' => esc_attr__( 'Enable / Disable custom copyright text in the footer.', 'world-times' ),
		'section'     => 'footer_settings',
		'default'     => false,
		'priority'    => 10,
	) );

	Kirki::add_field( 'dn', array(
		'type'        => 'textarea',
		'settings'    => 'custom_copyright_textbox',
		'label'       => esc_attr__( 'Enter Custom copyright text', 'world-times' ),
		'description' => esc_attr__( 'Add custom copyright text here.', 'world-times' ),
		'section'     => 'footer_settings',
		'default'     => '',
		'priority'    => 10,
		'sanitize_callback' => 'filter_copyright_text',
		'required'  => array(
			array(
				'setting'  => 'custom_copyright',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );
}
function filter_copyright_text($val) {
    return wp_kses( $val, array( 
        'a' => array(
            'href' => array(),
            'title' => array()
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
    ) );
}

function get_categories_select() {
    $teh_cats = get_categories();
    $results = array(' ' => esc_html('- choose a category', 'world-times'));
    $count = count($teh_cats);
    for ($i=0; $i < $count; $i++) {
      if (isset($teh_cats[$i]))
        $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
      else
        $count++;
    }
    return $results;
  }

  // live preview the changes
function world_times_customizer_live_preview() {
	wp_enqueue_script('customizer-js', WORLD_TIMES_THEMEROOT.'/assets/js/world-times-customizer.js', array('jquery', 'customize-preview'), '', true );
}
add_action( 'customize_preview_init', 'world_times_customizer_live_preview' );