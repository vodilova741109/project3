<div class="zero-result align-center">
	<?php if (is_search()) : ?>
		<div class="col-md-8 offset-md-2 text-center">
            <p class="message"><?php esc_html_e('Sorry nothing found for your search term. Please try to search again with another term / key word.', 'world-times'); ?></p>
            <?php get_search_form(); ?></div>
	<?php endif; ?>
</div>