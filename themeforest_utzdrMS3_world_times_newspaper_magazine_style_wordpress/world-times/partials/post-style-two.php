<div class="small-post clearfix">
    <?php if ( has_post_thumbnail() ): ?>
    <a href="<?php the_permalink(); ?>">
        <div class="featured-image-wrap">
            <div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url("world_time_small_thumbnail"); ?>);"></div>
        </div>
    </a>
    <?php endif; ?>
    <div class="content-wrap<?php if ( !has_post_thumbnail() ){ ?> no-image<?php } ?>">
        <h2 class="title h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
    </div>
</div>