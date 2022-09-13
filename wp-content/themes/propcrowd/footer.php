<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package propcrowd
 */

$theme_uri = get_template_directory_uri().'/';
$menuID = 'es' ==  pll_current_language('slug') ? 3 : 70;
$footerNav = wp_get_nav_menu_items($menuID); // Get the array of wp objects, the nav items for our queried location.
$menuSecID = 'es' ==  pll_current_language('slug') ? 4 : 71;
$footerSecondaryNav = wp_get_nav_menu_items($menuSecID); // Get the array of wp objects, the nav items for our queried location.
?>

<?php if( !is_404() ): ?>

<div class="main-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-4 text-left d-none d-md-block">
				<?= wp_get_attachment_image( get_field('footer_logo', 'options'), 'full', false, 'class=iso' ); ?>
			</div>
			<div class="col-lg-10 col-md-8">
				<div class="row">
					<div class="col-md-6 col-lg-3">
						<div class="h4"><?= pll_e('CONTÁCTANOS') ?></div>
						<div><?php the_field('address', 'options'); ?></div>
					</div>
					<div class="col-sm-3 d-none d-lg-block">
						<div class="h4"><?= pll_e('SOBRE NOSOTROS') ?></div>
						<ul class="list-unstyled">
							<?php foreach( $footerNav as $key=>$navItem ): 
								$class = implode(', ', $navItem->classes); ?>
								<li>
									<a href="<?php echo $navItem->url ?>"><?php echo $navItem->title ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="col-sm-3 d-none d-lg-block">
						<div class="h4"><?= pll_e('SÍGUENOS') ?></div>
						<ul class="list-unstyled">
							<?php if( get_field('facebook', 'options') ): ?>
							<li><a class="link" href="<?php the_field('facebook', 'options'); ?>" target="_blank"><i class="fab fa-facebook-f"></i>Facebook</a></li>
							<?php endif; 
							
							if( get_field('twitter', 'options') ): ?>
							<li><a class="link" href="<?php the_field('twitter', 'options'); ?>" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
							<?php endif; 
							
							if( get_field('linkedin', 'options') ): ?>
							<li><a class="link" href="<?php the_field('linkedin', 'options'); ?>" target="_blank"><i class="fab fa-linkedin-in"></i>Linkedin</a></li>
							<?php endif; 
							
							if( get_field('youtube', 'options') ): ?>
							<li><a class="link" href="<?php the_field('youtube', 'options'); ?>" target="_blank"><i class="fab fa-youtube"></i>Youtube</a></li>
							<?php endif; 
							
							if( get_field('instagram', 'options') ): ?>
							<li><a class="link" href="<?php the_field('instagram', 'options'); ?>" target="_blank"><i class="fab fa-instagram"></i>Instagram</a></li>
							<?php endif; ?>
						</ul>
					</div>
					<div class="col-md-6 col-lg-3">
						<div class="h4"><?= pll_e('NEWSLETTER') ?></div>
						<a href="<?php the_field('newsletter_link','options') ?>"><?= pll_e('Suscríbete a') ?><br class="d-none d-md-block"> <?= pll_e('nuestra newsletter') ?></a>
					</div>
				</div>
				<div class="nav social d-flex d-md-none">
					<?php if( get_field('facebook', 'options') ): ?>
					<div class="nav-item"><a class="nav-link" href="<?php the_field('facebook', 'options'); ?>" target="_blank"><span class="fab fa-facebook-f"></span></a></div>
					<?php endif; 
							
					if( get_field('twitter', 'options') ): ?>
					<div class="nav-item"><a class="nav-link" href="<?php the_field('twitter', 'options'); ?>" target="_blank"><span class="fab fa-twitter"></span></a></div>
					<?php endif; 
							
					if( get_field('linkedin', 'options') ): ?>
					<div class="nav-item"><a class="nav-link" href="<?php the_field('linkedin', 'options'); ?>" target="_blank"><span class="fab fa-linkedin-in"></span></a></div>
					<?php endif; 
							
					if( get_field('youtube', 'options') ): ?>
					<div class="nav-item"><a class="nav-link" href="<?php the_field('youtube', 'options'); ?>" target="_blank"><span class="fab fa-youtube"></span></a></div>
					<?php endif; 
							
					if( get_field('instagram', 'options') ): ?>
					<div class="nav-item"><a class="nav-link" href="<?php the_field('instagram', 'options'); ?>" target="_blank"><span class="fab fa-instagram"></span></a></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="main-footer-secondary">
	<div class="container">
		<div class="copy"><?= get_field('copyright','options'); ?></div>
		<ul class="nav">
			<?php foreach( $footerSecondaryNav as $key=>$navItem ): 
				$class = implode(', ', $navItem->classes); ?>
				<li class="nav-item">
					<a href="<?php echo $navItem->url ?>" class="nav-link"><?php echo $navItem->title ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>


<div class="back-to-top"></div>


<?php endif; ?>

</div><!-- main-wrapper -->

<?php wp_footer(); ?>

</body>
</html>