<?php
$layout = get_theme_mod( 'latest_section_layout', 'layout1');
$title = get_theme_mod( 'latest_section_title', '');
$count = get_theme_mod( 'latest_section_post_count', 7);  
switch($layout) {
    case 'layout1':
    $col_class = 'col-lg-8';
    break;
    case 'layout2':
    $col_class = 'col-lg-4';
    break;
    case 'layout3':
    $col_class = 'col-lg-12';
    break;
}?>
<?php if ($layout == 'layout1') : ?>
    <div class="<?php echo esc_attr($col_class)?>">
        <div class=" latest-post-section post-group">
            <?php  if ( isset( $title ) && ! empty( $title ) ) : ?>
            <div class="post-group-title">
                <span><?php echo esc_html( $title ); ?></span>
            </div>
            <?php endif; ?>
            <?php $section_posts = new WP_Query(array(
                    'posts_per_page' => $count,
                    'ignore_sticky_posts' => true
                    )
            ); ?>
            <div class="row">
                <?php if ($section_posts -> have_posts()) : while ($section_posts -> have_posts()) : $section_posts -> the_post(); ?>
                
                <?php if($section_posts->current_post == 0 ): ?>
                    <div class="col-md-12">
                        <?php get_template_part('partials/post-style', 'one' ); ?> 
                    </div>   
                <?php else: ?>
                    <div class="col-md-6">
                    <?php get_template_part('partials/post-style', 'two' ); ?>
                    </div>
                <?php endif; ?>
                <?php endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </div>
<?php elseif (($layout == 'layout2')) : ?>
    <div class="<?php echo esc_attr($col_class)?>">
        <div class="column-post-section post-group">
            <?php  if ( isset( $title ) && ! empty( $title ) ) : ?>
            <div class="post-group-title">
                <span><?php echo esc_html( $title ); ?></span>
            </div>
            <?php endif; ?>
            <?php $section_posts = new WP_Query(array(
                    'posts_per_page' => $count,
                    'ignore_sticky_posts' => true
                    )
            ); ?>
            <?php if ($section_posts -> have_posts()) : while ($section_posts -> have_posts()) : $section_posts -> the_post(); ?>
            
            <?php if($section_posts->current_post == 0 ) {
                get_template_part('partials/post-style', 'three' );
            } else {
                get_template_part('partials/post-style', 'two' );
            }
            endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
<?php elseif (($layout == 'layout3')) : ?>
    <div class="<?php echo esc_attr($col_class)?>">
        <div class="row-post-section post-group">
            <?php  if ( isset( $title ) && ! empty( $title ) ) : ?>
                <div class="post-group-title">
                    <span><?php echo esc_html( $title ); ?></span>
                </div>
            <?php endif; ?>
            <?php $section_posts = new WP_Query(array(
                    'posts_per_page' => $count,
                    'ignore_sticky_posts' => true
                    )
            ); ?>
            <div class="row">
                <?php if ($section_posts -> have_posts()) : while ($section_posts -> have_posts()) : $section_posts -> the_post();
                    get_template_part('partials/post-style', 'four' );
                endwhile; wp_reset_postdata(); endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>