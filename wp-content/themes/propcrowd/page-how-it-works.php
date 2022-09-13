<?php 
/**
 * Template Name: Cómo funciona
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

?>


<div class="page-header page-header-wave-left"></div>

<style>
	.page-header{ 
		background-image: url("<?= wp_get_attachment_image_url( get_field('header_image'), 'full' ); ?>"); 
	}
</style>



<div id="infography">
	<header>
		<div class="container">
			<div class="row">
				<div class="col-xl-4 col-lg-5 col-md-8">
					<h2 class="h1"><?= $data['page_title']; ?></h2>
					<?= $data['page_subtitle']; ?>
				</div>
			</div>
		</div>
	</header>
	<div class="container-fluid iframe-wrapper">
	<iframe src="<?= get_template_directory_uri(); ?>/assets/como-funciona-desktop-<?= pll_current_language('slug') ?>/index.html" frameborder="0" class="como-funciona--desktop"></iframe>
		<iframe src="<?= get_template_directory_uri(); ?>/assets/como-funciona-small-<?= pll_current_language('slug') ?>/index.html" frameborder="0" class="como-funciona--small"></iframe>
		<iframe src="<?= get_template_directory_uri(); ?>/assets/como-funciona-mobile-<?= pll_current_language('slug') ?>/index.html" frameborder="0" class="como-funciona--mobile"></iframe>
	</div>
</div>




<div id="register">
	<div class="container px-0">
		<div class="row no-gutters align-items-center">
			<div class="col-lg-6">
				<form action="">
					<div class="h3"><?= pll_e('Regístrate') ?></div>
					<div class="form-group">
						<input class="form-control" type="text" name="nomber" placeholder="<?= pll_e('NOMBRE DE USUARIO') ?>">
					</div>
					<div class="form-group">
						<input class="form-control" type="email" name="email" placeholder="EMAIL">
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="password" placeholder="<?= pll_e('CONTRASEÑA') ?>">
					</div>
					<footer>
						<a class="btn btn-primary btn-xs-big text-white" href="https://mk.socilen.com/register.php?token=4506fbdd-b69b-47c8-8823-acb0e15b1ee4" target="_blank"><?= pll_e('ÚNETE AHORA') ?></a>
						<div class="login"><?= pll_e('¿Ya eres miembro?') ?> <a href="https://mk.socilen.com/register.php?token=4506fbdd-b69b-47c8-8823-acb0e15b1ee4" target="_blank"><?= pll_e('Entra') ?></a></div>
					</footer>
				</form>
			</div>

			<div class="col-lg-6 d-none d-lg-block">
				<?= wp_get_attachment_image( $data['form_image'], 'full', false, 'class=img-fluid' ); ?>
			</div>

		</div>
	</div>
</div>




<section>
	<div class="container text-center py-5 mb-5">
		<div class="pb-4"><?= $data['actions_text']; ?></div>
		<div class="row">
			<div class="col-sm-6 offset-sm-3 col-md-4 offset-md-4">
				<a class="btn btn-primary btn-xs-big btn-block" href="<?= $data['actions_btn_link']; ?>"><?= $data['actions_btn_text']; ?></a>
			</div>
		</div>
	</div>
</section>


<?php 
get_footer();