<!-- end main containt area -->
<?php $footer_widget = get_theme_mod('footer_widget', true);
$footer_class =  $footer_widget == true ? '' : 'no-widget'?>
<footer class="site-footer <?php echo esc_attr($footer_class);?>">
        <div class="container">
            <?php if ( $footer_widget == true): ?>
            <div class="row">
                <div class="col-md-3">
                <?php if ( is_active_sidebar( 'footer-sidebar-left' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-sidebar-left'); ?>
                <?php endif; ?>
                </div>
                <div class="col-md-5">
                <?php if ( is_active_sidebar( 'footer-sidebar-center' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-sidebar-center'); ?>
                <?php endif; ?>
                </div>
                <div class="col-md-4">
                <?php if ( is_active_sidebar( 'footer-sidebar-right' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-sidebar-right'); ?>
                <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col">
                    <div class="copyright-wrap text-center">
                        <div class="copyright-info">
                        <?php if (false != get_theme_mod('custom_copyright')) :
                            echo get_theme_mod('custom_copyright_textbox');
                        else:
                            esc_attr_e('Copyright', 'world-times'); ?>
                                &copy;
                                <?php echo date('Y'); ?>
                                <a href=" <?php echo home_url('/') ?>"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></a>&nbsp;-&nbsp;<?php echo esc_html__('All Right Reserved', 'world-times');
                            endif; ?>
                        </div>
                        <div class="custom-links">
                        <?php if ( has_nav_menu( 'footer-menu' ) ) {
                            wp_nav_menu(array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                                'depth' => 1
                            ));
                        } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php get_template_part('partials/searchpopup'); ?>
    <!-- end footer -->
    <?php wp_footer() ?>
</body>
</html>