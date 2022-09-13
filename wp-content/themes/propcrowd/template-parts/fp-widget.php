<?php
$data = get_fields(get_option('page_on_front'));
?>

<section id="widget">
	<div class="container">
		<header>
			<div class="h5"><?= $data['widget_supertitle']; ?></div>
			<div class="h2"><?= $data['widget_title']; ?></div>
			<div class="subtitle"><?= $data['widget_subtitle']; ?></div>
			<?= wp_get_attachment_image( $data['widget_logo'], 'full', false, 'class=img-fluid' ); ?>
		</header>

		<div class="row mb-4">
			<div class="col-lg-6 order-md-2">

				<div class="d-sm-none mt-3 mb-5">
					<?php if('en' == pll_current_language('slug') ){ $btn_link_id = 490; }else{ $btn_link_id = 9; } ?>
					<a class="btn btn-secondary btn-sharp btn-xs-big btn-block text-dark" href="<?php echo get_page_link($btn_link_id) ?>"><?= pll_e('Informate aquí') ?></a>
				</div>


				<div class="evaluation">
					<div class="h5"><?= $data['widget_form_title']; ?></div>
					<div class="excerpt"><?= $data['widget_form_excerpt']; ?></div>
					<!-- Slider-->
					<form class="slider" action="">
						<input class="range" type="hidden" value="3000" data-text="<?= pll_e('Inviertes') ?>">
						<input type="number" value="300"><span>€</span>
					</form>

					<div class="stats">
						<div class="mb-3">
							<div class="info-progress">
								<small><?= $data['percent_reached'] ?></small>
								<span class="label"><?= pll_e('Financiación al') ?></span>
								<div class="progress">
									<div class="progress-bar progress-bar-striped" role="progressbar" style="width:<?php echo str_replace(",", ".", $data['percent_reached']) ?>" aria-valuenow="<?php echo str_replace("%", "", $data['percent_reached']) ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<!-- <div class="mb-2"><span class="label"><?= pll_e('Tiempo restante') ?>: </span><span class="value">4 días</span></div> -->
						<div class="mb-2"><span class="label"><?= pll_e('Rentabilidad Anual') ?>: </span><span class="value"><?= $data['financing_1'] ?></span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Inversores') ?>: </span><span class="value"><?= $data['financing_2'] ?></span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Objetivo') ?>: </span><span class="value">378.265€</span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Objetivo alcanzado') ?>: </span><span class="value"><?= $data['financing_3'] ?></span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Plazo') ?>: </span><span class="value"><?= $data['financing_4'] ?></span></div>
					</div>


					<div class="d-sm-none pb-3 mb-5">
						<a class="btn btn-secondary btn-sharp btn-xs-big btn-block text-dark" href="#" onclick="return false"><?= pll_e('Financiado') ?></a>
					</div>


					<footer>
						<div class="h5"><?= pll_e('El rendimiento') ?></div>

						<div class="info first-of-type">
							<div class="row">
								<div class="col-6">
									<span class="title"><?= pll_e('Resultados') ?></span>
								</div>

								<div class="col-6 text-right">
									<div>
										<span class="desc"><?php //pll_e('Total performance') ?></span>
										<span class="value">15,47%</span>
									</div>
								</div>
							</div>
						</div>

						<div class="info last-of-type">
							<div class="row">
								<div class="col-6">
									<span class="title"><?= pll_e('Annual TIR') ?></span>
								</div>

								<div class="col-6 text-right">
									<div>
										<span class="desc"><?php //pll_e('Rentabilidad Anual Máxima') ?></span>
										<span class="value">15,47%</span>
									</div>
								</div>
							</div>
						</div>

						<?php /**
						<div class="info first-of-type">
							<span class="title"><?= pll_e('Resultados') ?></span>
							<div>
								<span class="desc"><?php //pll_e('Total performance') ?></span>
								<span class="value">10,31%</span>
							</div>
						</div>

						<div class="info">
							<span class="title"><?= pll_e('Rentabilidad') ?></span>
							<div>
								<span class="desc"><?= pll_e('Annual TIR') ?></span>
								<span class="value">14,85%</span>
							</div>
						</div>

						<div class="info last-of-type">
							<span class="title"><?= pll_e('Annual TIR') ?></span>
							<div>
								<span class="desc"><?php //pll_e('Rentabilidad Anual Máxima') ?></span>
								<span class="value">10,31%</span>
							</div>
						</div>

						<div class="info last-of-type">
							<span class="title"><?= //pll_e('Máximo rendimiento anual') ?></span>
						</div>
						*/ ?>
					</footer>
				</div>
			</div>




			<div class="col-lg-6 order-md-1">
				<div class="property">
					<div class="slide owl-carousel">
						<?php 
						$fix_lang_uri = '';
						if('en' == pll_current_language('slug') ){ $fix_lang_uri = '../'; }
						?>
						<div><img src="<?= get_template_directory_uri(); ?>/assets/widget/01.jpg" alt=""></div>
						<div><img src="<?= get_template_directory_uri(); ?>/assets/widget/02.jpg" alt=""></div>
						<div><img src="<?= get_template_directory_uri(); ?>/assets/widget/03.jpg" alt=""></div>
						<div><img src="<?= get_template_directory_uri(); ?>/assets/widget/04.jpg" alt=""></div>
						<div><img src="<?= get_template_directory_uri(); ?>/assets/widget/05.jpg" alt=""></div>
						<div><img src="<?= get_template_directory_uri(); ?>/assets/widget/06.jpg" alt=""></div>
						<div><img src="<?= get_template_directory_uri(); ?>/assets/widget/07.jpg" alt=""></div>
					</div>

					<div class="property-body">
						<div class="title">Port Vell</div>
						<div class="address">C/ REINA CRISTINA 1, 08003, BARCELONA (ESPAÑA)</div>

						<?php if('en' == pll_current_language('slug') ): ?>
							<div class="description">
								<p>Port Vell is a residential apartment with 94m2 consisting of 3 rooms, a 
								large space with kitchen, dining room and living room and 2 bathrooms. 
								Located at Reina Cristina Street number 1, first floor, this property will 
								have a spectacular change thanks to the complete reform that will 
								significantly revalue its sale value.</p>
								<p>It is located in an unbeatable location, in front of Port Vell, one of 
								the characteristic enclaves of the city, with great variety of entertainment 
								options around it, a few meters from the beach and just a few minutes from 
								the city centre.</p>
							</div>
						<?php else: ?>
							<div class="description">
								<p>Port Vell es un apartamento residencial de 94m2 formado por 3 habitaciones, 
								un  amplio espacio diáfano con cocina, comedor y sala de estar y 2 cuartos de baño. 
								Situado en calle Reina Cristina número 1, planta primera, este inmueble dará un 
								espectacular cambio gracias a la reforma integral que se realizará para revalorizar 
								notablemente su valor de venta.</p>
								<p>Se encuentra en una ubicación inmejorable, frente a Port Vell, uno de los 
								enclaves característicos de la ciudad, con gran oferta de ocio a su alrededor, 
								a pocos metros de la playa y tan solo unos minutos del centro de Barcelona</p>
							</div><!-- description -->
						<?php endif; ?>

						<div class="files">
							<div class="title">Documentos</div>
							<div class="files-body">
								<div class="row">
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_business_plan.pdf" target="_blank">Business Plan</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_estudio_de_mercado.pdf" target="_blank">Estudio de mercado</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_cedula-habitabilidad.pdf" target="_blank">Cédula habitabilidad</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_informe_tasacion.pdf" target="_blank">Informe tasación</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_informacion_registral.pdf" target="_blank">Información registral</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_ficha_catastral.jpg" target="_blank">Ficha catastral</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_certificado_ite.pdf" target="_blank">Certificado ITE</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_informe_ite.pdf" target="_blank">Informe ITE</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_planos.pdf" target="_blank">Planos</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_certificado-tasación.pdf" target="_blank">Certificado tasación</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_plano-localizacion.png" target="_blank">Plano localización</a></div>
									<div class="col-lg-6"><a href="<?= get_template_directory_uri(); ?>/assets/widget/port-vell_plano_proyecto_reforma.png" target="_blank">Plano proyecto reforma</a></div>
								</div>
							</div><!-- files-body -->
						</div>


						<div class="pt-4">
							<?php if( is_front_page() ){
								$btnlink = 'https://mk.socilen.com/register.php?token=4506fbdd-b69b-47c8-8823-acb0e15b1ee4';
								$target = '';
							}else{
								$btnlink = 'https://mk.socilen.com/register.php?token=4506fbdd-b69b-47c8-8823-acb0e15b1ee4';
								$target = '';
							} ?>

							<a class="btn btn-secondary btn-sharp btn-xs-big btn-block text-dark" href="#" onclick="return false"><?= pll_e('Financiado') ?></a>
						</div>
					</div><!-- proerty-body -->
				</div><!-- property -->


			</div>

		</div>
		<div class="text-center pt-5"><a class="btn btn-primary btn-xs-big d-block d-sm-inline-block" href="<?= $data['widget_btn_link']; ?>"><?= $data['widget_btn_text']; ?></a></div>
	</div>
</section>


<?php
get_template_part('template-parts/oportunities', 'popup'); 