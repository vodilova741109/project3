<?php
$posts = null;
$section_visible = get_theme_mod('featured_section', true);
if($section_visible === true):
    $post_type = get_theme_mod('post_type', 'featured' );
    $post_count = intval(get_theme_mod('post_count', 5 ));
    if ($post_type == 'featured' ) {
        $args = array(
            'posts_per_page' => $post_count,
            'meta_key' => '_gbj_featured_post',
            'meta_value' => 'yes',
            'ignore_sticky_posts' => true
        );
    } else {
        $args = array(
            'posts_per_page' => $post_count,
            'ignore_sticky_posts' => true
        );
    }
    $posts = new WP_Query($args);
    ?>
    <div class="featured-posts-section">
        
        <div class="container">
            <div class="row clearfix">
                <?php if ($posts -> have_posts()) : while ($posts -> have_posts()) : $posts -> the_post(); ?>
                <?php if($posts->current_post == 0): ?>
                    <div class="col-lg-6 large-post post-wrap">
                        <a href="<?php the_permalink() ?>">
                            <div class="featured-image-wrap">
                                <div class="featured-image" <?php if ( has_post_thumbnail() ){ ?>style="background-image:url(<?php the_post_thumbnail_url("world_time_medium_thumbnail"); ?>);"<?php }?>></div>
                                <div class="overlay">
                                    <h2 class="title h3"><?php the_title(); ?></h2>
                                    <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
                                </div>
                            </div>
                        </a>
                        <div class="excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-lg-6 small-post post-wrap">
                        <?php if ( has_post_thumbnail() ): ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="featured-image-wrap">
                                <div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url("world_time_small_thumbnail"); ?>);"></div>
                            </div>
                        </a>
                        <?php endif; ?>
                        <div class="content-wrap<?php if ( !has_post_thumbnail() ){ ?> no-image<?php }?>">
                            <div class="tag"><?php the_category(' '); ?></div>
                            <h2 class="title h4"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                            <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
                        </div>
                    </div>
                <?php endif; ?>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>