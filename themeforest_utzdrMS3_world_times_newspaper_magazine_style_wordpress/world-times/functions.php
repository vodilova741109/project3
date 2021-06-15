<?php
/*====================================================
	Define constant
====================================================*/
define('WORLD_TIMES_THEMEROOT', get_template_directory_uri());

if (! function_exists('world_times_theme_setup')) {
    function world_times_theme_setup() {
        load_theme_textdomain( 'world-times', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support('custom-logo', array(
			'height'      => 50,
			'width'       => 220,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		));
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
		add_theme_support('editor-styles');

		/* image size required for this theme */
		set_post_thumbnail_size( 1200, 500, true);
		add_image_size( 'world_time_medium_thumbnail', 620, 390, true);
		add_image_size( 'world_time_small_thumbnail', 210, 130, true);
		add_theme_support('custom-background');
		add_theme_support('custom-header');
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
        
        /* gutenberg */
        add_theme_support('align-wide');
        /* register menu */
		register_nav_menus(array(
            'main-menu' => esc_html__('Main Menu', 'world-times'),
            'footer-menu' => esc_html__('Footer Menu', 'world-times')
		));
    }


    add_action( 'after_setup_theme', 'world_times_theme_setup' );
}

// content width in this design
if (! isset( $content_width) ) {
	$content_width = 800;
}

/*====================================================
    Add a pingback url auto-discovery header for single posts, pages, or attachments.
====================================================*/
function world_times_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'world_times_pingback_header' );
/*====================================================
	styles and scripts
====================================================*/
function world_times_fonts_url() {
	$fonts_url = '';
	$playfair_display = esc_html_x( 'on', 'Playfair Display font: on or off', 'world-times' );
	$lora = esc_html_x( 'on', 'Lora font: on or off', 'world-times' );
	if ( 'off' !== $playfair_display && 'off' !== $lora ) {
		$font_families = array();
		if ( 'off' !== $playfair_display ) {
			$font_families[] = 'PT Serif:400,700';
		}
		if ( 'off' !== $lora ) {
			$font_families[] = 'Lato:400,700';
		}
		$query_args = array(
			'family' => rawurlencode( implode( '|', $font_families ) ),
			'subset' => rawurlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}

if(! function_exists('world_times_styles_scripts')) {
    function world_times_styles_scripts() {
        /* css */
        wp_enqueue_style( 'bootstrap', WORLD_TIMES_THEMEROOT . '/assets/css/bootstrap.min.css', array(), null );
        wp_enqueue_style( 'google-fonts', world_times_fonts_url(), false, '1.1.0', 'screen' );
        wp_enqueue_style('atom-one-dark', WORLD_TIMES_THEMEROOT.'/assets/css/hl-styles/atom-one-dark.min.css', array(), null);
        wp_enqueue_style('world-times-screen', WORLD_TIMES_THEMEROOT.'/assets/css/screen.min.css', array(), null);
        wp_enqueue_style('world-times-style', get_stylesheet_uri(), array(), null);
        /* Js */
         wp_enqueue_script('jquery-fitvids', WORLD_TIMES_THEMEROOT.'/assets/js/jquery.fitvids.js', array('jquery'), '', true );
        wp_enqueue_script('medium-zoom', WORLD_TIMES_THEMEROOT.'/assets/js/medium-zoom.min.js', array('jquery'), '', true );
        wp_enqueue_script('highlight-pack', WORLD_TIMES_THEMEROOT.'/assets/js/highlight.pack.js', '', '', true );
        wp_enqueue_script('world-times-index', WORLD_TIMES_THEMEROOT.'/assets/js/index.js', array('jquery'), '', true );
        wp_localize_script( 'world-times-index', 'ajax_url', admin_url('admin-ajax.php') );
    }
    add_action( 'wp_enqueue_scripts', 'world_times_styles_scripts' );
}

/*====================================================
	Editor style
====================================================*/
add_editor_style(world_times_fonts_url());
add_editor_style('assets/css/editor-style.css');
/*====================================================
	register sidebar
====================================================*/
function world_times_widgets_init(){
	if ( function_exists('register_sidebar') ) {
	    register_sidebar(array(
			'name'          => esc_html__( 'Footer Widget Area left', 'world-times' ),
			'id'            => 'footer-sidebar-left',
			'description'   => esc_html__('Add widget here to show in footer left', 'world-times'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
	    ));
	    register_sidebar(array(
			'name'          => esc_html__( 'Footer Widget Area Center', 'world-times' ),
			'id'            => 'footer-sidebar-center',
			'description'   => esc_html__('Add widget here to show in footer center', 'world-times'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
	    ));
	    register_sidebar(array(
			'name'          => esc_html__( 'Footer Widget Area Right', 'world-times' ),
			'id'            => 'footer-sidebar-right',
			'description'   => esc_html__('Add widget here to show in footer right', 'world-times'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>'
	    ));
	}
}
add_action( 'widgets_init', 'world_times_widgets_init' );
/*=====================================================
    changing image logo link to remove itemprop attribute
=====================================================*/
function world_times_image_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $html = sprintf( '<a href="%1$s" class="custom-logo-link" rel="home">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                'class'    => 'custom-logo',
            ) )
        );
    return $html;   
}
add_filter( 'get_custom_logo', 'world_times_image_logo' );
/*====================================================
	excerpt
====================================================*/
// Changing excerpt more
add_filter( 'excerpt_more', '__return_empty_string' );
function world_times_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'world_times_custom_excerpt_length', 999 );
/*====================================================
	comment call back
====================================================*/
function world_times_comments ($comment, $args, $depth) {
	$GLOBAL['comment'] = $comment;
	?>
		<li id="comment-<?php comment_ID(); ?>" class="comment-entry" >
			<article <?php comment_class(); ?>>
				<header>
					<a href="<?php esc_url(comment_author_url()); ?>" class="author-avater-link"><?php echo get_avatar( $comment, 50); ?></a> 
					<div class="comment-details clearfix">
						<div class="commenter-name">
							<?php comment_author_link(); ?>
							<?php if ( in_array( 'bypostauthor', get_comment_class() ) ) : ?>
							<span><?php esc_html_e('Author', 'world-times') ?></span>
						<?php endif; ?>
						</div>
						<span class="commenter-meta"><?php comment_date();?>&nbsp;-&nbsp;<?php comment_time(); ?></span><?php edit_comment_link('<span class="edit-link">' . esc_html__('Edit', 'world-times' ) . '</span>') ?>
					</div>
				</header>
				<div class="comment-body">
					<?php comment_text() ?>
				</div>
				<?php comment_reply_link( array_merge(array('reply_text' => esc_html__('Reply', 'world-times')), array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</article>
		</li>
	<?php 
}
/*====================================================
	modification category and archive widget post count
====================================================*/
function world_times_categories_post_count ($var) {
	$new_string = str_replace('</a> (', '<span class="post-count">', $var);
	$new_string = str_replace(')', '</span></a>', $new_string);
	return $new_string;
}
add_filter('wp_list_categories','world_times_categories_post_count');

function world_times_archive_post_count($var) {
    if( strpos( $var, '</a>&nbsp;(' ) !== false ) {
        $new_string = str_replace('</a>&nbsp;(', '<span class="post-count">', $var);
        $new_string = str_replace(')', '</span></a>', $new_string);
        return $new_string;
    } else {
        return $var;
    }
}
add_filter('get_archives_link', 'world_times_archive_post_count');
/*====================================================
	adding custom css to WordPress Customizer
====================================================*/

function world_times_customizer_styles() { ?>
	<style>
        .wp-full-overlay-sidebar {
            overflow: hidden;
        }
	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'world_times_customizer_styles', 999 );
/*====================================================
	TGM Plugin Activation
====================================================*/
require_once(get_template_directory(). '/inc/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'world_times_register_required_plugins' );

function world_times_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
            'name'               => 'Kirki Toolkit',
            'slug'               => 'kirki',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => true,
        ),
        array(
			'name'               => 'GBJ Featured Post',
			'slug'               => 'gbj-featured-post',
			'source'             => get_stylesheet_directory() . '/plugins/gbj-featured-post.zip',
			'required'           => true,
			'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
			'is_callable'        => '',
        ),
        array(
			'name'               => 'GBJ Social Links',
			'slug'               => 'gbj-social-links',
			'source'             => get_stylesheet_directory() . '/plugins/gbj-social-links.zip',
			'required'           => true,
			'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
			'is_callable'        => '',
        ),
        array(
			'name'               => 'GBJ Share',
			'slug'               => 'gbj-share',
			'source'             => get_stylesheet_directory() . '/plugins/gbj-share.zip',
			'required'           => true,
			'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => '',
			'is_callable'        => '',
		),
        array(
            'name'               => 'Mailchimp for WordPress',
            'slug'               => 'mailchimp-for-wp',
            'required'           => false,
        ),
		array(
            'name'               => 'Contact Form 7',
            'slug'               => 'contact-form-7',
            'required'           => false,
        ),
        array(
            'name'               => 'One Click Demo Import',
            'slug'               => 'one-click-demo-import',
            'required'           => false
        )

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => esc_html__( 'Install Required Plugins', 'world-times' ),
			'menu_title'                      => esc_html__( 'Install Plugins', 'world-times' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'world-times' ), // %s = plugin name.
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'world-times' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'world-times'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'world-times'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'world-times'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'world-times'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'world-times' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'world-times' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'world-times' ), // %s = dashboard link.
			'nag_type'                        => 'error', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
	);

	tgmpa( $plugins, $config );
}
/*====================================================
    customizer
====================================================*/
include_once( get_template_directory() . '/inc/world-times-customizer.php');
/*====================================================
	Ajax Search
====================================================*/
add_action('wp_ajax_data_fetch' , 'world_times_data_fetch');
add_action('wp_ajax_nopriv_data_fetch','world_times_data_fetch');
function world_times_data_fetch(){
    $the_query = new WP_Query( array(
        'posts_per_page' => -1,
        's' => esc_attr( $_POST['keyword'] ),
        'post_type' => 'post'
    ));
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): $the_query->the_post(); ?>
        <div class="result-item">
            <a href="<?php the_permalink(); ?>"><div class="title"><?php the_title(); ?></div>
            <div class="date"><?php the_date(); ?></div></a>
        </div>
    
        <?php endwhile;
        wp_reset_postdata();  
    endif;
    die();
}
/*====================================================
	1 click demo
====================================================*/
function world_times_import_demo_files() {
    return array(
        array(
            'import_file_name'             => 'Demo Import 1',
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-data/demo-content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-data/widgets.json',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-data/customizer.dat',
        )
    );
}
add_filter( 'pt-ocdi/import_files', 'world_times_import_demo_files' );

function world_times_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
    set_theme_mod( 'nav_menu_locations', array(
            'main-menu' => $main_menu->term_id,
            'footer-menu' => $footer_menu->term_id,
        )
    );
    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );
}
add_action( 'pt-ocdi/after_import', 'world_times_after_import_setup' );
