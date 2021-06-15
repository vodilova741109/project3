<div class="cover-wrap text-center<?php if( '' != get_header_image()) : ?> has-image<?php endif; ?>" <?php if( '' != get_header_image('large')) : ?>style="background-image: url(<?php header_image(); ?>);"<?php endif; ?>>
    <div class="cover-inner m-auto">
        <h1 class="name">
        <?php
            if ( is_day() ) :
            printf(esc_html__('Date: %s', 'world-times'), get_the_date());
            elseif (is_month()) :
            printf(esc_html__('Month: %s', 'world-times'), get_the_date( esc_html_x( 'F Y', 'Date for monthly archive', 'world-times')));
            elseif (is_year()) :
            printf(esc_html__('Year: %s', 'world-times'), get_the_date( esc_html_x( 'Y', 'Date for yearly archive', 'world-times' )));
            elseif ( is_tag() ) :
            printf(esc_html__('Tag: %s', 'world-times'), single_tag_title('', false ));
            elseif (is_category()) :
            printf(esc_html__('Category: %s', 'world-times'), single_cat_title('', false ));
            else :
            esc_html_e('Archive', 'world-times');
            endif;
        ?>
        </h1>
        <div class="post-count">
        <?php
            $total_posts = $wp_query->found_posts;
            printf (esc_html__('Total %d Posts', 'world-times'), $total_posts);
        ?>
        </div>
    </div>
</div>