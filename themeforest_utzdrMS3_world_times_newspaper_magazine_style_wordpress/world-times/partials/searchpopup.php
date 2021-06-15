<div class="search-popup">
	<div class="close-button">
		<?php get_template_part('partials/icons/close'); ?>
	</div>
	<div class="container popup-inner">
		<div class="row">
			<div class="col-sm-12">
				<form id="search-form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="<?php echo esc_attr__('Type to search', 'world-times');?>" id="search-input" aria-label="Search">
                    </div>
                </form>
                <div class="loader" id="loader"><span class="spinner"></span><?php esc_html_e('Loading ...','world-times') ?></div>
				<div id="search-results"></div>
			</div>
		</div>
	</div>
</div>