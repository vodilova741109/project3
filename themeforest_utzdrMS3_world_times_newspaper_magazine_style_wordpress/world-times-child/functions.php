<?php

function world_times_parent_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('world-times-screen') );
}
add_action( 'wp_enqueue_scripts', 'world_times_parent_theme_enqueue_styles' );