<div class="col text-center">
    <div class="pagination-wrap clearfix" role="navigation">
        <?php previous_posts_link( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg> <span>'. esc_html( 'Newer  Posts' ).'</span>' ); ?>
        <span class="page-number">
        <?php
        //display Page x of y pages
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $total = $wp_query->max_num_pages;
            if ($total > 0) {
            printf(esc_html__('Page %d of %d', 'world-times'), $paged, $total);
            }
        ?>
        </span>
        <?php next_posts_link( '<span>'. esc_html( 'Older  Posts' ).'</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M7.33 24l-2.83-2.829 9.339-9.175-9.339-9.167 2.83-2.829 12.17 11.996z"/></svg>' ); ?>
    </div>
</div>