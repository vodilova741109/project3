<?php get_header(); ?>
<div class="main-content-area">
    <div class="container">
        <?php get_template_part('partials/cover', 'archive'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post();
            get_template_part( 'partials/post-templates/content' );
        endwhile; else:
            get_template_part( 'partials/post-templates/content', 'zero' );
        endif; ?>
        <?php get_template_part('partials/pagination'); ?>
    </div>
</div>
<?php get_footer(); ?>