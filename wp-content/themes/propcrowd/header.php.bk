<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package propcrowd
 */


//  Boddy class
$bodyClass = get_field('body_class');

if( !is_front_page() )
	$bodyClass .= ' navbar-brand--white';


$theme_uri = get_template_directory_uri().'/';
$menuID = 'es' ==  pll_current_language('slug') ? 2 : 69;
$primaryNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
?>


<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class($bodyClass); ?>>

	<?php if( !is_404() ): ?>

	<nav class="navbar justify-content-space">
		<div class="collapse navbar-collapse container- px-sm-0" id="mainNavbar">
			<div class="navbar-brand-alt"><a href="./"></a></div>
			<button class="navbar-toggler btn-close" type="button" data-toggle="collapse" data-target="#mainNavbar"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
			<div class="row no-gutters h-100">
				<div class="col-md-6 col-lg-7 col-xl-8" id="mobileNavSlider">
					<div class="d-flex flex-column">
						<ul class="navbar-nav mr-auto order-md-2">
							<?php foreach( $primaryNav as $key=>$navItem ): 
								$class = implode(', ', $navItem->classes); 
								$class .= ' nav-item'; ?>
								<li class="<?= $class; ?>">
									<a href="<?php echo $navItem->url ?>" class="nav-link"><?php echo $navItem->title ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
						<?php echo rarus_polylang_languages('text-uppercase order-md-1'); ?>
					</div>
				</div>
				<div class="col-md-6 col-lg-5 col-xl-4 d-none d-md-block">
					<aside>
						<p><?= pll_e('¿Aún no eres miembro?') ?><br> <?= pll_e('Regístrate ahora') ?></p>
						<a class="btn btn-outline-primary" href="<?php the_field('btn_register_link','options'); ?>" target="_blank"><?php the_field('btn_register_text','options'); ?></a>
					</aside>
				</div>
			</div>
		</div>


		<div class="container">
			<div class="row w-100 no-gutters">
				<div class="col col-sm-6 d-flex align-items-center">
					<h1 class="navbar-brand"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Navbar</a></h1>
				</div>
				<div class="col col-sm-6 d-flex align-items-center">
					<div class="row w-100 no-gutters">
						<div class="col-md-4">
							<a class="btn btn-link btn-login d-none d-lg-block" target="_blank" href="<?php the_field('btn_login_link','options') ?>">
								<img src="<?= get_template_directory_uri() ?>/assets/images/user.svg">
								<span><?= pll_e('Acceder') ?></span>
							</a>
						</div>
						<div class="col-md-8 d-flex justify-content-end pr-md-4">
							<a class="btn btn-outline-primary d-none d-lg-block" href="<?php the_field('btn_register_link','options'); ?>" target="_blank"><?= pll_e('Regístrate') ?></a>
							<button class="navbar-toggler ml-md-4" type="button" data-toggle="collapse" data-target="#mainNavbar"
							 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"></button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</nav>

	<?php endif; ?>



	<div class="main-wrapper">