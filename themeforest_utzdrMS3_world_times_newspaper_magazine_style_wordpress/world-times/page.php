<?php get_header(); ?>
<div class="main-content-area">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="single-post-wrap page-wrap">
                <?php if ( has_post_thumbnail() ): ?>
                <div class="post-head d-flex has-image" style="background-image:url(<?php the_post_thumbnail_url("large"); ?>);">
                <?php else: ?>
                <div class="post-head d-flex">
                <?php endif; ?>
                    <div class="header-inner align-self-center">
                        <h1 class="title"><?php the_title() ?></h1>
                    </div>
                </div>
                <div class="post-content m-auto">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php wp_enqueue_script( "comment-reply" ) ?>
            <?php if(comments_open() || get_comments_number()) {
                comments_template();
            } ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
<?php get_footer(); ?>