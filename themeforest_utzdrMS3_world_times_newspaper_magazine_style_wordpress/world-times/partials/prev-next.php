<?php
$prev_post = get_previous_post();
$next_post = get_next_post();
?>
<div class="prev-next-wrap">
    <div class="row">
        <?php if ($prev_post): ?>
        <div class="col-lg-5 offset-md-1 post-wrap">
            <?php if ( has_post_thumbnail($prev_post->ID) ): ?>
            <a href="<?php echo get_permalink( $prev_post->ID ); ?>">
                <div class="featured-image-wrap">
                    <div class="featured-image" style="background-image:url(<?php echo get_the_post_thumbnail_url($prev_post->ID, 'world_time_small_thumbnail'); ?>);"></div>
                </div>
            </a>
            <?php endif; ?>
            <div class="content-wrap<?php if (!has_post_thumbnail($prev_post->ID)){ ?> no-image<?php } ?>">
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="nav-text"><?php esc_html_e('Previous post', 'world-times') ?></a>
                <h2 class="title h4"><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo esc_html($prev_post->post_title); ?></a></h2>
                <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
            </div>
        </div>
        <?php endif; ?>
        <?php if($next_post): ?>
        <div class="col-lg-5 post-wrap">
            <?php if ( has_post_thumbnail($next_post->ID) ): ?>
            <a href="<?php echo get_permalink( $next_post->ID ); ?>">
                <div class="featured-image-wrap">
                    <div class="featured-image" style="background-image:url(<?php echo get_the_post_thumbnail_url($next_post->ID, 'world_time_small_thumbnail'); ?>);"></div>
                </div>
            </a>
            <?php endif; ?>
            <div class="content-wrap<?php if (!has_post_thumbnail($next_post->ID)){ ?> no-image<?php } ?>">
                <a href="<?php echo get_permalink( $next_post->ID ); ?>" class="nav-text"><?php esc_html_e('Next post', 'world-times') ?></a>
                <h2 class="title h4"><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo esc_html($next_post->post_title); ?></a></h2>
                <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>