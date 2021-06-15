<?php
    $categories = get_the_category();
    if(!empty($categories)):
    $category_name = $categories[0]->name;
    $category_slug = $categories[0]->slug;
    $count = intval(get_theme_mod('related_posts_count', 3));
?>

<div class="related-post-wrap">
    <div class="section-title">
        <span><?php esc_html_e('More in', 'world-times') ?> <?php echo esc_html( $category_name ); ?></span>
    </div>
    <div class="row">
    <?php $related_posts = new WP_Query(array(
        'posts_per_page' => $count,
        'category_name' => $category_slug,
        'post__not_in' => array(get_the_ID()),
        'ignore_sticky_posts' => true
        ));

        if ($related_posts -> have_posts()) : while ($related_posts -> have_posts()) : $related_posts -> the_post(); ?>
        <div class="col-md-4 post-wrap clearfix">
            <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php the_permalink(); ?>">
                <div class="featured-image-wrap">
                    <div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url("world_time_small_thumbnail"); ?>);"></div>
                </div>
            </a>
            <?php endif; ?>
            <div class="content-wrap <?php if ( !has_post_thumbnail() ){ ?> no-image<?php } ?>">
                <h2 class="title h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
            </div>
        </div>
        <?php endwhile; wp_reset_postdata(); endif; ?>
    </div>
</div>
<?php endif; ?>