<div class="cover-wrap text-center<?php if( '' != get_header_image()) : ?> has-image<?php endif; ?>" <?php if( '' != get_header_image('large')) : ?>style="background-image: url(<?php header_image(); ?>);"<?php endif; ?>>
    <div class="cover-inner m-auto">
        <?php echo get_avatar( get_the_author_meta('user_email'), $size = '120');  ?>
        <h1 class="name h2">
            <?php the_author(); ?>
        </h1>
        <div class="post-count">
            <?php 
                $total_posts = $wp_query->found_posts;
                printf (esc_html__('Total %d Posts', 'world-times'), $total_posts);
            ?>
        </div>
        <div class="author-bio">
        <?php $authordesc = get_the_author_meta( 'description' );
            if (! empty($authordesc)) {
            echo the_author_meta('description');
        } ?>
        </div>
    </div>
</div>