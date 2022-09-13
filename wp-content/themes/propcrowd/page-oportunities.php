<?php 
/**
 * Template Name: Oportunidades
 * 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package propcrowd
 */

get_header();

$data = get_fields();

get_template_part('template-parts/page', 'header');


$opportunities = array();

foreach( $data['cards'] as $i ){
	$opportunities[] = $i['id'];
}
?>


<div class="container mb-5 pb-5">
	<div class="row justify-content-md-center justify-content-lg-start">
		<?php foreach( $opportunities as $projID ): ?>
			<div class="col-lg-4 col-md-8">
				<?php include( locate_template('template-parts/oportunities-card.php') ); ?>
			</div>
		<?php endforeach; ?>
	</div><?php //row ?>
</div><?php //container ?>


<?php get_footer(); ?>


<style>
.page-template-page-oportunities #widget{
	margin-top: 0;
}
</style>