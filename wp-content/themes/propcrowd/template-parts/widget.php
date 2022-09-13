<?php
$data = get_fields(get_option('page_on_front'));


$projID = get_field('widget_id', 2);
$token = hash('sha256', $projID.APIKEY.strrev($projID));

$url = 'http://mk.propcrowd.com/api/projects?code='.$projID.'&token='.$token;
$json = file_get_contents($url);
$api = json_decode($json);
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
						<input class="range" type="hidden" value="3000" data-text="<?= pll_e('Inviertes') ?>" data-anualtir="<?php echo $api->profit ?>">
						<input type="number" value="<?php echo 3000/100 * $api->profit ?>" readonly><span>€</span>
					</form>

					<div class="stats">
						<div class="mb-3">
							<div class="info-progress">
								<small><?= $api->percent ?>%</small>
								<span class="label"><?= pll_e('Financiación al') ?></span>
								<div class="progress">
									<div class="progress-bar progress-bar-striped" role="progressbar" style="width:<?= $api->percent ?>%" aria-valuenow="<?php echo str_replace("%", "", $api->percent) ?>" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
						<div class="mb-2"><span class="label"><?= pll_e('Rentabilidad Anual') ?>: </span><span class="value"><?= $api->anual_tir ?>%</span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Inversores') ?>: </span><span class="value"><?= $api->num_lenders ?></span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Objetivo') ?>: </span><span class="value"><?= number_format($api->amount) ?>€</span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Objetivo alcanzado') ?>: </span><span class="value"><?= number_format($api->fund_amount) ?>€</span></div>
						<div class="mb-2"><span class="label"><?= pll_e('Plazo') ?>: </span><span class="value"><?= $api->months ?> <?= pll_e('meses') ?></span></div>
					</div>

					<div class="d-sm-none pb-3 mb-5">
						<a 
							class="btn btn-secondary btn-sharp btn-xs-big btn-block text-dark" 
							onclick="openpopup('<?= $btnlink; ?>','<?= $target; ?>'); return false;" 
							href="#" 
							data-toggle="tooltip" 
							data-placement="right"
							tittle data-original-title="Te dirigimos a la página de nuestro partner Socilen, Plataforma de Financiación Participativa acreditada por la CNMV"><?= pll_e('Invierte') ?></a>
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
										<span class="value"><?= $api->profit ?>%</span>
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
										<span class="value"><?= $api->anual_tir ?>%</span>
									</div>
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>




			<div class="col-lg-6 order-md-1">
				<div class="property">
					<div class="slide owl-carousel">
						<?php foreach($api->images as $img ): 
							if( $img->is_main ): ?>
								<div><img src="<?= $img->url ?>" alt="<?= $img->name ?>"></div>
							<?php endif; 
						endforeach; 
						
						foreach($api->images as $img ): 
							if( !$img->is_main ): ?>
								<div><img src="<?= $img->url ?>" alt="<?= $img->name ?>"></div>
							<?php endif; 
						endforeach;?>
					</div>

					<div class="property-body">
						<div class="title"><?= $api->title ?></div>
						<div class="address"><?= $api->address->street .', '. $api->address->postal_code .', '. $api->address->city ?><br><small><strong><?= $api->building_type ?></strong></small></div>
						<div class="description mb-5"><?= $api->description ?></div>


						<div class="files">
							<div class="title"><?= pll_e('Documentos') ?></div>
							<div class="files-body">
								<div class="row">
									<?php foreach($api->documents as $doc): ?>
										<div class="col-lg-6"><a href="<?= $doc->url ?>" target="_blank"><?= $doc->name ?></a></div>
									<?php endforeach; ?>
								</div>
							</div><!-- files-body -->
						</div>


						<div class="pt-4">
							<?php 
							// if( is_front_page() ){
								// $btnlink = 'https://mk.socilen.com/register.php?token=4506fbdd-b69b-47c8-8823-acb0e15b1ee4';
								// $target = '';
							// }else{
								$btnlink = $api->url;
								$target = '';
							// } 
							?>

							<a 
								class="btn btn-secondary btn-sharp btn-xs-big btn-block text-dark"
								onclick="openpopup('<?= $btnlink; ?>','<?= $target; ?>'); return false;"
								href="#" 
								data-toggle="tooltip" 
								data-placement="right" 
								tittle data-original-title="Te dirigimos a la página de nuestro partner Socilen, Plataforma de Financiación Participativa acreditada por la CNMV"><?= pll_e('Invierte') ?></a>
						</div>
					</div><!-- proerty-body -->
				</div><!-- property -->


			</div>

		</div>
		<div class="text-center pt-5"><a class="btn btn-primary btn-xs-big d-block d-sm-inline-block" href="<?= $data['widget_btn_link']; ?>"><?= $data['widget_btn_text']; ?></a></div>
	</div>
</section>


<?php get_template_part('template-parts/oportunities', 'popup'); 