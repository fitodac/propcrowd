<?php 
/**
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

// $data = get_fields();
// $id = $wp_query->get_queried_object_id();
$id = get_option( 'page_for_posts' );

$nextBtn = 0 === get_query_var('paged') ? pll__('VER MÁS') : pll__('SIGUIENTE');
?>

<div class="page-header page-header-wave-right">
	<div class="container">
		<div class="h1"><?php the_field('page_title', $id) ?></div>
		<?php 
		if( get_field('page_subtitle', $id) ){
			echo '<div class="subtitle d-none d-lg-block">'.get_field('page_subtitle',$id).'</div>';
		}
		?>
	</div><!-- .container -->
</div><!-- .page-header -->

<style>
	.page-header{ 
		background-image: url("<?= wp_get_attachment_image_url( get_field('header_image', $id), 'full' ); ?>"); 
	}
</style>

<?php 

$count = 1;


$args = array(
	'order' => 'DESC',
	'paged' => (get_query_var('paged')) ? get_query_var('paged') : 1
);

// The Query
$query = new WP_Query( $args );
?>


<section class="blog-wrapper">
	<div class="container">

		<div class="row">

			<div class="col-md-8 mb-5">
				<div class="row">

					<?php 
					// The Loop
					if( $query->have_posts() ): ?>

					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<div class="col-md-6">
						<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
						<?php 	
						nitro_post_thumbnail();
						nitro_entry_categories();
						the_title('<div class="h3 post-title"><a href="'.get_the_permalink().'">','</a></div>');
						nitro_posted_on();
						?>
						<a href="<?php the_permalink(); ?>" class="btn btn-link"><?= pll_e('LEER MÁS') ?></a>
						</article>
					</div><!-- .col -->
					<?php endwhile; ?>
				</div>


				<?php smpx_blog_navigation( $query, 'prev-next', false, false, 'ANTERIOR', $nextBtn ); ?>


				<?php 
				else: 
					get_template_part('template-parts/content', 'none');
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