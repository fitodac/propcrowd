<div class="page-header page-header-wave-right">
	<div class="container">
		<div class="h1"><?php the_field('page_title') ?></div>
		<?php 
		if( get_field('page_subtitle') ){
			echo '<div class="subtitle d-none d-lg-block">'.get_field('page_subtitle').'</div>';
		}
		?>
	</div><!-- .container -->
</div><!-- .page-header -->

<style>
	.page-header{ 
		background-image: url("<?= wp_get_attachment_image_url( get_field('header_image'), 'full' ); ?>"); 
	}
</style>