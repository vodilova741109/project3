<?php get_header(); ?>
<div class="main-content-area">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="single-post-wrap">
                <?php if ( has_post_thumbnail() ): ?>
                <div class="post-head d-flex has-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
                <?php else: ?>
                <div class="post-head d-flex">
                <?php endif; ?>
                    <div class="header-inner align-self-center">
                        <div class="primary-tag">
                            <?php the_category(' '); ?>
                        </div>
                        <h1 class="title"><?php the_title() ?></h1>
                        <div class="post-meta">
                            <a href="<?php echo get_author_posts_url($post->post_author); ?>" class="author"><span><?php echo _e('By', 'world-times') ?></span> <?php the_author(); ?></a>
                            <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"> - <?php the_time( get_option('date_format')); ?></time>
                        </div>
                    </div>
                </div>
                <div class="post-content m-auto">
                    <?php the_content();
                    wp_link_pages( array(
                        'before'           => '<nav class="single-post-pagination text-center">',
                        'after'            => '</nav>',
                        'link_before'      => '',
                        'link_after'       => '',
                        'next_or_number'   => 'page',
                        'nextpagelink'     => '<span class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg></span>',
                        'previouspagelink' => '<span class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg></span>',
                    ) ); ?>
                </div>
                <div class="tag-wrap">
                    <?php the_tags('', ''); ?>
                </div>
                <?php if (true === get_theme_mod( 'share_links', true) && shortcode_exists("gbj_share_shortcode")) {
                    echo do_shortcode("[gbj_share_shortcode]");
                } ?>
            </div>
            <?php if (true === get_theme_mod( 'prev_next_post', true)) {
                get_template_part('partials/prev-next' );
            } ?>
            <?php if (true === get_theme_mod( 'related_posts', true)) {
                get_template_part('partials/related-posts' );
            } ?>
            <?php wp_enqueue_script( "comment-reply" ) ?>
            <?php if(comments_open() || get_comments_number()) {
                comments_template();
            } ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php get_footer(); ?>