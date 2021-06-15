<div class="col-lg-3 col-md-6 post-wrap">
    <?php if ( has_post_thumbnail() ) : ?>
    <a href="<?php the_permalink(); ?>">
        <div class="featured-image-wrap">
            <div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url("world_time_medium_thumbnail"); ?>);"></div>
        </div>
    </a>
    <?php endif; ?>
    <h2 class="title h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
    <div class="excerpt"><?php the_excerpt(); ?></div>
</div>