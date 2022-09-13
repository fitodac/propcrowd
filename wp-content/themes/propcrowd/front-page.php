<?php
get_header();

$data = get_fields();
?>


<!-- <pre><?php //var_dump($data); ?></pre> -->

<div id="mainHero">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-6 order-md-2 mb-5 mb-md-0">
				<div class="owl-carousel owl-dots-overlay" id="mainHeroSlider">
					<?php foreach( $data['hero_slider'] as $owl ): ?>
					<div class="h-100">
						<figure>
							<?= wp_get_attachment_image( $owl['ID'], 'full', false ); ?>
						</figure>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-6 pr-md-4 pr-lg-5">
				<div class="display-4"><?php the_field('hero_title'); ?></div>
				<div class="excerpt"><?php the_field('hero_subtitle'); ?></div>
				<a class="btn btn-primary btn-xs-big d-sm-none mb-4" href="<?php the_field('btn_register_link','options'); ?>"><?php the_field('btn_register_text','options'); ?></a>
				<a class="btn btn-primary btn-xs-big" href="<?php the_field('hero_btn_link'); ?>"><?php the_field('hero_btn_title'); ?></a>
			</div>
		</div>
	</div>
</div>



<section id="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mb-5 mb-lg-0 pb-5 pb-lg-0">
				<h4><?= $data['col1_title']; ?></h4>
				<?= wp_get_attachment_image( $data['col1_icon'], 'full', false, 'class=icon icon-1' ); ?>
				<div class="excerpt"><?= $data['col1_excerpt']; ?></div>
			</div>
			<div class="col-lg-4 mb-5 mb-lg-0 pb-5 pb-lg-0">
			<h4><?= $data['col2_title']; ?></h4>
				<?= wp_get_attachment_image( $data['col2_icon'], 'full', false, 'class=icon icon-2' ); ?>
				<div class="excerpt"><?= $data['col2_excerpt']; ?></div>
			</div>
			<div class="col-lg-4">
				<h4><?= $data['col3_title']; ?></h4>
				<?= wp_get_attachment_image( $data['col3_icon'], 'full', false, 'class=icon icon-3' ); ?>
				<div class="excerpt"><?= $data['col3_excerpt']; ?></div>
			</div>
		</div>
		<div class="text-center">
			<a class="btn btn-primary btn-xs-big d-block d-sm-inline-block" href="<?= $data['features_btn_link']; ?>"><?= $data['features_btn_text']; ?></a>
		</div>
	</div>
</section>


<?php get_template_part('template-parts/widget'); ?>


<section id="infoSection">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-lg-6 col-xl-5">
				<header>
					<div class="h2"><?= $data['pec_title']; ?></div>
					<div class="excerpt"><?= $data['pec_excerpt']; ?></div>
				</header>
			</div>
		</div>
		<div class="info-group info--desktop"><?php get_template_part('template-parts/info', 'group-desktop'.'-'.pll_current_language('slug') ) ?></div>
		<div class="info-group info--mobile"><?php get_template_part('template-parts/info', 'group-mobile'.'-'.pll_current_language('slug')) ?></div>
	</div>
</section>


<section id="tabbbs">
	<div class="container">
		<div class="logos owl-carousel">
			<div class="logo" data-tabbb="0"><img src="<?= wp_get_attachment_image_url( $data['tabbs_1']['logo'], 'full' ); ?>" /></div>
			<div class="logo" data-tabbb="1"><img src="<?= wp_get_attachment_image_url( $data['tabbs_2']['logo'], 'full' ); ?>" /></div>
			<div class="logo" data-tabbb="2"><img src="<?= wp_get_attachment_image_url( $data['tabbs_3']['logo'], 'full' ); ?>" /></div>
			<div class="logo" data-tabbb="3"><img src="<?= wp_get_attachment_image_url( $data['tabbs_4']['logo'], 'full' ); ?>" /></div>
			<div class="logo" data-tabbb="4"><img src="<?= wp_get_attachment_image_url( $data['tabbs_5']['logo'], 'full' ); ?>" /></div>
		</div>
		<div class="card">
			<div class="owl-carousel" id="tabbbsSlider">
			<div>
					<div class="tabbb-excerpt"><?= $data['tabbs_1']['text']; ?></div>
					<?php if($data['tabbs_1']['btn_text'] || $data['tabbs_1']['btn_link']): ?>
					<div class="text-center pt-5">
						<a class="btn btn-primary" href="<?= $data['tabbs_1']['btn_link']; ?>" target="_blank"><?= $data['tabbs_1']['btn_text']; ?></a>
					</div>
					<?php endif; ?>
				</div>
				<div>
					<div class="tabbb-excerpt"><?= $data['tabbs_2']['text']; ?></div>
					<?php if($data['tabbs_2']['btn_text'] || $data['tabbs_2']['btn_link']): ?>
					<div class="text-center pt-5">
						<a class="btn btn-primary" href="<?= $data['tabbs_2']['btn_link']; ?>" target="_blank"><?= $data['tabbs_2']['btn_text']; ?></a>
					</div>
					<?php endif; ?>
				</div>
				<div>
					<div class="tabbb-excerpt"><?= $data['tabbs_3']['text']; ?></div>
					<?php if($data['tabbs_3']['btn_text'] || $data['tabbs_3']['btn_link']): ?>
					<div class="text-center pt-5">
						<a class="btn btn-primary" href="<?= $data['tabbs_3']['btn_link']; ?>" target="_blank"><?= $data['tabbs_3']['btn_text']; ?></a>
					</div>
					<?php endif; ?>
				</div>
				<div>
					<div class="tabbb-excerpt"><?= $data['tabbs_4']['text']; ?></div>
					<?php if($data['tabbs_4']['btn_text'] || $data['tabbs_4']['btn_link']): ?>
					<div class="text-center pt-5">
						<a class="btn btn-primary" href="<?= $data['tabbs_4']['btn_link']; ?>" target="_blank"><?= $data['tabbs_4']['btn_text']; ?></a>
					</div>
					<?php endif; ?>
				</div>
				<div>
					<div class="tabbb-excerpt"><?= $data['tabbs_5']['text']; ?></div>
					<?php if($data['tabbs_5']['btn_text'] || $data['tabbs_5']['btn_link']): ?>
					<div class="text-center pt-5">
						<a class="btn btn-primary" href="<?= $data['tabbs_5']['btn_link']; ?>" target="_blank"><?= $data['tabbs_5']['btn_text']; ?></a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			
		</div><span class="bg--circle"></span>
	</div>
</section>


<section id="testimonials">
	<div class="container">
		<div class="row">
			<div class="col-lg-6" id="colL">
				<div class="owl-carousel d-none d-lg-block" id="testimonialsPicturesSlider">
					<?php foreach( $data['testimonials'] as $t ): ?>
					<div class="h-100">
						<figure>
							<?= wp_get_attachment_image( $t['image'], 'full', false, 'class=logo expansion' ); ?>
						</figure>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-lg-6 d-lg-flex align-items-lg-center" id="colR">
				<div class="owl-carousel" id="testimonialsSlider">
					<?php foreach( $data['testimonials'] as $t ): ?>
					<div>
						<?= $t['excerpt']; ?>
						<footer>
							<p><?= $t['name']; ?></p>
							<p><?= $t['company']; ?></p>
						</footer>
					</div>
					<?php endforeach; ?>
				</div>
				<span class="big--iso"></span>
			</div>
		</div>
	</div>
</section>



<?php 
get_footer();