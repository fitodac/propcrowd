<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package propcrowd
 */

get_header();
?>

<section class="error-wrapper">
<div class="content text-center">
	<h3>ERROR</h3>
	<div class="display-1">404</div>
	<div class="lead pb-5"><?= pll_e('La página que buscabas no existe o ha sido cambiada') ?></div>
	<a class="btn btn-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?= pll_e('VOLVER AL INICIO') ?></a>
</div>
</section>

<?php
get_footer();
