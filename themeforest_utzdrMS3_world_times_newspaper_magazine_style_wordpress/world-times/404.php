<?php get_header(); ?>
<div class="main-content-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-wrap text-center">
                    <h1 class="error-code"><?php esc_html_e('404', 'world-times') ?></h1>
                    <h2 class="error-message h2"><?php esc_html_e('Page not found', 'world-times') ?></h2>
                    <p class="message-manual"><?php esc_html_e('Unfortunately the page you were looking for could not be found.', 'world-times') ?></p>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary back-btn"><?php esc_html_e('Visit Home page', 'world-times') ?> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>