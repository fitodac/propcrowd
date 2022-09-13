<?php 
/**
 * Template Name: Conoce al equipo
 * 
 * The template for displaying all pages
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
?>


<div class="container">

	<div class="row pb-5">
		<div class="col-md-8 col-lg-6"><?= $data['top_excerpt'] ?></div>
	</div>

	<div class="row">
		<?php foreach( $data['team'] as $team ): ?>
			<div class="col-6 col-md-4 col-lg-3">
				<div class="card-team">
					<figure>
						<?= wp_get_attachment_image( $team['picture'], 'full' ); ?>
					</figure>
					<?php 
					if( $team['name'] ){
						echo '<div class="name">'.$team['name'].'</div>';
					}
					if( $team['position'] ){
						echo '<div class="pos">'.$team['position'].'</div>';
					}
					if( $team['partner'] ){
						echo '<div class="partner">'.$team['partner'].'</div>';
					}
					if( $team['excerpt'] ){
						echo '<div class="quote">'.$team['excerpt'].'</div>';
					}
					if( $team['linkedin'] ){
						echo '<div class="social">'
							.'<a href="'. $team['linkedin'] .'"><span class="fab fa-linkedin-in"></span></a>'
						.'</div>';
					}
					?>
				</div>
			</div>
		<?php endforeach; ?>

	</div>
</div>




<section class="separator-text-image" id="teamSeparator">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="h1"><?= $data['separator_title'] ?></div>
			</div>
			<div class="col-lg-6 d-none d-lg-block">
				<figure>
					<?= wp_get_attachment_image( $data['separator_image'], 'full' ); ?>
				</figure>
			</div>
		</div>
	</div>
</section>




<section id="partners">
	<div class="container">
		<?php $count = 1; ?>
		<?php foreach( $data['partners'] as $partner ): ?>
		<div class="row">
			<div class="col-lg-6 <?= $count <= 1 ? 'order-lg-2' : 'offset-lg-1' ?>">
				<div class="partner-excerpt"><?= $partner['content'] ?></div>
			</div>
			<div class="col-lg-5">
				<a href="<?= $partner['link'] ?>" target="_blank">
				<div class="partner-img"><?= wp_get_attachment_image( $partner['imagen'], 'full' ); ?></div>
				</a>
			</div>
		</div>
		<?php $count <= 1 ? $count++ : $count = 1; ?>
		<?php endforeach; ?>
	</div>
</section>


<?php
get_footer();