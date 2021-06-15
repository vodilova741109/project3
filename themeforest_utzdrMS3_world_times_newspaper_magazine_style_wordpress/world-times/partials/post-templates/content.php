<div id="post-<?php the_id(); ?>" <?php post_class('post-item clearfix'); ?>>
    <div class="row">
        <?php if ( has_post_thumbnail() ): ?>
        <div class="col-md-6">
            <a href="<?php the_permalink() ?>">
                <div class="featured-image-wrap">
                    <div class="featured-image" style="background-image:url(<?php the_post_thumbnail_url("world_time_medium_thumbnail"); ?>);"></div>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php $css_class = '';
        if ( has_post_thumbnail() ) {
            $css_class = 'col-md-6';
        } else { 
            $css_class = 'col-md-12';
        }?>
        <div class="<?php echo esc_attr($css_class); ?> content-wrap">
            <div class="primary-tag">
                <?php the_category(' '); ?>
            </div>
            <h2 class="title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
            <time class="date" datetime="<?php the_time( 'Y-m-d'); ?>"><?php the_time( get_option('date_format')); ?></time>
            <div class="excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>