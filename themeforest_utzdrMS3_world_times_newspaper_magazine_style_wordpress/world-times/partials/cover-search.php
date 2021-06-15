<div class="cover-wrap text-center">
    <div class="cover-inner m-auto">
        <h1 class="name">
        <?php esc_html_e('Search Results for', 'world-times'); echo '&nbsp;"' . get_search_query() . '"'; ?>
        </h1>
        <div class="post-count">
        <?php
            $total_posts = $wp_query->found_posts;
            printf (esc_html__('Total %d Posts', 'world-times'), $total_posts);
        ?>
        </div>
    </div>
</div>