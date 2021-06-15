<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <div class="header-wrapper text-center">
                <?php 
                    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                        the_custom_logo();
                    } else { ?>
                         <a class="text-logo" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                    <?php }
                ?>
                <?php $tagline = get_bloginfo('description');
                if($tagline != ''): ?>
                    <div class="site-description"><?php bloginfo('description'); ?></div>
                <?php endif; ?>
            </div>
        </div>
        <nav class="site-navbar-wrap">
            <div class="container">
                <div class="navbar-inner d-flex">
                <span class="menu-button d-inline-flex menu-open"><?php  get_template_part( 'partials/icons/menu'); ?></span>
                
                <?php if ( has_nav_menu( 'main-menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false,
                        'menu_class' => 'navbar-nav m-auto text-center main-menu d-none d-lg-flex'
                    ));
                } ?>
                <span class="search-button d-inline-flex search-open"><?php  get_template_part( 'partials/icons/search'); ?></span>
                <nav class="mobile-menu" id="mobile-menu">
                <?php if ( has_nav_menu( 'main-menu' ) ) {
                    wp_nav_menu(array(
                        'theme_location' => 'main-menu',
                        'container' => false
                    ));
                } ?>
                </nav>
                <div class="backdrop hidden-md hidden-lg" id="backdrop">
                    <span class="menu-close align-center"><?php  get_template_part( 'partials/icons/close'); ?></span>
                </div>
            </div>
            </div>
        </nav>
        <div class="fixed-nav-wrap">
            <nav class="site-navbar-wrap">
                <div class="container">
                    <div class="navbar-inner d-flex">
                        <span class="menu-button d-inline-flex menu-open"><?php  get_template_part( 'partials/icons/menu'); ?></span>
                        <?php if ( has_nav_menu( 'main-menu' ) ) {
                            wp_nav_menu(array(
                                'theme_location' => 'main-menu',
                                'container' => false,
                                'menu_class' => 'navbar-nav m-auto text-center main-menu d-none d-lg-flex'
                            ));
                        } ?>
                        <span class="search-button d-inline-flex search-open"><?php  get_template_part( 'partials/icons/search'); ?></span>
                    </div>
                </div>
            </nav>
        </div>
    </header>