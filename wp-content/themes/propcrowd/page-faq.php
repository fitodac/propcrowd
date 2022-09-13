<?php 
/**
 * Template Name: FAQ
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

$count = 1;
?>



<div class="container" id="faqContainer">
	<?php foreach( $data['sections'] as $section ): ?>
	<section class="faq-section" id="faq<?= $count ?>">
		<div class="row">
			<div class="col-md-4 col-lg-3"><h3><?= $section['section_title'] ?></h3></div>
			
			<div class="col-md-8 col-lg-7 offset-lg-2">
				<div class="accodion">
					<?php $i = 1 ?>
					<?php foreach( $section['questions'] as $q ): ?>
					<div class="accordion-wrapper">
						<div class="h5 collapsed" data-toggle="collapse" data-target="#ac<?= $count ?>-<?= $i ?>"><?= $q['question'] ?></div>
						<div class="collapse" id="ac<?= $count ?>-<?= $i ?>" data-parent="#faqContainer">
							<div class="pt-4"><?= $q['response'] ?></div>
						</div>
					</div>
					<?php $i++ ?>
					<?php endforeach; ?>
				</div><!-- .accordion -->
			</div><!-- .col -->

		</div><!-- .row -->
	</section>
	<?php $count++ ?>
	<?php endforeach; ?>
</div>





<?php
get_footer();
