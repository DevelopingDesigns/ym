<div class="<?php fcb_tab_classes(); ?>">
	<article class="tab-content">
		<?php fcb_template( 'blocks/parts/tabs/tab-title', get_row_layout(), 1 ); ?>
		<?php fcb_template( 'blocks/parts/block-content', get_row_layout(), 1 ); ?>
	</article>
	<?php fcb_template( 'blocks/parts/block-media', get_row_layout(), 1 ); ?>
</div>