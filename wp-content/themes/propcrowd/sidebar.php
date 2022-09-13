<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package propcrowd
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">

<label class="screen-reader-text" for="s"><?php pll_e('¿Buscas algo?') ?></label>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="search">
		<input type="text" value="" name="s" id="s" placeholder="<?php pll_e('Buscar') ?>" />
		<button type="submit" id="searchsubmit" value="Search">
			<i class="fa fa-search"></i>
		</button>
	</div>
</form>



	<?php dynamic_sidebar( 'sidebar-1' ); ?>


<?php $wiabout = get_field('widget_about', 'option'); ?>
<div class="widget-about">
	<figure><?= wp_get_attachment_image( $wiabout['image'], 'full', false ); ?></figure>
	<div class="body">
		<h5><?= $wiabout['title']; ?></h5>
		<?= $wiabout['excerpt']; ?>
	</div>
	<a href="<?= $wiabout['btn_link']; ?>" class="btn btn-primary"><?= $wiabout['btn_text']; ?></a>
</div>
</aside><!-- #secondary -->
