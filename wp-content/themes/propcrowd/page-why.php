<?php 
/**
 * Template Name: Por qué PropCrowd
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




<section class="separator-text-image" id="whySeparator">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="h1 out-of-the-box"><?= $data['top_title']; ?></div>
				<div class="excerpt"><?= $data['top_excerpt']; ?></div>
			</div>
			<div class="col-lg-5 d-none d-lg-block">
				<figure>
					<?= wp_get_attachment_image( $data['top_image'], 'full' ); ?>
				</figure>
			</div>
		</div>
	</div>
</section>






<section class="icons-grid">
	<div class="container">
		<div class="h1 title-highlighter"><?= pll_e('¿Qué ofrecemos?') ?></div>


		<?php $count = 1; ?>
		<?php foreach( $data['icons'] as $key=>$icon ): ?>
			<?php if( 0 == $key ): ?><div class="row justify-content-between"><?php endif; ?>

			<div class="col-6 col-md-3">
				<figure data-hv="icon-hv-<?= $key ?>">
					<?= wp_get_attachment_image( $icon['icon'], 'full', false, 'class=icon-'.$count ); ?>
				</figure>
				<div class="figcaption"><?= $icon['title']; ?></div>
			</div>

			<?php if( 3 == $key%4 ): ?></div><?php endif;  ?>
			<?php if( 3 == $key%4 && $key < count($data['icons'])-1 ): ?><div class="row justify-content-between"><?php endif; ?>
		<?php endforeach; ?>

	</div><!-- .container -->


	<?php $count = 1; ?>
	<?php foreach( $data['icons'] as $key=>$hov ): ?>
		<?php $iconClass = ( 0 == $key%4 || 1 == $key%4 ) ? 'icon-left' : 'icon-right'; ?>

		<div class="hover <?= $iconClass ?>" id="icon-hv-<?= $key ?>">
			<figure>
				<?= wp_get_attachment_image( $hov['icon'], 'full', false, 'class=icon-'.$count ); ?>
			</figure>
			<div class="hover-body"><?= $hov['description']; ?></div>
		</div>
	<?php endforeach; ?>
</section>




<section id="stats">
	<div class="container">
		<div class="h1 title-highlighter"><?= $data['performance_title'] ?></div>

		<div class="h3 text-center mb-5"><?= $data['section_performace_1']['title'] ?></div>

		<?php 
		echo wp_get_attachment_image( $data['section_performace_1']['image_desktop'], 'full', false, array('class' => 'stats--desktop', 'style' => 'height:auto') ); 
		
		echo wp_get_attachment_image( $data['section_performace_1']['image_mobile'], 'full', false, array('class' => 'stats--mobile', 'style' => 'height:auto') ); 
		?>

		<?php if( $data['section_performace_1']['image_mobile'] ): ?>
		<footer>
			<div class="row">
				<div class="col-lg-9 mb-5 mb-lg-0"><?= $data['section_performace_1']['text'] ?></div>
				<div class="col-lg-3 text-center text-lg-right">
					<?= wp_get_attachment_image( $data['section_performace_1']['logo'], 'full', false, array('class' => 'img-fluid', 'style' => 'width:180px') ); ?>
				</div>
			</div>
		</footer>
		<?php endif; ?>


		<div class="h2 text-center mb-5"><?= $data['section_performace_2']['title'] ?></div>
		<?php 
		echo wp_get_attachment_image( $data['section_performace_2']['image_desktop'], 'full', false, array('class' => 'stats--desktop', 'style' => 'height:auto') ); 
		
		echo wp_get_attachment_image( $data['section_performace_2']['image_mobile'], 'full', false, array('class' => 'stats--mobile', 'style' => 'height:auto') ); 
		?>
	</div>
</section>




<?php if( $data['ytid'] ): ?>
<div id="player" data-plyr-provider="youtube" data-plyr-embed-id="<?= $data['ytid'] ?>"></div>
<?php endif; ?>






<section class="separator-full-image">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<?= $data['separator_text'] ?>
				<div class="mt-5">
					<a class="btn btn-primary" href="<?= $data['separator_btn_link'] ?>"><?= $data['separator_btn_text'] ?></a>
				</div>
			</div>
		</div>
	</div>
</section>
<style>
	.separator-full-image{
		background-image: url('<?= wp_get_attachment_image_url( $data['separator_bg'], 'full', false ); ?>');
	}
</style>




<section class="text-and-image">
	<div class="container">
		<div class="h1 mb-5 mb-lg-0"><?= $data['affiliates_title'] ?></div>
		<div class="row">
			<div class="col-md-6 pb-5 pb-md-0 mb-5 mb-md-0">
				<div class="pl-xl-5 pl-lg-3 mx-lg-5 py-lg-5 my-lg-3 pt-md-5"><?= $data['affiliates_text'] ?></div>

				<?php if( $data['affiliates_btn_link'] || $data['affiliates_btn_text'] ): ?>
					<div class="text-center pt-5 pt-lg-0">
						<a class="btn btn-primary" href="<?= $data['affiliates_btn_link'] ?>" onClick="window.jumpPop(this); return false;"><?= $data['affiliates_btn_text'] ?></a>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-lg-5 offset-lg-1 col-md-6 d-none d-md-block">
				<figure>
					<?= wp_get_attachment_image( $data['affiliates_image'], 'full', false ); ?>
				</figure>
			</div>
		</div>
	</div>
	<?= wp_get_attachment_image( $data['affiliates_image'], 'full', false, 'class=w-100 d-block d-md-none' ); ?>
</section>




<section id="contact">
	<div class="container">
		<form action="" id="contactForm">
			<div class="form-body">
				<div class="h2"><?= $data['form_title'] ?></div>
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<input class="form-control" type="text" id="formNombre" name="nombre" placeholder="<?= pll_e('Nombre y apellidos *') ?>" required>
							<span class="form-control-line"></span>
						</div>
						<div class="form-group">
							<input class="form-control" type="email" id="formEmail" name="email" placeholder="<?= pll_e('E-mail *') ?>" required>
							<span class="form-control-line"></span>
						</div>
						<div class="form-group">
							<input class="form-control" type="text" id="formAsunto" name="asunto" placeholder="<?= pll_e('Motivo del mensaje *') ?>" required>
							<span class="form-control-line"></span>
						</div>
					</div>
					<div class="col-lg-5 offset-lg-1 order-3 order-lg-2">
						<div class="address"><span class="fas fa-map-marker-alt"></span>
							<?= $data['form_address'] ?>
						</div>
						<div class="address"><span class="fas fa-phone"></span>
							<?= $data['form_phone'] ?>
						</div>
						<div class="address"><span class="fas fa-envelope"></span>
							<a href="mailto:<?= $data['form_email'] ?>"><?= $data['form_email'] ?></a>
							
						</div>
					</div>
					<div class="col-lg-12 order-lg-3">
						<div class="form-group">
							<textarea class="form-control" id="formMensaje" placeholder="<?= pll_e('Mensaje *') ?>" rows="6" required></textarea>
							<span class="form-control-line"></span>
						</div>
						<footer>
							<div class="mb-4 mb-lg-0">
								<button class="btn btn-primary" type="submit"><?= pll_e('ENVIAR MENSAJE') ?></button>
							</div>
							<div><i><?= pll_e('* Campos obligatorios') ?></i></div>
						</footer>
					</div>
				</div>
			</div><span class="bubble"></span>
		</form>

		<?php echo do_shortcode('[contact-form-7 id="'.$data['form_id'].'"]'); ?>
	</div>
</section>





<?php if( $data['ytid'] ): ?>

<link rel="stylesheet" href="https://unpkg.com/plyr@3/dist/plyr.css"/>
<script src="https://cdn.plyr.io/3.4.7/plyr.polyfilled.js"></script>

<script>
	const player = new Plyr('#player');
</script>



<style>
#player{
	height: 300px;
}

.plyr--video .plyr__control.plyr__tab-focus, 
.plyr--video .plyr__control:hover, 
.plyr--video .plyr__control[aria-expanded=true]{
	background: #00ff4b;
}
.plyr__control--overlaid{
	background: rgba(0,255,75,.8);
}
.plyr__control--overlaid:hover, 
.plyr__control--overlaid:focus{
	background: #00ff4b;
}
.plyr--full-ui input[type=range]{
	color: #00ff4b;
}
.plyr__control.plyr__tab-focus{
	box-shadow: 0 0 0 5px rgba(0,255,75,.5);
}
</style>

<?php endif; ?>



<?php 
get_footer();