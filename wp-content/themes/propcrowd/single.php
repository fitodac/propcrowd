<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package propcrowd
 */

get_header();


$id = get_option( 'page_for_posts' );
?>


<div class="page-header page-header-wave-left"></div>

<style>
	.page-header{ 
		background-image: url("<?= wp_get_attachment_image_url( get_field('header_image', $id), 'full' ); ?>"); 
	}
</style>



<section class="post-wrapper">
	<div class="container">

		<div class="row">
			<div class="col-md-8"><?php the_title('<h1 class="post-title">','</h1>'); ?></div>
		</div>


		<div class="row">
			<div class="col-md-8">
			<?php 
			// The Loop
			if( have_posts() ): ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<article>
				<div class="meta">
					<?php nitro_posted_on(); ?>
					<div class="share">
						<span>Compartir: </span>
						<a href="#" onClick="shareTwitter('<?php the_permalink(); ?>', '<?php the_title() ?>'); return false;"><i class="fab fa-twitter"></i></a>
						<a href="#" onClick="shareFacebook('<?php the_permalink(); ?>', '<?php the_title() ?>', '<?= wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0]; ?>'); return false;"><i class="fab fa-facebook-f"></i></a>
						<a href="#" onClick="shareLinkedin('<?php the_permalink(); ?>', '<?php the_title() ?>'); return false;"><i class="fab fa-linkedin-in"></i></a>
					</div>
				</div>

				<div class="post-content"><?php the_content(); ?></div>

				<div class="post-info separator">
					<?= pll_e('Publicado por') ?> <strong><?php the_author(); ?></strong> &middot; 
					<?= pll_e('Categorías') ?>: <?php nitro_entry_categories(); ?> &middot; 
					<a href="#respond"><?= pll_e('Deja un comentario') ?></a>
				</div>

				<div class="separator">
					<a href="<?php the_permalink(get_previous_post()->ID); ?>" class="goback"><?= pll_e('IR ATRÁS') ?></a>
				</div>

				
				<?php if ( comments_open() || get_comments_number() ) {
					comments_template();
				} ?>
				
			</article>


			<?php endwhile;
			endif; ?>
			</div><!-- .col -->


			<div class="col-md-4">
				<aside class="pl-4"><?php get_sidebar(); ?></aside>
			</div><!-- .col -->
		</div><!-- .row -->


	</div><!-- .container -->
</section>

<?php 
/* Restore original Post Data */
wp_reset_postdata();


get_footer();
