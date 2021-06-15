<div class="large-post">
    <a href="<?php the_permalink(); ?>">
        <div class="featured-image-wrap">
            <div class="featured-image<?php if ( !has_post_thumbnail() ){ ?> no-image<?php }?>"<?php if ( has_post_thumbnail() ){ ?> style="background-image:url(<?php the_post_thumbnail_url("world_time_medium_thumbnail"); ?>);" <?php } ?>></div>
            <div class="overlay">
                <h2 class="title h4"><?php the_title(); ?></h2>
                <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
            </div>
        </div>
    </a>
</div>