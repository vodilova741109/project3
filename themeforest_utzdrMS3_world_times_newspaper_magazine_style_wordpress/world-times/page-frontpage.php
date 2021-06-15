<?php 
/**
* Template Name: Frontpage
*/

get_header(); ?>
<div class="main-content-area">
	<?php if (true == get_theme_mod( 'featured_section', true )) : ?>
		<?php get_template_part( 'partials/template', 'featured' ); ?>
	<?php endif; ?>
    <div class="container">
        <div class="row">
        <?php 
        $latest_visible = get_theme_mod('latest_section', true);
            if($latest_visible === true){
                get_template_part( 'partials/template', 'latest-section' );
            }?>
        <?php get_template_part( 'partials/template', 'category-sections' ); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>