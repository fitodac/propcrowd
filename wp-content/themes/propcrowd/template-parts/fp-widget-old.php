<section id="widget">
	<div class="container">
		<header>
			<div class="h5"><?= $data['widget_supertitle']; ?></div>
			<div class="h2"><?= $data['widget_title']; ?></div>
			<div class="subtitle"><?= $data['widget_subtitle']; ?></div>
			<?= wp_get_attachment_image( $data['widget_logo'], 'full', false, 'class=img-fluid' ); ?>
		</header>

		<div class="row mb-4">
			<div class="col-md-6 order-md-2">
				<div class="evaluation">
					<div class="h5"><?= $data['widget_form_title']; ?></div>
					<div class="excerpt"><?= $data['widget_form_excerpt']; ?></div>
					<!-- Slider-->
					<form class="slider" action="">
						<input class="range" type="hidden" value="3000" data-text="<?= pll_e('Inviertes') ?>">
						<input type="number" value="300"><span>€</span>
					</form>
					<footer>
						<div class="h5"><?= pll_e('El rendimiento') ?></div>
						<div class="info">
							<div>
								<strong><?= pll_e('Resultados') ?></strong>
								<span><?= pll_e('Total performance') ?> <i class="fas fa-question-circle">
																					<div class="popover"><?= $data['performance_1_popup'] ?></div>
																				</i></span></div>
							<div><?= $data['performance_val_1'] ?></div>
							
						</div>
						<div class="info">
							<div>
								<strong><?= pll_e('Rentabilidad') ?></strong>
								<span><?= pll_e('Annual TIR') ?> <i class="fas fa-question-circle">
																	<div class="popover"><?= $data['performance_2_popup'] ?></div>
																</i>
								</span>
							</div>
							<div><?= $data['performance_val_2'] ?></div>
						</div>
						<!--
						<div class="info">
							<div><strong>TIR anual</strong><span>Rentabilidad Anual Máxima <i class="fas fa-question-circle"></i></span></div>
							<div>51,78%</div>
						</div>
						-->
					</footer>
				</div>
			</div>

			<div class="col-md-6 order-md-1">
				<figure>
					<?= wp_get_attachment_image( $data['widget_image'], 'full', false, 'class=img-fluid' ); ?>
				</figure>
				<div class="stats">
					<div class="mb-3">
						<div class="info-progress"><strong><?= pll_e('Financiación al') ?></strong>
							<div class="progress">
								<div class="progress-bar progress-bar-striped" role="progressbar" style="width:76%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="mb-2"><strong><?= pll_e('Rentabilidad Anual') ?>: </strong><span><?= $data['financing_1'] ?></span></div>
					<div class="mb-2"><strong><?= pll_e('Inversores') ?>: </strong><span><?= $data['financing_2'] ?></span></div>
					<div class="mb-2"><strong><?= pll_e('Objetivo alcanzado') ?>: </strong><span><?= $data['financing_3'] ?></span></div>
					<div class="mb-2"><strong><?= pll_e('Plazo') ?>: </strong><span><?= $data['financing_4'] ?></span></div>
					<div class="row pt-3"><a class="btn btn-secondary btn-sharp btn-xs-big btn-block text-dark" href="./registrate"><?= pll_e('Invertir') ?></a></div>
				</div>
			</div>
		</div>
		<div class="text-center pt-5"><a class="btn btn-primary btn-xs-big d-block d-sm-inline-block" href="<?= $data['widget_btn_link']; ?>"><?= $data['widget_btn_text']; ?></a></div>
	</div>
</section>